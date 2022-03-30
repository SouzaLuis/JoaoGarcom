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
</head>

<body>
<div class="container">
        <div class="content">
            <div class="first-column">
            <div class="caixa-descrição"> 
                    <h1 class="title first-title">Bem vindo Ao João Garçom!</h1>
                     <p class="descrição">Volte para logar </p>
                </div>               
        
               <a class="link-login" href="index.php">
                <i class="fas fa-arrow-left"></i>
                </a>
             
            </div>

            <div class="second-column">
                <h1 class="title second-title">Entrar</h1>
                <form method="POST">
                    <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
                    <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
                    <input type="text" name="endereco" placeholder="Endereço" maxlength="30">
                    <input type="text" name="cpf" placeholder="CPF" maxlength="15">
                    <input type="email" name="email" placeholder="Usuário" maxlength="50">
                    <input type="password" name="senha" placeholder="Senha" maxlength="15">
                    <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
                    <input type="submit" value="Cadastrar">
                </form>
            <?php
//verificar se clicou no botão
if(isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $endereco = addslashes($_POST['endereco']);
    $cpf = addslashes($_POST['cpf']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confSenha']);

    //verificar se está vazio
    if(!empty($nome) && !empty($telefone)  &&!empty($endereco) && !empty($cpf) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
    {
        $u->conectar("jglogin","localhost","root","");
        if($u->msgErro == ""){
            if($senha == $confirmarSenha){
                if($u->cadastrar($nome,$telefone,$endereco,$cpf,$email,$senha))
                {
                    ?>
                    <div id="msg-sucesso">
                    Cadastrado com sucesso! Acesse para acessar todas as funcionalidades
                    </div>
                <?php
                }else
                {
                    ?>
                    <div class="msg-erro">
                    Email já cadastrado!
                    </div>
                    <?php
                }
            } else{
                ?>
                <div class="msg-erro">
                Senhas não correspondem!
                </div>
                <?php
            }            
        }else{
            ?>
                <div class="msg-erro">
                <?php echo "Erro:".$u.msgErro; ?>
                </div>
                <?php
        }
    }else{
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