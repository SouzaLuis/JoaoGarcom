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
    <title>Tela Inicial Estabelecimento</title>
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
                $query = "SELECT pc.quantidade, pc.valor total, p.nome, p.imagem, p.preco FROM produto_comanda pc INNER JOIN produtos p ON p.id = pc.id_produto WHERE pc.id_comanda = ".$id_comanda." ORDER BY pc.id DESC";
                $result = mysqli_query($conexao, $query);
                if($result):
                    if(mysqli_num_rows($result)>0):
                        while($produtos = mysqli_fetch_assoc($result)):
                            echo "Passou aqui";
                        endwhile;
                    endif;
                endif;
            ?>
        </div>
    </div>
</body>
</html>