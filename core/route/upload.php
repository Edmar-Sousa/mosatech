<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header('Location: index');
    die();
}

// validar token do formulario
include_once __DIR__ . '/../classes/formValid.php';
if (!Form::valid_crfs_token($_POST['csrf'])) {
    header('Location: cadProduto');
    die();
}


// upload file
$extUploadFiles = ['jpg', 'png'];

$file    = $_FILES['img_pro']['name'];
$tmpName = $_FILES['img_pro']['tmp_name'];
$extFile = pathinfo($file, PATHINFO_EXTENSION);

// gerar novo nome
$id = uniqid();
$uniqid = md5($id);
$nameUpload = "./uploads/{$uniqid}.{$extFile}";

if (!in_array($extFile, $extUploadFiles)) {
    header('Location: cadProduto');
    die();
}

else
    move_uploaded_file($tmpName, $nameUpload);


// cadastrar no banco de dados
include_once __DIR__ . '/../classes/database/connectionDB.php';
include_once __DIR__ . '/../classes/database/queryExec.php';

$nomeProduto = $_POST['nome'];
$cameProduto = $_POST['camera'];
$procProduto = $_POST['processador'];
$RAMProduto  = $_POST['RAM'];
$telaProduto = $_POST['tela'];
$armaProduto = $_POST['armazenamento'];
$preco = $_POST['preco'];

$sql = "INSERT INTO produtos(idProduto, nomeProduto, cameraProduto, procesProduto, menRamProduto, telaDoProduto,  armazeProduto, imgSrc, precoProduto) VALUES ('$id', '$nomeProduto', '$cameProduto', '$procProduto', '$RAMProduto', '$telaProduto', '$armaProduto', '$nameUpload', '$preco')";

$database = new ConnectionDB();
ExecQuery::insert($database->connect(), $sql);

header('Location: cadProduto');
die();
