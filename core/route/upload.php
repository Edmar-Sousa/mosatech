<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header('Location: index');
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

$sql = "INSERT INTO produtos(idProduto, nomeProduto, cameraProduto, procesProduto, menRamProduto, telaDoProduto,  armazeProduto, imgSrc) VALUES ('$id', '$nomeProduto', '$cameProduto', '$procProduto', '$RAMProduto', '$telaProduto', '$armaProduto', '$nameUpload')";

$database = new ConnectionDB();
ExecQuery::insert($database->connect(), $sql);

header('Location: cadProduto');
die();
