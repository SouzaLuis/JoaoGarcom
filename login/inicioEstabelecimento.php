<?php
    session_start();
    if(!isset($_SESSION['id']))
    {
        header("location: index.php");
        exit;
    }
    $id_estabelecimento = $_SESSION['id'];
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
    <nav class="navbar" style="background-color: rgb(160,4,4);">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" style="background-color: rgb(160,4,4);color:white;" href="">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="background-color: rgb(160,4,4);color:white;" href="cadastroProdutos.php">Alterar Cardápio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" style="background-color: rgb(160,4,4);" href="">Acompanhar Relatório Financeiro</a>
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
    </div>
    <div class='row'>
        <div class="container-fluid" style="width:100%;"> 
            <?php
            $conexao = mysqli_connect('localhost', 'root', '','jglogin');
            $query = 'SELECT * FROM mesa m WHERE m.id_estabelecimento = '.$id_estabelecimento;
            $result = mysqli_query($conexao, $query);
            if($result):
                if(mysqli_num_rows($result)>0):
                    echo "<div class='row'>";
                    $col=1;
                    while($mesas = mysqli_fetch_assoc($result)):
                        for($i=1;$i<=$mesas['quantidade'];$i++):
                        ?>
                            <div class="col-sm-3 col-md-3">
                                <div class="card-group">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <form method="POST">
                                                <h4 class="card-tittle"><?php echo $i ?></h4>
                                                <img src="imagens/mesa.png" style="width: 150px; height: 100px; border-radius: 35px; margin-bottom:15px" class="img-responsive">                                                
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
                        endfor;
                    endwhile;
                endif;
            endif;              
            ?>
        </div>
    </div>
</body>
</html>