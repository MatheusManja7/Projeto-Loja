<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto-Loja/controller/Produto.php';

if(isset($_POST['cadastrar'])){

    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $marca = $_POST['marca'];
    $preco = $_POST['preco'];
    $qtd_estoque = $_POST['qtd_estoque'];

    $objColab = new Produto();
    $objColab->nome = $nome;
    $objColab->categoria = $categoria;
    $objColab->marca = $marca;
    $objColab->preco = $preco;
    $objColab->qtd_estoque = $qtd_estoque;

    $res = $objColab->cadastrar();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/vars.css">
    <link rel="stylesheet" href="../assets/css/cadastro-produto.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Cadastro Produtos</title>
</head>
<body>

    <section class="section-principal-cad-prod">
        <div class="bolota1-cad-prod"></div>
        <div class="bolota2-cad-prod"></div>
        <div class="bolota3-cad-prod"></div>
        <div class="bolota4-cad-prod"></div>
        <div class="bolota5-cad-prod"></div>
        <div class="box-principal-cad-prod">
            <div class="area-form-cad-prod">
                <div class="div-title-cad-prod">
                    <h1>Produtos</h1>
                    <div id="linha-horizontal-cad-prod"></div>
                </div>
                <div class="div-form-cad-prod">
                    <form method="post">
                        <label for="nome">Nome do Produto</label>
                        <input type="text" name="nome" id="nome" placeholder="Digite o nome do produto" required>
                        
                        <label for="categoria">Categoria</label>
                        <select name="categoria" id="categoria-cad-prod" required>
                            <option value="">Selecione uma categoria</option>
                            <option value="detergente">Detergente</option>
                            <option value="desinfetante">Desinfetante</option>
                            <option value="limpador_multiuso">Limpador Multiuso</option>
                            <option value="amaciante">Amaciante</option>
                            <option value="desengordurante">Desengordurante</option>
                            <option value="agua_oxigenada">Água Oxigenada</option>
                        </select>
                        
                        <label for="marca">Marca</label>
                        <input type="text" name="marca" id="marca" placeholder="Digite a marca do produto" required>
                        
                        <label for="preco">Preço</label>
                        <input type="number" name="preco" id="preco" placeholder="Digite o preço" step="0.01" required>
                        
                        <label for="qtd_estoque">Quantidade no Estoque</label>
                        <input type="number" name="qtd_estoque" id="qtd_estoque" placeholder="Digite a quantidade no estoque" required>

                        <button type="submit" name="cadastrar" value="Cadastrar">Cadastrar</button>

                    </form>
                </div>
            </div>

            <div class="area-img-cad-prod">
                <div class="div-cad-prod">
                    <div class="decoracao-cad-prod">
                        <a href="../views/home.html"><i class="bi bi-box-arrow-left"></i></a>
                        <h1>Cadastro de Produtos</h1>
                        <h2>Cadastre o produto desejado ao lado</h2>
                    </div>
                </div>
               
            </div>           

        </div>
    </section>
   
</body>
</html>