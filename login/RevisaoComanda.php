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
      <h1 class="navbar mx-auto text-white">Revisão da Comanda</h1>
    </nav>

    <div class="container">
      <br>
      <?php
        $conexao = mysqli_connect('localhost', 'root', '','jglogin');
        $query = "SELECT "
      ?>
      <ul class="list-group mb-3">
        <li class="list-group-item py-3">
          <div class="row g-3">
            <div class="col-4 col-md-3 col-lg-2">
              <!--Resposividade-->
              <a href="#">
                <img src="imagens/refeicoes/pizza.jpg" class="img-thumbnail">
              </a>
            </div>
            <div class="col-8 col-md-9 col-lg-7 col-xl-8 text-left align-self-center">
              <h4>
                <b>
                  <a href="#" class="text-decoration-none text-danger">
                    Fatia de Pizza
                  </a>
                </b>
              </h4>
              <h4 class="text-dark">
                <small>
                  Fatia de pizza de calabresa
                </small>
              </h4>
            </div>

            <!-- Divisao onde aumenta a quantidade/exclui -->
            <div class="col-6 offset-6 col-sm-6 offset-sm-6 col-md-4 offset-md-8 col-lg-3 offset-lg-0 col-xl-2 align-self-center mt-3">
              <div class="input-group">

                <button type="button" class="btn btn-outline-dark btn-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentcolor" class="bi bi-caret-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.204 5 8 10.481 12.796 5H3.204zm-.753.659 4.796 5.48a1 1 0 001.506.0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 00-.753 1.659z"></path>
                  </svg>
                </button>

                <input type="text" class="form-control text-center border-dark" value="1">

                <button type="button" class="btn btn-outline-dark btn-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentcolor" class="bi bi-caret-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.204 11 8 5.519 12.796 11H3.204zm-.753-.659 4.796-5.48a1 1 0 011.506.0l4.796 5.48c.566.647.106 1.659-.753 1.659H3.204a1 1 0 01-.753-1.659z"></path>
                  </svg>
                </button>

                <button type="button" class="btn btn-outline-danger border-dark btn-sm">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentcolor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5.0 016 6v6a.5.5.0 01-1 0V6a.5.5.0 01.5-.5zm2.5.0a.5.5.0 01.5.5v6a.5.5.0 01-1 0V6a.5.5.0 01.5-.5zm3 .5a.5.5.0 00-1 0v6a.5.5.0 001 0V6z"></path>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4 4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                  </svg>
                </button>
              </div>
              <div class="text-right mt-2">
                <small class="text-secondary">Valor un: R$ 9,98</small><br>
                <span class="text-dark">Valor itens: R$ 9,98</span>
              </div>
            </div>
        </li>

        <!-- Botões para fechar a comanda -->
        <li class="list-group-item py-3">
          <div class="text-right">
            <h4 class="text-dark mb-3">Valor Total: R$ 53,96</h4>
            <a href="http://localhost/joaogarcom/login/cardapio.php" class="btn btn-outline-success btn-lg"> Continuar Pedindo </a>
            <a href="Comanda.php" class="btn btn-danger btn-lg">Confirmar Pedido</a>
          </div>
        </li>
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