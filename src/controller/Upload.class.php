<?php


class UploadController {
    private static function gerar_nome($id, $ext_file) {
        $uniqid = md5($id);
        $nameUpload = "./src/uploads/{$uniqid}.{$ext_file}";
        return $nameUpload;
    }

    private static function check_ext_and_upload($tmpName, $extFile, $nameUpload) {
        // upload file
        $extUploadFiles = ['jpg', 'png'];

        if (!in_array($extFile, $extUploadFiles))
            $router->redirect('cadProduto');

        else
            move_uploaded_file($tmpName, $nameUpload);
       
    }


    static function cadProdutos() {
        global $router;
        if (!Form::valid_crfs_token($_POST['csrf'])) $router->redirect('cadProduto');


        $file    = $_FILES['img_pro']['name'];
        $tmpName = $_FILES['img_pro']['tmp_name'];
        $extFile = pathinfo($file, PATHINFO_EXTENSION);

        // gerar novo nome
        $id = uniqid();
        $nameUpload = self::gerar_nome($id, $extFile);

        self::check_ext_and_upload($tmpName, $extFile, $nameUpload);

        $nomeProduto = $_POST['nome'];
        $cameProduto = $_POST['camera'];
        $procProduto = $_POST['processador'];
        $RAMProduto  = $_POST['RAM'];
        $telaProduto = $_POST['tela'];
        $armaProduto = $_POST['armazenamento'];
        $preco = $_POST['preco'];

        Produto::cadastrar_produto($id, $nomeProduto, $cameProduto, $procProduto, $RAMProduto, $telaProduto, $armaProduto, $nameUpload, $preco);
        $router->redirect('cadProduto');
    }

    // upload foto usuario


    static function cadProdutos_form() {
        global $router, $view;
        $user_login = Auth::require_logado(TRUE);

        if (empty($user_login['admin']))
            $router->redirect('login');

        $user_login['csrf'] = Form::gerar_token();

        $view->render('cadProduto.html', $user_login);
    }
    
}


