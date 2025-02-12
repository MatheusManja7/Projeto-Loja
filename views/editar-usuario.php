<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto-Loja/controller/Usuario.php';

if (!isset($_GET['id'])) {
    die("ID do usuário não informado.");
}

$id_usuario = $_GET['id'];

$objUsuario = new Usuario();
$usuario = $objUsuario->buscar_por_id($id_usuario);

if (!$usuario) {
    die("Usuário não encontrado.");
}

if (isset($_POST['atualizar'])) {
    $usuario->nome = $_POST['nome'];
    $usuario->email = $_POST['email'];
    $usuario->telefone = $_POST['telefone'];

    if ($usuario->atualizar()) {
        echo "<script>alert('Usuário atualizado com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao atualizar usuário!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/vars.css">
    <link rel="stylesheet" href="../assets/css/editar-usuario.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Editar Usuarios</title>
</head>
<body>

    <section class="section-editar-principal">
        <div class="bolota1-editar"></div>
        <div class="bolota2-editar"></div>
        <div class="bolota3-editar"></div>
        <div class="bolota4-editar"></div>
        <div class="bolota5-editar"></div>
        <div class="box-principal-editar">
            <div class="area-img-editar">
                <div class="div-editar">
                    <div class="decoracao-editar">
                        <a href="../views/lista-usuario.php"><i class="bi bi-box-arrow-left"></i></a>
                        <h1>Editar Usuario</h1>
                    </div>
                </div>
               
            </div>
    
            <div class="area-form-editar">
                <div class="div-title-editar">
                    <h1>Cadastre-se</h1>
                    <div id="linha-horizontal"></div>
                </div>
                <div class="div-form-editar">
                    <form method="post">
                        <label>Nome</label>
                        <input type="text" name="nome" value="<?= htmlspecialchars($usuario->nome) ?>" required>
                        
                        <label>Email</label>
                        <input type="text" name="email" value="<?= htmlspecialchars($usuario->email) ?>" required>
                        
                        <label>Telefone</label>
                        <input type="text" name="telefone" value="<?= htmlspecialchars($usuario->telefone) ?>" required>

                        <button id="button-cad-prod" type="submit" name="atualizar">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
   
</body>
</html>