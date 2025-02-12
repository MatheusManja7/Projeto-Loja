<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto-Loja/controller/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_usuario'])) {
    $id_usuario = intval($_POST['id_usuario']);
    $usuario = new Usuario();

    if ($usuario->excluir($id_usuario)) {
        // Se a exclusão for bem-sucedida, envie um sucesso na URL.
        header("Location: lista-usuario.php?success=1");
        exit();
    } else {
        // Se não for possível excluir, envie uma mensagem de erro.
        header("Location: lista-usuario.php?error=1");
        exit();
    }
}

?>