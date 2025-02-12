<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto-Loja/controller/Produto.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_produto'])) {
    $id_produto = intval($_POST['id_produto']);
    $produto = new Produto();

    if ($produto->excluir($id_produto)) {

        $message = "Produto excluído com sucesso!";
    } else {

        $message = "Erro ao excluir Produto.";
    }
}

$prod = new Produto();
$produto = $prod->buscar();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/vars.css">
    <link rel="stylesheet" href="../assets/css/lista-produtos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Lista de Produtos</title>
</head>

<body class="corpo-lisEsp">
    <section class="area-Lisprod-principal">
        <div class="bolota1-lis-prod"></div>
        <div class="bolota2-lis-prod"></div>
        <div class="bolota3-lis-prod"></div>
        <div class="bolota4-lis-prod"></div>
        <div class="bolota5-lis-prod"></div>
        <div class="bolota6-lis-prod"></div>
        <div class="bolota7-lis-prod"></div>
        <div class="bolota8-lis-prod"></div>

        <div class="box-Lisprod-mat">
            <a class="a" href="../views/home.html"><i class="bi bi-box-arrow-left"></i></a>
            <h1>Lista de Produtos</h1>

            <div class="area-table-lisprod">
                <table class="table-lisprod">
                    <thead>
                        <tr>
                            <th>Id_Produto</th>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Marca</th>
                            <th>Preço</th>
                            <th>Quantidade no Estoque</th>
                            <th>Excluir</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($produto as $prod) {
                                echo '
                                <tr>
                                    <td>' . $prod->id_produto . '</td>
                                    <td>' . $prod->nome . '</td>
                                    <td>' . $prod->categoria . '</td>
                                    <td>' . $prod->marca . '</td>
                                    <td>' . $prod->preco . '</td>
                                    <td>' . $prod->qtd_estoque . '</td>
                                    <td>
                                        <form method="POST">
                                            <input type="hidden" name="id_produto" value="' . $prod->id_produto . '">
                                            <button type="submit" class="button-del">Excluir</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="editar-produto.php?id=' . $prod->id_produto . '">
                                            <i class="bi bi-pencil-square text-primary"></i>
                                        </a>
                                    </td>
                                </tr>';
                            }
                        ?>        
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>
