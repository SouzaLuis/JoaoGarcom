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
              <a class="dropdown-item" href="sair.php">Sair</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Inicio do carousel -->

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" style="height: 350px; width: 700px;" src="imagens/banner.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" style="height: 350px; width: 700px;" src="imagens/banner2.png" alt="Second slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <br><br>
    <div class="container">
      <div class="text-center">
        <a href="javascript:camera()" style="width: 300px" onclick="toggle('maisinfo');" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Qr Code</a>
        <div id="maisinfo" style="display:none">
        <br><br>
        <center>
          <video id="preview" style="width: 300px"></video>
        </center></div>
        <br><br>

          <?php
            $conexao = mysqli_connect('localhost', 'root', '','jglogin');
            $query = 'SELECT id, nome FROM estabelecimento ORDER BY id ASC';
            $result = mysqli_query($conexao, $query);

            if($result):
              if(mysqli_num_rows($result)>0):
                
                echo "<div class='form-group'>";
                if(!empty($_POST['estabelecimentos'])){
                  header("location: cardapio.php?id=".$_POST['estabelecimentos']);
                }
          ?>
            <form action="" method="POST">
              <select class="form-select" style="text-align: center;" name="estabelecimentos">
                <?php  while($estabelecimento = mysqli_fetch_assoc($result)):?>
                  <option value="<?php echo $estabelecimento['id']; ?>">
                <?php echo $estabelecimento['nome']; ?> </option>
                <?php endwhile;?>
              </select>
            <br>
            <input type="submit" style="width: 300px" name="botao" class="btn btn-danger btn-lg active" value="Entrar no estabelecimento!">
            <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
            </form>
              <?php echo "</div>";
              endif;
            endif;
            ?>
        <?php
        //verificar se clicou no botão
        if(isset($_POST['estabelecimentos']))
        {
          $valor = 0.00;
          $id_estabelecimento = addslashes($_POST['estabelecimentos']);
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
    </div>
    <br><br>
    <script>
      function camera(){
        let scanner = new Instascan.Scanner(
          {
            video: document.getElementById('preview')
          }
        );
        scanner.addListener('scan', function(content) {
          window.open("confirmaCodigo.php?id="+content,"blank");
        });
        Instascan.Camera.getCameras().then(cameras => 
          {
            if(cameras.length > 0){
              scanner.start(cameras[0]);
            } else {
              console.error("Não existe câmera no dispositivo!");
            }
          });
      }
      function toggle(obj) {
        var el = document.getElementById(obj);
        if ( el.style.display != 'none' ) {
          el.style.display = 'none';
          }
          else {
          el.style.display = '';
          }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>

</html>