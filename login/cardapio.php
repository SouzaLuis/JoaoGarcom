<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: index.php");
    exit;
}
if (!isset($_SESSION['id_comanda'])) {
    header("location: inicio.php");
    exit;
}

$id_comanda = $_SESSION['id_comanda'];

require_once 'classes/comanda.php';
$c = new Comanda;
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
    <div class="container-fluid"> 
        <?php
            $conexao = mysqli_connect('localhost', 'root', '','jglogin');
            $id_estabelecimento = $_GET['id'];
            $query = 'SELECT * FROM produtos p WHERE p.id_estabelecimento = '.$id_estabelecimento.' ORDER BY id ASC';
            $mesa = 'SELECT c.numero_mesa FROM comanda c WHERE c.id = '.$id_comanda.' ORDER BY id ASC';
            $dado = mysqli_query($conexao, $mesa);
            $result = mysqli_query($conexao, $query);
            $dados = mysqli_fetch_assoc($dado);
            
        ?>  
        <?php
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
                                    <form method="POST" action="">
                                        <h4 class="card-tittle"><?php echo $produtos['nome']; ?></h4>
                                        <img src="<?php echo $produtos['imagem']; ?>" style="width: 150px; height: 100px; border-radius: 35px; margin-bottom:15px" class="img-responsive">
                                        <p class="card-text" style="height: 50px"><?php echo $produtos['descricao']; ?></p>
                                        <h3 class="card-text">R$ <?php echo $produtos['preco']; ?></h3>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="quantidade">Quantidade</label>
                                            <select class="form-select" name="quantidade" id="quantidade">
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
                                        <input type="hidden" name="id" value="<?php echo $produtos['id']; ?>">
                                        <input type="hidden" name="preco" value="<?php echo $produtos['preco']; ?>">
                                        <input type="hidden" name="id_estabelecimento" value="<?php echo $produtos['id_estabelecimento']; ?>">
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
        <?php
        //verificar se clicou no botão
        if(isset($_POST['id'])){
            $quantidade = addslashes($_POST['quantidade']);
            $valor = addslashes($_POST['preco']);
            $id_produto = addslashes($_POST['id']);

            //verificar se está vazio
            if(!empty($id_comanda) && !empty($id_produto)){
                $c->conectar("jglogin","localhost","root","");
                if($c->msgErro == ""){
                    if($c->carregar_comanda($quantidade, $valor, $id_comanda, $id_produto))
                    {
                    }            
                }else{
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


