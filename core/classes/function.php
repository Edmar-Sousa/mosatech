<?php

$logado = FALSE;
$admin = FALSE;

if (isset($_SESSION['usuario_logado'])) {
    $logado = TRUE;
    $admin = $_SESSION['usuario_logado']['permissaoAdmin'] == 1 ? TRUE : FALSE;
}
