<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto-Loja/controller/Usuario.php';

// Lógica para excluir o usuário se o formulário for enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_usuario'])) {
    $id_usuario = intval($_POST['id_usuario']);
    $usuario = new Usuario();

    if ($usuario->excluir($id_usuario)) {
        // Se a exclusão for bem-sucedida, mostramos uma mensagem de sucesso.
        $message = "Usuário excluído com sucesso!";
    } else {
        // Se falhar, mostramos uma mensagem de erro.
        $message = "Erro ao excluir o usuário.";
    }
}

// Buscar todos os usuários
$usrs = new Usuario();
$usuarios = $usrs->buscar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/vars.css">
    <link rel="stylesheet" href="../assets/css/lista-usuarios.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Lista de Usuarios</title>
</head>
<body>
    <section class="area-LisUs-principal">
        <div class="bolota1-lis-us"></div>
        <div class="bolota2-lis-us"></div>
        <div class="bolota3-lis-us"></div>
        <div class="bolota4-lis-us"></div>
        <div class="bolota5-lis-us"></div>
        <div class="bolota6-lis-us"></div>
        <div class="bolota7-lis-us"></div>
        <div class="bolota8-lis-us"></div>

        <div class="box-LisUs">
            <a class="b" href="../views/home.html"><i class="bi bi-box-arrow-left"></i></a>
            <h1>Lista de Usuarios</h1>

            <div class="area-table-lisUs">
                <table class="table-lisUs">
                    <thead>
                        <tr>
                            <th>id_categoria</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Excluir</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($usuarios as $usrs) {
                                echo '
                                <tr>
                                    <td>' . $usrs->id_usuario . '</td>
                                    <td>' . $usrs->nome . '</td>
                                    <td>' . $usrs->email . '</td>
                                    <td>' . $usrs->telefone . '</td>
                                    <td>
                                        <form method="POST">
                                            <input type="hidden" name="id_usuario" value="' . $usrs->id_usuario . '">
                                            <button type="submit" class="button-del">Excluir</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="editar-usuario.php?id=' . $usrs->id_usuario . '">
                                            <i class="bi bi-pencil-square text-primary"></i>
                                        </a>
                                    </td>
                                </tr>';

                                $compras = $usrs->buscar_compras($usrs->id_usuario);
            
                                if (!empty($compras)) {
                                    echo '<tr><td colspan="6"><strong>Compras:</strong><ul>';
                                    foreach ($compras as $compra) {
                                        echo '<li>' . $compra['produto_nome'] . ' - ' . $compra['quantidade'] . ' unidades (' . $compra['data_compra'] . ')</li>';
                                    }
                                    echo '</ul></td></tr>';
                                }    
                            }
                        ?>        
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>
</html>