<?php
     session_start();
     if(!isset($_SESSION['id']))
     {
         header("location: index.php");
         exit;
     }
    $id_estabelecimento = $_SESSION['id'];
    require_once 'classes/produto.php';
    $u = new Produto;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cardápio Estabelecimento</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <style>
            #msg-sucesso{
                width: 400px;
                margin: 10px auto;
                padding: 10px;
                background-color: rgba(50,205,50,.3);
                border: 1px solid rgb(34,139,34);
                border-radius: 13px;
                color: #000;
            }
            .msg-erro{
                width: 400px;
                margin: 10px auto;
                padding: 10px;
                background-color: rgba(250,128,114,.3);
                border: 1px solid rgb(165,42,42);
                border-radius: 13px;
                color: #000;
            }
        </style>
    </head>

    <body style="min-width:372px;">
        <header>
            <nav class="navbar" style="background-color: rgb(160,4,4);">
                <h1 class="navbar mx-auto text-white">Cadastro de Produtos</h1>
            </nav>
        </header>
        <br>
        <div class="container" style="width:50%">
            <div class="text-center">
                <form method="POST">
                    <div class="row">
                            <h6 class="text-left" style="margin-top:15px">Digite o nome do produto:</h6>
                            <input type="text" class="form-control" name="nome" placeholder="Nome Produto" maxlength="80">
                            <h6 class="text-left" style="margin-top:15px">Digite o caminho para imagem:</h6>
                            <input type="text" class="form-control" name="imagem" placeholder="nome_pasta/nome_imagem.formato_imagem" maxlength="100">
                            <h6 class="text-left" style="margin-top:15px">Digite o valor do produto:</h6>
                            <input type="decimal" class="form-control" name="preco" placeholder="Preço" maxlength="10" value="0.00">
                            <h6 class="text-left" style="margin-top:15px">Digite uma descrição para o produto:</h6>
                            <input type="text" class="form-control" name="descricao" placeholder="Descrição" maxlength="120">
                            <input type="hidden" name="id_estabelecimento" value="<?php echo $id_estabelecimento; ?>">
                    </div>
                    <br>
                    <div>
                        <input type="submit" style="background-color: rgb(160,4,4);width:300px" class="btn btn-danger btn-lg" value="Cadastrar">
                        <button style="background-color: rgb(160,4,4); width:300px" class="btn btn-danger btn-lg"><a style="text-decoration:none; color: white" href="cardapioEstabelecimento.php">Visualizar Cardápio</a></button>
                    </div>
                    <br>
                    <button style="background-color: rgb(160,4,4); width:300px" class="btn btn-danger btn-lg"><a style="text-decoration:none; color: white" href="inicioEstabelecimento.php">Voltar</a></button>
                </form>
                <?php
                //verificar se clicou no botão
                if(isset($_POST['nome']))
                {
                    $nome = addslashes($_POST['nome']);
                    $imagem = addslashes($_POST['imagem']);
                    $preco = addslashes($_POST['preco']);
                    $descricao = addslashes($_POST['descricao']);
                    $id_estabelecimento = addslashes($_POST['id_estabelecimento']);

                    //verificar se está vazio
                    if(!empty($nome) && !empty($imagem) && !empty($preco) && !empty($descricao)  && !empty($id_estabelecimento)){
                        $u->conectar("jglogin","localhost","root","");
                        if($u->msgErro == ""){
                            if($u->cadastrar($nome,$imagem,$preco,$descricao,$id_estabelecimento))
                            {
                                 ?>
                                <div id="msg-sucesso">
                                Cadastrado com sucesso!
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
    </body>
</html>