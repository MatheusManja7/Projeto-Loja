<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Projeto-Loja/controller/Usuario.php';

if(isset($_POST['cadastrar'])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $objUsrs = new Usuario();
    $objUsrs->nome = $nome;
    $objUsrs->email = $email;
    $objUsrs->telefone = $telefone;

    $res = $objUsrs->cadastrar();
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/vars.css">
    <link rel="stylesheet" href="../assets/css/cadastro-usuario.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Cadastro Usuarios</title>
</head>
<body>

    <section class="section-principal">
        <div class="bolota1"></div>
        <div class="bolota2"></div>
        <div class="bolota3"></div>
        <div class="bolota4"></div>
        <div class="bolota5"></div>
        <div class="box-principal-cadUs">
            <div class="area-img">
                <div class="div">
                    <div class="decoracao">
                        <a href="../views/home.html"><i class="bi bi-box-arrow-left"></i></a>
                        <h1>Olá, Seja Bem Vindo</h1>
                        <h2>Cadastro de Usuario</h2>
                    </div>
                </div>
               
            </div>
    
            <div class="area-form">
                <div class="div-title">
                    <h1>Cadastre-se</h1>
                    <div id="linha-horizontal"></div>
                </div>
                <div class="div-form">
                    <form method="post">
                        <label>Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Digite seu nome" required>
    
                        <label>E-mail</label>
                        <input type="email" name="email" id="email" placeholder="Digite seu E-mail" required>
    
                        <label>Telefone</label>
                        <input type="tel" name="telefone" id="telefone" placeholder="(XX) XXXXX-XXXX" required>
    
                        <label>Senha</label>
                        <input type="password" name="senha" id="senha" required>
    
                        <label>Confirme sua Senha</label>
                        <input type="password" name="confsenha" id="confsenha" required>
    
                        <button id="button-cad-prod" type="submit" name="cadastrar" value="Cadastrar">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
   
</body>
</html>