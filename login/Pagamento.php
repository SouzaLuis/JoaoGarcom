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
        <!-- <nav id="cardapio-top">
      <h1 class="logo">Nome do estabelecimento</h1>
    </nav> -->
    </header>

    <main>

        <nav class="navbar" style="background-color: rgb(160,4,4);">
            <h1 class="navbar mx-auto text-white">Finalizar Pedido</h1>
        </nav>

        <div class="container">
            </br>
            <h4>Escolha a forma de pagamento que deseja: </h4>
            </br>

            <!--Radio button Collpase (esconde o conteudo)-->

            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <li class="list-group-item py-3">
                            <input name="collapseGroup" type="radio" data-toggle="collapse" data-target="#collapseOne" /> Cartão de Crédito

                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">

                                    <div id="collapseOne" class="panel-collapse collapse">
                                        </br>
                                        <div class="panel-body">
                                            <div class="custom-control custom-radio">


                                            </div>



                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="cc-name">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Nome no cartão</font>
                                                        </font>
                                                    </label>
                                                    <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                                                    <small class="text-muted">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Nome completo conforme exibido no cartão</font>
                                                        </font>
                                                    </small>
                                                    <!-- <div class="invalid-feedback">
                                                    Nome no cartão é obrigatório
                                                    </div> -->
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="cc-number">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Número do cartão de crédito</font>
                                                        </font>
                                                    </label>
                                                    <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                                                    <!-- <div class="invalid-feedback">
                                                    O número do cartão de crédito é obrigatório
                                                    </div> -->
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="cc-expiration">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Vencimento</font>
                                                        </font>
                                                    </label>
                                                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                                                    <!-- <div class="invalid-feedback">
                                                    Data de expiração necessária
                                                    </div> -->
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="cc-expiration">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">CVV</font>
                                                        </font>
                                                    </label>
                                                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                                                    <!-- <div class="invalid-feedback">
                                                    Código de sefurança necessário
                                                    </div> -->

                                                </div>

                                                <div class="text-right">
                                                    <h4 class="text-dark mb-3">Valor Total: R$15,96</h4>
                                                    <a href="inicio.php" class="btn btn-outline-success btn-lg"> Pagar Comanda </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <!--************************************************************************************************************-->

                        </br>

                        <li class="list-group-item py-3">
                            <input name="collapseGroup" type="radio" data-toggle="collapse" data-target="#collapseDebito" /> Cartão de Débito

                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">

                                    <div id="collapseDebito" class="panel-collapse collapse">
                                        </br>
                                        <div class="panel-body">
                                            <div class="custom-control custom-radio">


                                            </div>



                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="cc-name">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Nome no cartão</font>
                                                        </font>
                                                    </label>
                                                    <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                                                    <small class="text-muted">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Nome completo conforme exibido no cartão</font>
                                                        </font>
                                                    </small>
                                                    <!-- <div class="invalid-feedback">
                                                    Nome no cartão é obrigatório
                                                    </div> -->
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="cc-number">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Número do cartão de crédito</font>
                                                        </font>
                                                    </label>
                                                    <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                                                    <!-- <div class="invalid-feedback">
                                                    O número do cartão de crédito é obrigatório
                                                    </div> -->
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 mb-3">
                                                    <label for="cc-expiration">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Vencimento</font>
                                                        </font>
                                                    </label>
                                                    <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                                                    <!-- <div class="invalid-feedback">
                                                    Data de expiração necessária
                                                    </div> -->
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="cc-expiration">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">CVV</font>
                                                        </font>
                                                    </label>
                                                    <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                                                    <!-- <div class="invalid-feedback">
                                                    Código de sefurança necessário
                                                    </div> -->

                                                </div>

                                                <div class="text-right">
                                                    <h4 class="text-dark mb-3">Valor Total: R$15,96</h4>
                                                    <a href="inicio.php" class="btn btn-outline-success btn-lg"> Pagar Comanda </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <!--************************************************************************************************************-->

                        </br>

                        <li class="list-group-item py-3">
                            <input name="collapseGroup" type="radio" data-toggle="collapse" data-target="#collapsePix" /> Pix

                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">

                                    <div id="collapsePix" class="panel-collapse collapse">
                                        </br>
                                        <div class="panel-body">
                                            <div class="custom-control custom-radio">
                                                <div class="col-4 col-md-3 col-lg-2">
                                                    <!--Resposividade-->
                                                    <a href="#">
                                                        <img src="imagens/qr.png" class="img-thumbnail">
                                                    </a>
                                                </div>
                                                <div class="text-right">
                                                    <h4 class="text-dark mb-3">Valor Total: R$15,96</h4>
                                                    <a href="inicio.php" class="btn btn-outline-success btn-lg"> Pagar Comanda </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <!--************************************************************************************************************-->

                        </br>

                        <li class="list-group-item py-3">
                            <input name="collapseGroup" type="radio" data-toggle="collapse" data-target="#collapseDinheiro" /> Dinheiro

                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">

                                    <div id="collapseDinheiro" class="panel-collapse collapse">
                                        </br>
                                        <div class="panel-body">
                                            <div class="col-md-8 mb-8">
                                                <small> - Aguarde um momento, o garçom irá vir até a mesa.</small>
                                            </div>

                                            <div class="text-right">
                                                <h4 class="text-dark mb-3">Valor Total: R$15,96</h4>
                                                <a href="inicio.php" class="btn btn-outline-success btn-lg"> Pagar Comanda </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>
                </div>

                </br></br>

                <li class="list-group-item py-3">
                    <h4 class="text-center">Gorjeta Solidária</h4>
                    <p>
                        Como foi a experiência com nossa plataforma? Deseja doar uma pequena e simbólica gorjeta para o <strong>João Garcom</strong>?
                        <br/>
                        A gorjeta doada será destinada para investimentos com a finalidade de melhorar sua experiência com nossa aplicação.
                    </p>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Deseja doar a quantia de R$1,00 ?
                        </label>
                    </div>
                </li>


                </br></br></br></br>

    </main>

    <footer class="footer mt-auto py-3" style="background-color: rgb(160,4,4);">
        <div class="container">
            <span class="text-muted">
                <p class="text-white text-center">Todos os direitos reservados @GLVSoftHouse!</p>
            </span>
        </div>
    </footer>


    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>