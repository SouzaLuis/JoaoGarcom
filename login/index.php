<?php
require_once 'classes/usuario.php';
$u = new Usuario;
?>

<html lang="pt-br">
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>João Garçom</title>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="first-column">
                <h1 class="title first-title">Bem-Vindo ao João Garçom!</h1>
                <p class="descrição">Selecione para se cadastrar </p>
                <div class="seleção-cadastro">
                <ul>
                    <a class="link-estabelecimento" href="cadastrarEstabelecimento.php">
                        <li class="item-estabelecimento">Estabelecimento</li>
                     </a>
                    <a class="link-cliente" href="cadastrar.php">
                        <li class="item-cliente">Cliente</li>
                    </a>
                </ul>
                </div>
            </div>

            <div class="second-column">
                 <h1 class="title second-title">Entre </h1>
    
            <form method="POST">
            <input type="email" name="email" placeholder="Usuário">
            <input type="password" name="senha" placeholder="Senha">
            <input type="submit" value="Acessar">
            </form>
                    <?php

                if(isset($_POST['email']))
                {
                    $email = addslashes($_POST['email']);
                    $senha = addslashes($_POST['senha']);
                    if(!empty($email) && !empty($senha))
                    {
                        $u->conectar("jglogin","localhost","root","");
                        if($u->msgErro == ""){
                        if($u->logar($email,$senha)){
                            header("location: inicio.php");
                        }
                        else
                        {
                            ?>
                        <div class="msg-erro">
                            E-mail e/ou senha estão incorretos!
                        </div>
                        <?php
                        }
                        }
                        else
                        {
                            ?>
                        <div class="msg-erro">
                        <?php echo "Erro: ".$u->msgErro ?>
                        </div>
                        <?php
                        }
                    }else
                    {
                        ?>
                        <div class="msg-erro">
                        Preencha todos os campos!
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>