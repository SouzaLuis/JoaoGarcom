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
$id_usuario = $_SESSION['id'];
$id_comanda = $_SESSION['id_comanda'];

if(isset($_POST['pagamento'])){
    header("location: pagamento.php");
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
    <header>
  
    </header>

    <main>

        <nav class="navbar" style="background-color: rgb(160,4,4);">
            <h1 class="navbar mx-auto text-white">Sua Comanda</h1>
        </nav>

        <div class="container">
            <div class="container">
                
                <br>
                <?php
                    $conexao = mysqli_connect('localhost', 'root', '','jglogin');
                    $query = "SELECT p.imagem, p.nome, p.descricao, p.preco un, pc.quantidade, pc.valor valor_c, c.valor total, c.id_estabelecimento FROM produto_comanda pc INNER JOIN produtos p ON p.id = pc.id_produto INNER JOIN comanda c ON c.id = pc.id_comanda WHERE pc.id_comanda = ".$id_comanda." AND c.id_usuario = ".$id_usuario." AND c.pagamento=0 ORDER BY pc.id_produto ASC";
                    $query_usuario = "SELECT u.nome, c.numero_mesa FROM comanda c INNER JOIN usuario u ON u.id = c.id_usuario WHERE u.id = ".$id_usuario." and c.id = ".$id_comanda." ORDER BY u.id ASC";
                    $result = mysqli_query($conexao, $query);
                    $result_usuario = mysqli_query($conexao, $query_usuario);
                    if($result_usuario):
                        if(mysqli_num_rows($result_usuario)>0):
                            while($usuario = mysqli_fetch_assoc($result_usuario)):
                ?>
                <li class="list-group-item py-3 ">
                    <div class="text-center">
                        <h4 class="text-dark mb-3">Cliente: <?php echo $usuario['nome']; ?></h4>
                        <h4 class="text-dark mb-3">Mesa: <?php echo $usuario['numero_mesa']; ?></h4>

                    </div>
                </li>
                <?php
                            endwhile;
                        endif;
                    endif;
                    $total = 0;
                    $total_geral = 0;
                    if($result):
                        if(mysqli_num_rows($result)>0):
                            while($produtos = mysqli_fetch_assoc($result)):
                                $id_estabelecimento = $produtos['id_estabelecimento'];
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
                        <div class="text-right mt-2">
                            <small class="text-secondary">Valor un: R$ <?php echo $produtos['un']; ?> ( Qtd: <?php echo $produtos['quantidade']; ?> )</small><br>
                            <?php 
                                $total_geral = $produtos['total'];
                            ?>
                            <span class="text-dark">Valor itens: R$ <?php echo $produtos['valor_c']; ?></span>
              </div> 
                    </li>
                    <?php
                endwhile;
            endif;
        endif;
        ?> 
        <!-- Botões para fechar a comanda -->
        <li class="list-group-item py-3">
          <div class="text-right">
            <form method="post">
              <h4 class="text-dark mb-3">Valor Total: R$ <?php echo $total_geral; ?></h4>
              <button class="btn btn-danger btn-lg" type="submit" name="pagamento">Pagar Comanda</button>
            </form>
            <?php
              if(isset($_POST['pagamento'])){                
                $garcom = 1;
                $c->conectar("jglogin","localhost","root","");
                if($c->msgErro == ""){
                  if($c->pagar_comanda($garcom, $id_comanda)){}            
                }
              }
            ?>
          </div>
        </li>
                    </br>
                    </br>




            </div>
            </ul>
        </div>
    </main>

    <footer class="footer mt-auto py-3" style="background-color: rgb(160,4,4);">
        <div class="container">
            <span class="text-muted">
              <p class="text-white text-center">Todos os direitos reservados @GLVSoftHouse!</p>
            </span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>