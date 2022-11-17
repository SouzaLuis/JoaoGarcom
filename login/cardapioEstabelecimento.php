<?php
    session_start();
    if(!isset($_SESSION['id']))
    {
        header("location: index.php");
        exit;
    }
    $id_estabelecimento = $_SESSION['id'];

    if(isset($_POST['apagar'])){
        header("Refresh:0");
    }
    require_once 'classes/produto.php';
    $u = new Produto;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio</title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstraopcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

</head>
    <body style="min-width:372px;">
        <header>
            <nav class="navbar" style="background-color: rgb(160,4,4);">
                <h1 class="navbar mx-auto text-white">Restaurante Megaville</h1>
            </nav>
        </header>
        <br>
        <div class="text-center">
        <button style="background-color: rgb(160,4,4); width:300px;" class="btn btn-danger btn-lg"><a style="text-decoration:none; color: white" href="cadastroProdutos.php">Voltar</a></button>
        </div>
        <br>
        <div class="container-fluid"> 
            <?php
                $conexao = mysqli_connect('localhost', 'root', '','jglogin');
                $query = 'SELECT * FROM produtos p WHERE p.id_estabelecimento = '.$id_estabelecimento.' ORDER BY p.id ASC';
                $result = mysqli_query($conexao, $query);
                    if($result):
                        if(mysqli_num_rows($result)>0):
                            echo "<div class='row'>";
                            $col=1;
                            while($produtos = mysqli_fetch_assoc($result)):
                            ?>
                                <div class="col-sm-3 col-md-3">
                                    <div class="card-group">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <form method="POST" action="editarProdutos.php?id=<?php echo $produtos['id'];?>">
                                                    <h4 class="card-tittle"><?php echo $produtos['nome']; ?></h4>
                                                    <img src="<?php echo $produtos['imagem']; ?>" style="width: 150px; height: 100px; border-radius: 35px; margin-bottom:15px" class="img-responsive">
                                                    <p class="card-text" style="height: 50px"><?php echo $produtos['descricao']; ?></p>
                                                    <h3 class="card-text">R$ <?php echo $produtos['preco']; ?></h3>
                                                    <br><br>
                                                    <input type="submit" style="background-color: rgb(160,4,4);width:150x;float:left" class="btn btn-danger btn-lg" value="Editar">
                                                </form>
                                                <form method="POST">
                                                    <input type="hidden" name="id" value="<?php echo $produtos['id']; ?>">
                                                    <input type="hidden" name="id_estabelecimento" value="<?php echo $produtos['id_estabelecimento']; ?>">
                                                    <input type="submit" style="background-color: rgb(160,4,4);width:150x;float:right" class="btn btn-danger btn-lg" name="apagar" value="Apagar">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            $col++;
                            if($col>4){
                                echo "</div>";
                                echo "<div class='row'>";
                                $col=1;
                            }
                            endwhile;
                        endif;
                    endif;
                    //verificar se clicou no botão
                    if(isset($_POST['id']))
                    {
                        $id = addslashes($_POST['id']);
                        $id_estabelecimento = addslashes($_POST['id_estabelecimento']);

                        $u->conectar("jglogin","localhost","root","");
                        if($u->msgErro == ""){
                            if($u->deletar($id,$id_estabelecimento))
                            {
                            }            
                        }
                    }                
            ?>
        </div>
    </body>
</html>