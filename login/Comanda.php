 <?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: index.php");
    exit;
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

                <li class="list-group-item py-3 ">
                    <div class="text-center">
                        <h4 class="text-dark mb-3">Cliente: Vitor Hugo da Silva Ferreira</h4>
                        <h4 class="text-dark mb-3">Mesa: 04</h4>

                    </div>
                </li>

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


                                <div class="row">
                                    <div class="text mt-2">
                                        <h4 class="col-sm text-left">Quantidade: 01</h4>
                                    </div>
                                    <h4 class="col-sm text-left">Valor unidade: R$7,00</h4>
                                    <h4 class="col-sm text-right">Valor total: R$7,00</h4>
                                </div>

                    </li>
                    <li class="list-group-item py-3">
                        <div class="row g-3">
                            <div class="col-4 col-md-3 col-lg-2">
                                <!--Resposividade-->
                                <a href="#">
                                    <img src="imagens/refeicoes/hamburguer.jpg" class="img-thumbnail">
                                </a>
                            </div>
                            <div class="col-8 col-md-9 col-lg-7 col-xl-8 text-left align-self-center">
                                <h4>
                                    <b>
                                        <a href="#" class="text-decoration-none text-danger">
                                            Hamburguer
                                        </a>
                                    </b>
                                </h4>


                                <div class="row">
                                    <div class="text mt-2">
                                        <h4 class="col-sm text-left">Quantidade: 02</h4>
                                    </div>
                                    <h4 class="col-sm text-left">Valor unidade: R$14,99</h4>
                                    <h4 class="col-sm text-right">Valor total: R$29,98</h4>
                                </div>

                    </li>

                    <li class="list-group-item py-3">
                        <div class="row g-3">
                            <div class="col-4 col-md-3 col-lg-2">
                                <!--Resposividade-->
                                <a href="#">
                                    <img src="imagens/refeicoes/burritos.jpg" class="img-thumbnail">
                                </a>
                            </div>
                            <div class="col-8 col-md-9 col-lg-7 col-xl-8 text-left align-self-center">
                                <h4>
                                    <b>
                                        <a href="#" class="text-decoration-none text-danger">
                                            Burritos
                                        </a>
                                    </b>
                                </h4>


                                <div class="row">
                                    <div class="text mt-2">
                                        <h4 class="col-sm text-left">Quantidade: 02</h4>
                                    </div>
                                    <h4 class="col-sm text-left">Valor unidade: R$7,00</h4>
                                    <h4 class="col-sm text-right">Valor itens: R$14,00</h4>
                                </div>


                                <!-- Botões para fechar a comanda -->
                    <li class="list-group-item py-3">
                        <div class="text-right">
                            <h4 class="text-dark mb-3">Valor Total: R$ 53,96</h4>
                            <a href="cardapio.php" class="btn btn-outline-success btn-lg">Efetuar outro pedido</a>
                            <a href="pagamento.php" class="btn btn-danger btn-lg"> Pagar Comanda </a>
                        </div>
                    </li>
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