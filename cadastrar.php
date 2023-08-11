<?php

require_once('classes/Usuario.php');
require_once('conexao/conexao.php');

$database = new Conexao();
$db = $database->getConnection();
$usuario = new Usuario($db);

if(isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confSenha = $_POST['confSenha'];

    if($usuario->cadastrar($nome,$email,$senha,$confSenha)){
        echo "Cadastro realizado com sucesso";
    }else{
        echo "Erro ao cadastrar!";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de cadastro</title>
</head>
<body>
    <form method="POST">
        <label for="">Nome de usuário</label><input type="text" name="nome" placeholder="Digite seu nome..." required>
        <label for="">E-mail</label><input type="email" name="email" placeholder="Digite seu E-mail..." required>
        <label for="">Senha</label><input type="password" name="senha" placeholder="Digite sua senha..." required>
        <label for="">Confirme sua senha</label><input type="password" name="confSenha" placeholder="Digite sua senha..." required>
        <button type="submit" name="cadastrar">Cadastrar</button>
    </form>
    <a href="index.php">Voltar para Login</a>
</body>
</html>