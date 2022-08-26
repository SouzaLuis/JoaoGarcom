<?php
    session_start();
    if(!isset($_SESSION['id']))
    {
        header("location: index.php");
        exit;
    }
    if (!isset($_SESSION['id_comanda'])) {
        header("location: inicioEstabelecimento.php");
        exit;
    }
    $id_estabelecimento = $_SESSION['id'];
    $id_comanda = $_SESSION['id_comanda'];

    require_once 'classes/mesa.php';
    $u = new Mesa;
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <title>Revisão de Mesa</title>
    </head>
    <body>
        <nav class="navbar" style="background-color: rgb(160,4,4);">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" style="background-color: rgb(160,4,4);color:white;" href="inicioEstabelecimento.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="float:right background-color: rgb(160,4,4);color:white; text-decoration:none" href="sair.php">Sair</a>
                </li>  
            </ul>
        </nav>
        <div class="container">
            <div class="container">
                <?php
                    $conexao = mysqli_connect('localhost', 'root', '','jglogin');
                    $query = "SELECT pc.quantidade, pc.valor total, c.valor, p.nome, p.descricao, p.imagem, p.preco FROM produto_comanda pc INNER JOIN comanda c ON c.id = pc.id_comanda INNER JOIN produtos p ON p.id = pc.id_produto WHERE pc.id_comanda = ".$id_comanda." ORDER BY pc.id DESC";
                    $result = mysqli_query($conexao, $query);
                    if($result):
                        if(mysqli_num_rows($result)>0):
                            while($produtos = mysqli_fetch_assoc($result)):
                            ?>
                            <ul class="list-group mb-3">
                                <li class="list-group-item py-3">
                                    <div class="row g-3">
                                        <div class="col-4 col-md-3 col-lg-2">
                                        <!--Resposividade-->
                                        <a href="#">
                                            <img src="<?php echo $produtos['imagem']; ?>" class="img-thumbnail">
                                        </a>
                                        </div>
                                        <div class="col-8 col-md-9 col-lg-7 col-xl-8 text-left align-self-center">
                                            <h4>
                                                <b>
                                                <a href="#" class="text-decoration-none text-danger">
                                                    <?php echo $produtos['nome']; ?>
                                                </a>
                                                </b>
                                            </h4>
                                            <h4 class="text-dark">
                                                <small>
                                                <?php echo $produtos['descricao']; ?>
                                                </small>
                                            </h4>
                                        </div>
                                        <?php 
                                            $total_geral = $produtos['valor'];
                                        ?>
                                        <div class="text-right mt-2">
                                            <small class="text-secondary">Valor un: R$ <?php echo $produtos['preco']; ?> ( Qtd: <?php echo $produtos['quantidade']; ?> )</small><br>
                                            <span class="text-dark">Valor itens: R$ <?php echo $produtos['total']; ?></span>
                                        </div>
                                    </div> 
                                </li>
                            
                            <?php
                            endwhile;
                        endif;
                    endif;
                ?>
                </ul>
                <li class="list-group-item py-3">
                    <div class="row g-3">
                        <div class="col-4 col-md-3 col-lg-2">
                            <button style="background-color: rgb(160,4,4); width:300px;" class="btn btn-danger btn-lg"><a style="text-decoration:none; color: white" href="inicioEstabelecimento.php">Voltar</a></button>
                        </div>
                        <div class="col-8 col-md-9 col-lg-7 col-xl-8 text-center align-self-center">
                            <h4 class="text-dark mb-3">Valor Total: R$ <?php echo $total_geral; ?></h4>
                        </div>
                    </div>
                </li>
            </div>
        </div>
    </body>
</html>