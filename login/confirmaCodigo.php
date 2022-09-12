<?php
    session_start();
    if(!isset($_SESSION['id']))
    {
        header("location: index.php");
        exit;
    }
    $id_usuario = $_SESSION['id'];

    require_once 'classes/comanda.php';
    $c = new Comanda;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" 
      integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
      <title>Tela Inicial</title>
      <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" ></script>
  </head>
    <body style="min-width:372px;">
        <nav class="navbar navbar-expand-lg" style="background-color: rgb(160,4,4);">
        <a class="navbar-brand text-white font-weight-bold" style="margin-left: 20px;" href="inicio.php">INÍCIO</a>
        <div class="collapse navbar-collapse"  id="navbarNavDropdown"></div>
        <div>
            <ul style="list-style: none;">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img
                        src="imagens/config.png"
                        height="25"
                    />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Configurações</a>
                        <a class="dropdown-item" href="sair.php">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
        </nav>
        <br><br><br>
        <div class="container" style="width:100%"> 
            <div class="text-center">
                <?php
                    $conexao = mysqli_connect('localhost', 'root', '','jglogin');
                    $id_estabelecimento = $_GET['id'];
                    $query = 'SELECT * FROM estabelecimento WHERE id = '.$id_estabelecimento.' ORDER BY id ASC';
                    $result = mysqli_query($conexao, $query);
                ?>  
                <?php
                    if($result):
                        if(mysqli_num_rows($result)>0):
                            if($restaurante = mysqli_fetch_assoc($result)):
                                if(!empty($_POST['acessar'])){
                                    header("location: cardapio.php?id=".$_POST['id_estabelecimento']);
                                }
                            ?>   
                            <div class="col-sm-12 col-md-12">
                                <div class="card-group">
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <form method="POST" action="">
                                                <h4 class="card-tittle"><?php echo $restaurante['nome']; ?></h4>
                                                <p class="card-text" ><?php echo $restaurante['logradouro'].", ".$restaurante['bairro']; ?></p>
                                                <p class="card-text" ><?php echo $restaurante['cidade']." - ".$restaurante['uf']; ?></p>
                                                <input type="hidden" name="id_estabelecimento" value="<?php echo $restaurante['id']; ?>">
                                                <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                                                <input type="submit" name="acessar" style="background-color: rgb(160,4,4);" class="btn btn-danger" value="Acessar!">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            endif;
                        endif;
                    endif;
                    if(isset($_POST['acessar']))
                    {
                        $valor = 0.00;
                        $id_estabelecimento = addslashes($_POST['id_estabelecimento']);
                        $id_usuario = addslashes($_POST['id_usuario']);
                        $pagamento = 0;
                        $garcom = 0;
                        $doacao = 0;
                        $forma_pgto = 0;
                        $produto = 0;

                        //verificar se está vazio
                        if(!empty($id_estabelecimento) && !empty($id_usuario)){
                            $c->conectar("jglogin","localhost","root","");
                            if($c->msgErro == ""){
                                if($c->abrir_comanda($valor,$id_estabelecimento, $id_usuario, $pagamento, $garcom, $doacao, $forma_pgto, $produto))
                                {
                                    if($c->gerar_comanda($id_usuario, $id_estabelecimento)){}
                                }            
                            }
                        }
                    }
                ?>
            </div>
        </div>|
    </body>
</html>