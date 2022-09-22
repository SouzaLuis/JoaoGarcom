<?php
    session_start();
    if(!isset($_SESSION['id']))
    {
        header("location: index.php");
        exit;
    }
    $id_estabelecimento = $_SESSION['id'];
    if(isset($_POST['pago'])){
        header("Refresh:0");
    }
    if(isset($_POST['detalhar'])){
        header("location: revisaoMesa.php");
    }
    require_once 'classes/mesa.php';
    $u = new Mesa;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <title>Tela Inicial Estabelecimento</title>
</head>
<body style="min-width:372px;">
    <header>
    </header>
    <nav class="navbar" style="background-color: rgb(160,4,4);">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" style="background-color: rgb(160,4,4);color:white;" href="">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="background-color: rgb(160,4,4);color:white;" href="cadastroProdutos.php">Alterar Cardápio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" style="background-color: rgb(160,4,4);" href="pedidosEstabelecimento.php">Acompanha Relatório Financeiro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="float:right background-color: rgb(160,4,4);color:white; text-decoration:none" href="sair.php">Sair</a>
            </li>  
        </ul>
    </nav> 
    <br>
    <div class="container" style="width:20%; float: left; margin-left: 20px">
        <div class="text-center">
            <form method="POST">
                <div class="row">
                    <input type="text" class="form-control" name="quantidade" placeholder="Quantidade Mesas" maxlength="3">
                    <input type="hidden" name="id_estabelecimento" value="<?php echo $id_estabelecimento; ?>">
                </div>
                <br>
                <div>
                    <input type="submit" style="background-color: rgb(160,4,4);width:100px" class="btn btn-danger btn-lg" value="Salvar">
                </div>
                <br>
            </form>
            <?php
            //verificar se clicou no botão

            if(isset($_POST['quantidade']))
            {
                $quantidade = addslashes($_POST['quantidade']);
                $id_estabelecimento = addslashes($_POST['id_estabelecimento']);
                //verificar se está vazio
                if(!empty($quantidade)){
                $u->conectar("jglogin","localhost","root","");
                    if($u->msgErro == ""){
                        if(!empty($u->verificacao($id_estabelecimento))){
                            if($u->editar($quantidade,$id_estabelecimento))
                            {}
                        }else{
                            if($u->cadastrar($quantidade,$id_estabelecimento))
                            {}
                        }
                    }
                }
            }            
            ?>
        </div>
        <?php
            $conexao = mysqli_connect('localhost', 'root', '','jglogin');
            $query = 'SELECT * FROM mesa m WHERE m.id_estabelecimento = '.$id_estabelecimento;
            $result = mysqli_query($conexao, $query);
            if($result):
                if(mysqli_num_rows($result)>0):
                    while($mesas = mysqli_fetch_assoc($result)):
                        ?>
                            <div class="col-sm-12 col-md-12">
                                <div class="card-group">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <form method="POST">
                                                <h4 class="card-tittle"><b>Quantidade de Mesas</b></h4>
                                                <h4 class="card-tittle"><?php echo $mesas['quantidade']; ?></h4>
                                                <img src="imagens/mesa.png" style="width: 150px; height: 100px; border-radius: 35px; margin-bottom:15px" class="img-responsive">                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    endwhile;
                endif;
            endif;              
        ?>
    </div>
    <div class="container-fluid">
        <div class="row">
            <?php
                $query_comanda = 'SELECT c.id, c.id_usuario, c.id_estabelecimento, c.numero_mesa, c.valor, c.aguardando_garcom, c.pedido_confirmado, c.forma_pagamento, u.nome FROM comanda c INNER JOIN usuario u ON u.id = c.id_usuario WHERE c.id_estabelecimento = '.$id_estabelecimento.' AND c.pagamento = 0 ORDER BY c.id DESC';
                $result_comanda = mysqli_query($conexao, $query_comanda);
                if($result_comanda):
                    if(mysqli_num_rows($result_comanda)>0):
                        while($comanda = mysqli_fetch_assoc($result_comanda)):
                            $id_usuario = $comanda['id_usuario'];
                            $garcom = $comanda['aguardando_garcom'];
                            $pedido = $comanda['pedido_confirmado'];
                            $pagamento = $comanda['forma_pagamento'];
                            if($garcom == 1 && $pagamento == 1){
                                $color = "d7ff96";
                                //verde claro
                                $status = "Cliente irá pagar no cartão, leve a máquininha";
                            } else if($garcom == 1 && $pagamento == 2){
                                $color = "d7ff96";
                                //verde claro
                                $status = "Cliente irá pagar no dinheiro";
                            } else if($garcom == 1 && $pagamento == 3){
                                $color = "d7ff96";
                                //verde claro
                                $status = "Cliente irá pagar no PIX";
                            } else if($garcom == 1 && $pedido == 1){
                                $color = "fff85a";
                                //amarelo mais escuro
                                $status = "Cliente está prestes a finalizar";
                            } else if($pedido == 1){
                                $color = "f8fc98";
                                //amarelo claro
                                $status = "Cliente já pediu";
                            } else{
                                $color = "eeeeee";
                                //transparente
                                $status = "Cliente ainda está escolhendo";
                            }
                            ?>
                                <div class="col-sm-12 col-md-12">
                                    <div class="card-group">
                                        <div class="card text-center">
                                            <div class="card-body" style="background-color: #<?=$color?>">
                                                <form method="POST">
                                                    <h4 class="card-tittle" style="float: left;"><b>N° Mesa:</b> <?php echo $comanda['numero_mesa']; ?></h4>
                                                    <h4 class="card-tittle" style="float: right;"><b>Cliente:</b> <?php echo $comanda['nome']; ?></h4>
                                                    <h4 class="card-tittle" style="float: center;"><b>Status:</b> <?=$status?></h4>
                                                    <br><br>
                                                    <h4 class="card-tittle" style="float: left;"><b>Valor Total:</b> R$ <?php echo $comanda['valor']; ?></h4>
                                                    <button style="background-color: rgb(160,4,4); width:150px; float: right; margin-right: 10px;" type="submit" id="detalhar" name="detalhar" class="btn btn-danger btn-lg" data-toggle="modal" data-target=".bd-example-modal-lg">Detalhes</button>
                                                    <input type="hidden" name="id_comanda" value="<?php echo $comanda['id']; ?>">
                                                    <input type="hidden" name="id_estabelecimento" value="<?php echo $comanda['id_estabelecimento']; ?>">
                                                    <input type="hidden" name="id_usuario" value="<?php echo $comanda['id_usuario']; ?>">
                                                    <button type="submit" id="pago" name="pago" class="btn btn-success btn-lg" style="float: right; width: 150px; margin-right: 10px;" <?php echo $pagamento > 0 ? '' : 'disabled' ; ?>>Pago</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                if(isset($_POST['pago'])){
                                    $id_comanda = addslashes($_POST['id_comanda']);
                                    $id_estabelecimento = addslashes($_POST['id_estabelecimento']);
                                    $id_usuario = addslashes($_POST['id_usuario']);
                                    
                                    if(!empty($id_comanda) && !empty($id_estabelecimento) && !empty($id_usuario)){
                                        $u->conectar("jglogin","localhost","root","");
                                        if($u->msgErro == ""){
                                            if($u->fechar_mesa($id_comanda, $id_estabelecimento, $id_usuario)){}
                                        }
                                    }
                                }
                                if(isset($_POST['detalhar'])){
                                    $id_comanda = addslashes($_POST['id_comanda']);
                                    
                                    if(!empty($id_comanda)){
                                        $u->conectar("jglogin","localhost","root","");
                                        if($u->msgErro == ""){
                                            if($u->detalhar_comanda($id_comanda)){
                                            }
                                        }
                                    }
                                }
                        endwhile;
                    endif;
                endif;
            ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>