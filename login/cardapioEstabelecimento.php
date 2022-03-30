<?php
    session_start();
    if(!isset($_SESSION['id']))
    {
        header("location: index.php");
        exit;
    }
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
    <style>
        footer {
            position: fixed;
            height: 50px;
            bottom: 0;
            width: 100%;
            margin-left:0;
        }
    </style>
</head>
<body style="min-width:372px;">
    <header>
        <nav class="navbar" style="background-color: rgb(160,4,4);">
            <h1 class="navbar mx-auto text-white">Restaurante Megaville</h1>
         </nav>
    </header>
    <br>
    <div>
    <button style="background-color: rgb(160,4,4); width:300px;" class="btn btn-danger btn-lg"><a style="text-decoration:none; color: white" href="cadastroProdutos.php">Voltar</a></button>
    </div>
    <br>
    <div class="container-fluid"> 
        <?php
            $conexao = mysqli_connect('localhost', 'root', '','jglogin');
            $query = 'SELECT * FROM produtos ORDER BY id ASC';
            $result = mysqli_query($conexao, $query);
            //if($_SESSION['id'] == $id):
                if($result):
                    if(mysqli_num_rows($result)>0):
                        while($produtos = mysqli_fetch_assoc($result)):
                        ?>
                                
                        <div class="col-sm-3 col-md-3">
                            <div class="card-group">
                            <div class="card text-center">
                                <div class="card-body">
                                    <form method="POST" action="index.php?action=add&id=<?php echo $product['id']?>">
                                        <h4 class="card-tittle"><?php echo $produtos['nome']; ?></h4>
                                        <img src="<?php echo $produtos['imagem']; ?>" style="width: 150px; height: 100px; border-radius: 35px; margin-bottom:15px" class="img-responsive">
                                        <p class="card-text"><?php echo $produtos['descricao']; ?></p>
                                        <h3 class="card-text">R$ <?php echo $produtos['preco']; ?></h3>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                        <?php
                        endwhile;
                    endif;
                endif;
            //endif;
        ?>
    </div>
    
    <footer class="footer mt-auto py-3" style="background-color: rgb(160,4,4);">
        <span class="text-muted">
            <p class="text-white text-center">Todos os direitos reservados @GLVSoftHouse!</p>
        </span>
    </footer>
</body>
</html>

