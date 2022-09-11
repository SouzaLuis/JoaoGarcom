<?php
    require_once 'classes/estabelecimento.php';
    require_once 'classes/usuario.php';
    $e = new Estabelecimento; 
    $u = new Usuario;
    session_start();    
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8"/>  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
        
    <title>João Garçom</title>

</head>

<body class="body-index">  
  <div class="container-md" style="margin-top: 10px;"> 
    <ul class="nav nav-tabs" id="myTab">
        <li class="nav-item ">
            <a href="#home" class="nav-link active text-danger" data-bs-toggle="tab" >Estabelecimento </a>
        </li>
        <li class="nav-item">
            <a href="#profile" class="nav-link text-danger" data-bs-toggle="tab">Cliente</a>
        </li>
       
    </ul>
    <div class="tab-content">
         <!-- Container estabelecimento -->
        <div class="tab-pane fade show active" id="home">
            <div class="container login-container">
            <div class="row">
                 <!-- Coluna login estabelecimento -->
                <div class="col-md-6 login-form-1">
                    <h3>Entrar</h3>
                    <form name="frmestab" method="POST" action="index.php">
                        <div class="form-group"> <input type="email" class="form-control" name="emailEl" placeholder="Usuário"> </div>
                        <div class="form-group"> <input type="password" class="form-control" name="senhaEl" placeholder="Senha"> </div>
                        <div class="form-group"> <input type="submit" class="btnSubmit" value="Acessar"> </div>      
                    </form>
                    <?php
                        if(isset($_POST['emailEl']))
                        {
                            $emailEl = addslashes($_POST['emailEl']);
                            $senhaEl = addslashes($_POST['senhaEl']);
                            if(!empty($emailEl) && !empty($senhaEl))
                            {
                                $e->conectar("jglogin","localhost","root","");
                                if($e->msgErro == ""){
                                if($e->logar($emailEl, $senhaEl)){
                                    header("location: inicioEstabelecimento.php");
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
                                <?php echo "Erro: ".$e->msgErro ?>
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



                <!-- Coluna cadastro estabelecimento -->
                <div class="col-md-6 login-form-2">
                    <h3>Registro</h3>
                    <form method="POST">
                        <div class="form-group"> <input type="text" class="form-control" name="nomeEc" placeholder="Nome do Estabelecimeto" maxlength="30"> </div>
                        <div class="form-group"> <input type="text" class="form-control" name="telefoneEc" placeholder="Telefone" maxlength="30"> </div>
                        <div class="form-group"> <input type="text" class="form-control" maxlength="9" id="cep" name="cepEc" placeholder="CEP: 00000-000"> </div>
                        <div class="form-group"> <input type="text" class="form-control" id="logradouro" name="logradouroEc"  placeholder="Rua: ************, N°:"> </div>
                        <div class="form-group"> <input type="text" class="form-control" id="bairro" name="bairroEc" placeholder="Bairro"> </div>
                        <div class="form-group"> <input type="text" class="form-control" id="localidade" name="localidadeEc" placeholder="Cidade"> </div>
                        <div class="form-group"> <input type="text" class="form-control" id="uf" name="ufEc" placeholder="Estado"> </div> 
                        <div class="form-group"> <input type="text" class="form-control" name="cnpjEc" placeholder="CNPJ" maxlength="19"> </div>
                        <div class="form-group"> <input type="email" class="form-control" name="emailEc" placeholder="Usuário" maxlength="50"> </div>
                        <div class="form-group"> <input type="password" class="form-control" name="senhaEc" placeholder="Senha" maxlength="15"> </div>
                        <div class="form-group"> <input type="password" class="form-control" name="confSenhaEc" placeholder="Confirmar Senha" maxlength="15"> </div>
                        <div class="form-group"> <input type="submit" class="btnSubmit" value="Cadastrar" /> </div>     
                    </form>
                    <?php
                        //verificar se clicou no botão
                        if(isset($_POST['nomeEc']))
                        {
                            $nomeEc = addslashes($_POST['nomeEc']);
                            $telefoneEc = addslashes($_POST['telefoneEc']);
                            $cepEc = addslashes($_POST['cepEc']);
                            $logradouroEc =addslashes($_POST['logradouroEc']);
                            $bairroEc = addslashes($_POST['bairroEc']);
                            $localidadeEc = addslashes($_POST['localidadeEc']);
                            $ufEc = addslashes($_POST['ufEc']);
                            $cnpjEc = addslashes($_POST['cnpjEc']);
                            $emailEc = addslashes($_POST['emailEc']);
                            $senhaEc = addslashes($_POST['senhaEc']);
                            $confirmarSenhaEc = addslashes($_POST['confSenhaEc']);
                            
                            //verificar se está vazio
                            if(!empty($nomeEc) && !empty($telefoneEc) && !empty($cepEc)  && !empty($logradouroEc)  && !empty($bairroEc)  && !empty($ufEc) && !empty($cnpjEc) && !empty($emailEc) && !empty($senhaEc) && !empty($confirmarSenhaEc))
                            {
                                $e->conectar("jglogin","localhost","root","");
                                if($e->msgErro == ""){
                                    if($senhaEc == $confirmarSenhaEc){
                                        if($e->cadastrar($nomeEc,$telefoneEc, $cepEc, $logradouroEc, $bairroEc, $localidadeEc, $ufEc, $cnpjEc, $emailEc, $senhaEc))
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
                                        <?php echo "Erro:".$e.msgErro; ?>
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
    </div>

        
        
        <!-- Container Clientes -->
        <div class="tab-pane fade" id="profile">
            <div class="container login-container">
            <div class="row">
                 <!-- Coluna login usuario -->
                <div class="col-md-6 login-form-1">
                    <h3>Entrar</h3>
                     <form name="frmcliente" method="POST" action="index.php">
                        <div class="form-group"> <input type="email" class="form-control" name="emailUl" placeholder="Usuário"> </div>
                        <div class="form-group"> <input type="password" class="form-control" name="senhaUl" placeholder="Senha"> </div>
                        <div class="form-group"> <input type="submit" class="btnSubmit" value="Acessar"> </div>
                    </form>
                    <?php
                        if(isset($_POST['emailUl']))
                        {
                            
                            $emailUl = addslashes($_POST['emailUl']);
                            $senhaUl = addslashes($_POST['senhaUl']);
                            if(!empty($emailUl) && !empty($senhaUl))
                            {
                                $u->conectar("jglogin","localhost","root","");
                                if($u->msgErro == ""){
                                if($u->logar($emailUl, $senhaUl)){
                                   // header("location: inicio.php")
                                   echo "<script> window.location.href='inicio.php'; </script>";
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
                <div class="col-md-6 login-form-2">
                    <h3>Cadastrar</h3>
                    <form method="POST">
                        <div class="form-group"> <input type="text" class="form-control" name="nomeUc" placeholder="Nome Completo " maxlength="30"> </div>
                        <div class="form-group"> <input type="text" class="form-control" name="telefoneUc" placeholder="Telefone" maxlength="30"> </div>
                        <div class="form-group"> <input type="text" class="form-control" maxlength="9" id="cepU" name="cepUc" placeholder="CEP: 00000-000"></div>
                        <div class="form-group"> <input type="text" class="form-control" id="logradouroU" name="logradouroUc"  placeholder="Rua: ************, N°:"> </div>
                        <div class="form-group"> <input type="text" class="form-control" id="bairroU" name="bairroUc" placeholder="Bairro"> </div>
                        <div class="form-group"> <input type="text" class="form-control" id="localidadeU" name="localidadeUc" placeholder="Cidade"> </div>
                        <div class="form-group"> <input type="text" class="form-control" id="ufU" name="ufUc" placeholder="Estado"> </div>
                        <div class="form-group"> <input type="text" class="form-control" name="cpfUc" placeholder="CPF" maxlength="19"> </div>
                        <div class="form-group"> <input type="email" class="form-control" name="emailUc" placeholder="Email" maxlength="50"> </div>
                        <div class="form-group"> <input type="password" class="form-control" name="senhaUc" placeholder="Senha" maxlength="15"> </div>
                        <div class="form-group"> <input type="password" class="form-control" name="confSenhaUc" placeholder="Confirmar Senha" maxlength="15"> </div>
                        <div class="form-group"> <input type="submit" class="btnSubmit" value="Cadastrar" /> </div>
                    </form>
                    <?php
                    //verificar se clicou no botão
                    if(isset($_POST['nomeUc']))
                    {
                        $nomeUc = addslashes($_POST['nomeUc']);
                        $telefoneUc = addslashes($_POST['telefoneUc']);
                        $cepUc = addslashes($_POST['cepUc']);
                        $logradouroUc =addslashes($_POST['logradouroUc']);
                        $bairroUc = addslashes($_POST['bairroUc']);
                        $localidadeUc = addslashes($_POST['localidadeUc']);
                        $ufUc = addslashes($_POST['ufUc']);
                        $cpfUc = addslashes($_POST['cpfUc']);
                        $emailUc = addslashes($_POST['emailUc']);
                        $senhaUc = addslashes($_POST['senhaUc']);
                        $confirmarSenhaUc = addslashes($_POST['confSenhaUc']);
                    
                        //verificar se está vazio
                        if(!empty($nomeUc) && !empty($telefoneUc)  && !empty($cepUc)  && !empty($logradouroUc)  && !empty($localidadeUc) && !empty($bairroUc)  && !empty($ufUc) && !empty($cpfUc) && !empty($emailUc) && !empty($senhaUc) && !empty($confirmarSenhaUc))
                        {
                            $u->conectar("jglogin","localhost","root","");
                            if($u->msgErro == ""){
                                if($senhaUc == $confirmarSenhaUc){
                                    if($u->cadastrar($nomeUc,$telefoneUc, $cepUc, $logradouroUc, $bairroUc, $localidadeUc, $ufUc ,$cpfUc,$emailUc,$senhaUc))
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
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>