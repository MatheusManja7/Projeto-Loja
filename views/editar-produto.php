<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto-Loja/controller/Produto.php';

if (!isset($_GET['id'])) {
    die("ID do usuário não informado.");
}

$id_produto = $_GET['id'];

$objProduto = new Produto();
$produto = $objProduto->buscar_por_id($id_produto);

if (!$produto) {
    die("Usuário não encontrado.");
}

if (isset($_POST['atualizar'])) {
    $produto->nome = $_POST['nome'];
    $produto->categoria = $_POST['categoria'];
    $produto->marca = $_POST['marca'];
    $produto->preco = $_POST['preco'];
    $produto->qtd_estoque = $_POST['qtd_estoque'];

    if ($produto->atualizar()) {
        echo "<script>alert('Produto atualizado com sucesso!'); window.location.href='listar-usuarios.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar Produto!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/vars.css">
    <link rel="stylesheet" href="../assets/css/editar-produto.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Editar Produto</title>
</head>
<body>

    <section class="section-editar-prod-principal">
        <div class="bolota1-editar-prod"></div>
        <div class="bolota2-editar-prod"></div>
        <div class="bolota3-editar-prod"></div>
        <div class="bolota4-editar-prod"></div>
        <div class="bolota5-editar-prod"></div>
        <div class="box-principal-editar-prod">
            <div class="area-img-editar-prod">
                <div class="div-editar-prod">
                    <div class="decoracao-editar-prod">
                        <a href="../views/home.html"><i class="bi bi-box-arrow-left"></i></a>
                        <h1>Editar Usuario</h1>
                    </div>
                </div>
               
            </div>
    
            <div class="area-form-editar-prod">
                <div class="div-title-editar-prod">
                    <h1>Cadastre-se</h1>
                    <div id="linha-horizontal-editar-prod"></div>
                </div>
                <div class="div-form-editar-prod">
                    <form method="post">
                        <label>Nome</label>
                        <input type="text" name="nome" value="<?= htmlspecialchars($produto->nome) ?>" required>
                        
                        <label>Categoria</label>
                        <input type="text" name="categoria" value="<?= htmlspecialchars($produto->categoria) ?>" required>
                        
                        <label>Marca</label>
                        <input type="text" name="marca" value="<?= htmlspecialchars($produto->marca) ?>" required>
                        
                        <label>Preco</label>
                        <input type="text" name="preco" value="<?= htmlspecialchars($produto->preco) ?>" required>
                        
                        <label>Quantidade estoque</label>
                        <input type="text" name="qtd_estoque" value="<?= htmlspecialchars($produto->qtd_estoque) ?>" required>


                        <button id="button-editar-prod" type="submit" name="atualizar">Atualizar</button>
                    </form>
                    <a href="listar-produtos.php">Voltar</a>
                </div>
            </div>
        </div>
    </section>
   
</body>
</html>