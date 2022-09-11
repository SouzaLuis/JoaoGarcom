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

$conexao = mysqli_connect('localhost', 'root', '','jglogin');
$id_estabelecimento = $_GET['id'];
$query = 'SELECT c.valor, c.pagamento FROM comanda c WHERE c.id = '.$id_comanda.' AND c.id_estabelecimento = '.$id_estabelecimento.' ORDER BY c.id ASC';
$resultado = mysqli_query($conexao, $query);
if(!empty($resultado)){
    if($comanda = mysqli_fetch_assoc($resultado)){
      $aberta = $comanda['pagamento'];
    }
  }

header("Refresh:60");

if($aberta == 1){
    header("location: inicio.php");
}

?>


<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <title>João Garçom</title>
</head>

<body style="min-width:372px;">
    <main>
        <nav class="navbar" style="background-color: rgb(160,4,4);">
            <h1 class="navbar mx-auto text-white">Finalizar Pedido</h1>
        </nav>
        <div class="container">
            
            </br>
            <h4>Escolha a forma de pagamento que deseja: </h4>
            </br>
            <form method="post">
                <li class="list-group-item py-3">
                    <div class="form-group form-check">
                        <input type="radio" class="form-check-input" id="pgto" name="pgto" value="1">
                        <label class="form-check-label" for="exampleCheck1">Cartão de Crédito ou Débito</label>
                    </div>
                </li>
                <li class="list-group-item py-3">
                    <div class="form-group form-check">
                        <input type="radio" class="form-check-input" id="pgto" name="pgto" value="2">
                        <label class="form-check-label" for="exampleCheck1">Dinheiro</label>
                    </div>
                </li>
                <li class="list-group-item py-3">
                    <div class="form-group form-check">
                        <input type="radio" class="form-check-input" id="pgto" name="pgto" value="3">
                        <label class="form-check-label" for="exampleCheck1">Pix</label>
                    </div>
                </li>
                <li class="list-group-item py-3">
                    <h4 class="text-center">Gorjeta Solidária</h4>
                    <p>
                        Como foi a experiência com nossa plataforma? Deseja doar uma pequena e simbólica gorjeta para o <strong>João Garcom</strong>?
                        <br/>
                        A gorjeta doada será destinada para investimentos com a finalidade de melhorar sua experiência com nossa aplicação.
                    </p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="doacao" name="doacao">
                        <label class="form-check-label" for="flexCheckDefault">
                            Deseja doar a quantia de R$1,00 ?
                        </label>
                    </div>
                    <div class="text-center">
                        <input type="hidden" name="id" value="<?=$id_estabelecimento?>">
                        <input type="hidden" name="id_comanda" value="<?=$id_comanda?>">
                        <button type="submit" name="pagar" style="background-color: rgb(160,4,4);" class="btn btn-danger">Efetuar o pagamento!</button>
                    </div>  
                </li>
            </form>
                </br></br></br></br>
        </div>
    </main>
    <?php
        if(isset($_POST['pagar'])){
            $pgto = addslashes($_POST['pgto']);
            $id = addslashes($_POST['id']);
            $id_comanda = addslashes($_POST['id_comanda']);
            
            //verificar se está vazio
            if(!empty($pgto) && !empty($id)){
                
                $c->conectar("jglogin","localhost","root","");
                if($c->msgErro == ""){
                    if($c->efetuar_pagamento($pgto, $id, $id_comanda)){}           
                }else{
                }
            }               
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>