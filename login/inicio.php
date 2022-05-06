<?php
    session_start();
    if(!isset($_SESSION['id']))
    {
        header("location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Tela Inicial</title>
</head>
<body id="inicio">  
    <nav id="menu">
        <ul>
            <li><a href="">Início</a></li>
            Seja Bem-Vindo ao João Garçom!
            <li><a href="sair.php" id="sair">Sair</a></li>
            <li><a href="" id="config">Configurações</a></li>
            
        </ul>
    </nav>

        <div id="acesso">
            <h1 id="ini">Faça o acesso em um estabelecimento!</h1>
                <div id="buttons">
                    <button>Permitir acesso a minha localização!</button>
                    <H2>Ou</H2>
                    <button ><a href="cardapio.php">Ler QR Code</a></button>
                </div>
                
        </div>
            <div id="cupons">
                    <div id="cpm">
                        <H3>CUPOM 15%</H3>
                        <button>Quero</button>
                    </div>
                    <div id="cpm">
                        <H3>CUPOM 10%</H3>
                        <button>Quero</button>
                    </div>
                    <div id="cpm">
                        <H3>CUPOM 5%</H3>
                        <button>Quero</button>
                    </div>
                    <div id="cpm">
                        <H3>CUPOM 3%</H3>
                        <button>Quero</button>
                    </div>
                </div>

</body>
</html>