<?php
session_start();
if (!isset($_SESSION['id'])) {
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body style="min-width:372px;">
    <header>
        <nav class="navbar" style="background-color: rgb(160,4,4);">
            <h1 class="navbar mx-auto text-white">Restaurante Megaville</h1>
         </nav>
    </header>
    <div class="text-center">
        <div class="input-group input-group-sm mb-3" style="width: 20%;padding: 10px">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-sm">Mesa n°</span>
            </div>
            <input type="text" class="form-control" aria-label="Exemplo do tamanho do input" aria-describedby="inputGroup-sizing-sm" placeholder="99" style="text-align:center">
        </div>
    </div>
    <div class="container-fluid"> 
        <?php
            $conexao = mysqli_connect('localhost', 'root', '','jglogin');
            $query = 'SELECT * FROM produtos ORDER BY id ASC';
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
                                    <form method="POST" action="index.php?action=add&id=<?php echo $product['id']?>">
                                        <h4 class="card-tittle"><?php echo $produtos['nome']; ?></h4>
                                        <img src="<?php echo $produtos['imagem']; ?>" style="width: 150px; height: 100px; border-radius: 35px; margin-bottom:15px" class="img-responsive">
                                        <p class="card-text" style="height: 50px"><?php echo $produtos['descricao']; ?></p>
                                        <h3 class="card-text">R$ <?php echo $produtos['preco']; ?></h3>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="inputGroupSelect01">Quantidade</label>
                                            <select class="form-select" id="inputGroupSelect01">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="nome" value="<?php echo $produtos['nome']; ?>">                                                    
                                        <input type="hidden" name="preco" value="<?php echo $produtos['preco']; ?>">
                                        <input type="submit" name="carrinho" style="background-color: rgb(160,4,4);" class="btn btn-danger" value="Quero!">
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
        ?>
        <li class="list-group-item py-3" style="border: 0px">
            <div class="text-center">
                <a href="revisaocomanda.php" style="background-color: rgb(160,4,4);" class="btn btn-danger btn-lg"> Acessar Comanda</a>
            </div>
        </li>
    </div>
    <footer class="footer mt-auto py-3" style="background-color: rgb(160,4,4);">
        <span class="text-muted">
            <p class="text-white text-center">Todos os direitos reservados @GLVSoftHouse!</p>
        </span>
    </footer>
</body>
</html>


