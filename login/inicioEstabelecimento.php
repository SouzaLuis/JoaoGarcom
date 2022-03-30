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
    <title>Tela Inicial Estabelecimento</title>
</head>
<body>
    <nav  id="menu">
        <ul>
        <li><a href="">Inicio</a></li>
        <li><a href="cadastroProdutos.php">Alterar Cardápio</a></li>
        <li><a href="">Acompanhar Relatório Financeiro</a></li>
        <li><a href="">Listar Pedidos</a></li>    
        <li><a href="sair.php" id="sair">Sair</a></li>
        <li><a href="" id="config">Configurações</a></li>
        </ul>
    </nav>
    <div id="logo">
        <img src="imagens/banner.jpg" alt="Banner Restaurante">
    </div>
    <!-- <div id="funcoes-restaurante">
        <ul>
            <li><a href="cardapioEstabelecimento.php">Alterar Cardápio</a></li>
            <li><a href="">Acompanhar Relatório Financeiro</a></li>
            <li><a href="">Listar Pedidos</a></li>
        </ul>
    </div> -->
    <div id="resumo-mesas">
            <div id="legendas">
            <div id="disponivel">
                <h2>Disponível</h2>
            </div>    
            <div id="ocupado">
                <h2>Ocupado</h2>
            </div>
            <div id="pedido-ativo">
                <h2>Aguardando Atendimento</h2>
            </div>
        </div>
        <div id="mesas">
            <div id="item-est-oc">
                <h2>Mesa 01</h2>
                <img src="imagens/mesa.png" alt="Mesa">
            </div>
            <div id="item-est-oc">
                <h2>Mesa 02</h2>
                <img src="imagens/mesa.png" alt="Mesa">
            </div>
            <div id="item-est-ped">
                <h2>Mesa 03</h2>
                <img src="imagens/mesa.png" alt="Mesa">
            </div>
            <div id="item-est-oc">
                <h2>Mesa 12</h2>
                <img src="imagens/mesa.png" alt="Mesa">
            </div>
            <div id="item-est">
                <h2>Mesa 04</h2>
                <img src="imagens/mesa.png" alt="Mesa">
            </div>
            <div id="item-est">
                <h2>Mesa 05</h2>
                <img src="imagens/mesa.png" alt="Mesa">
            </div>
            <div id="item-est">
                <h2>Mesa 06</h2>
                <img src="imagens/mesa.png" alt="Mesa">
            </div>
        </div>
        <div id="mesas">
            <div id="item-est">
                <h2>Mesa 07</h2>
                <img src="imagens/mesa.png" alt="Mesa">
            </div>
            <div id="item-est">
                <h2>Mesa 08</h2>
                <img src="imagens/mesa.png" alt="Mesa">
            </div>
            <div id="item-est">
                <h2>Mesa 09</h2>
                <img src="imagens/mesa.png" alt="Mesa">
            </div>
            <div id="item-est">
                <h2>Mesa 10</h2>
                <img src="imagens/mesa.png" alt="Mesa">
            </div>
            <div id="item-est">
                <h2>Mesa 11</h2>
                <img src="imagens/mesa.png" alt="Mesa">
            </div>
            <div id="item-est">
                <h2>Mesa 13</h2>
                <img src="imagens/mesa.png" alt="Mesa">
            </div>
            <div id="item-est">
                <h2>Mesa 14</h2>
                <img src="imagens/mesa.png" alt="Mesa">
            </div>
        </div>
        <div id="mesas">
            <div id="item-est">
                <h2>Mesa 15</h2>
                <img src="imagens/mesa.png" alt="Mesa">
            </div>
            <div id="item-est">
                <h2>Mesa 16</h2>
                <img src="imagens/mesa.png" alt="Mesa">
            </div>
            <div id="item-est">
                <h2>Mesa 17</h2>
                <img src="imagens/mesa.png" alt="Mesa">
            </div>
            <div id="item-est">
                <h2>Mesa 18</h2>
                <img src="imagens/mesa.png" alt="Mesa">
            </div>
            <div id="item-est">
                <h2>Mesa 19</h2>
                <img src="imagens/mesa.png" alt="Mesa">
            </div>
            <div id="item-est">
                <h2>Mesa 20</h2>
                <img src="imagens/mesa.png" alt="Mesa">
            </div>
            <div id="item-est">
                <h2>Mesa 21</h2>
                <img src="imagens/mesa.png" alt="Mesa">
            </div>
        </div>
    </div>

</body>
</html>