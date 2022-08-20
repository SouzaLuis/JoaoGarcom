<?php

Class Comanda{
    
    private $pdo;
    public $msgErro = "";
   
    public function conectar($nome, $host, $usuario, $senha)
    {
        global $pdo;
        global $msgErro;

        try{
        $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        } catch(PDOException $e){
            $msgErro = $e->getMessage();
        }
    }

    public function abrir_comanda($valor,$id_estabelecimento, $id_usuario, $pagamento){
        global $pdo;   
        $sql = $pdo->prepare("INSERT INTO comanda (valor, data_comanda, id_estabelecimento, id_usuario, pagamento) VALUES (:v, NOW(), :id_est, :id_user, :p)");
        $sql->bindValue(":v",$valor);
        $sql->bindValue(":id_est",$id_estabelecimento);
        $sql->bindValue(":id_user",$id_usuario);
        $sql->bindValue(":p",$pagamento);
        $sql->execute();
        return true;
    }

    public function verifica_comanda($quantidade, $valor, $id_comanda, $id_produto)
    {
        global $pdo;
        $qtd = 0;
        $valor_total = 0;
        $valor_comanda = 0;
        $valor_total_comanda = 0;

        $comanda = $pdo->prepare("SELECT valor FROM comanda WHERE id = :id");
        $comanda->bindValue(":id",$id_comanda);
        $comanda->execute();
        $comanda_list = $comanda->fetch(PDO::FETCH_ASSOC);
        $valor_comanda = $comanda_list['valor'];

        $sql = $pdo->prepare("SELECT quantidade, valor, id_produto FROM produto_comanda WHERE id_comanda = :id_com AND id_produto = :id_prod"); 
        $sql->bindValue(":id_com",$id_comanda);
        $sql->bindValue(":id_prod",$id_produto);
        $sql->execute();
        if($sql->rowCount()>0){
            $produtos = $sql->fetch(PDO::FETCH_ASSOC);

            $qtd = $qtd + $produtos['quantidade'];
            $valor_total = $valor * $qtd;
            
            $valor_total_comanda = $valor_comanda + $valor_total;


            $atualiza_comanda = $pdo->prepare("UPDATE comanda SET valor = :v WHERE id = :id_com");
            $atualiza_comanda->bindValue(":v",$valor_total_comanda);
            $atualiza_comanda->bindValue(":id_com",$id_comanda);
            $atualiza_comanda->execute();

            $atualiza = $pdo->prepare("UPDATE produto_comanda SET quantidade = :q , valor = :p WHERE id_comanda = :id_com AND id_produto = :id_prod");
            $atualiza->bindValue(":q",$qtd);
            $atualiza->bindValue(":p",$valor_total);
            $atualiza->bindValue(":id_com",$id_comanda);
            $atualiza->bindValue(":id_prod",$id_produto);
            $atualiza->execute();
            return true;
        } else{

            $produtos = $sql->fetch(PDO::FETCH_ASSOC);

            $valor_total = $valor * $quantidade;

            $valor_total_comanda = $valor_comanda + $valor_total;
            
            $atualiza_comanda = $pdo->prepare("UPDATE comanda SET valor = :v WHERE id = :id_com");
            $atualiza_comanda->bindValue(":v",$valor_total_comanda);
            $atualiza_comanda->bindValue(":id_com",$id_comanda);
            $atualiza_comanda->execute();

            $insere = $pdo->prepare("INSERT INTO produto_comanda (quantidade, valor, id_comanda, id_produto) VALUES (:q, :p, :id_com, :id_prod)");
            $insere->bindValue(":q",$quantidade);
            $insere->bindValue(":p",$valor_total);     
            $insere->bindValue(":id_com",$id_comanda);
            $insere->bindValue(":id_prod",$id_produto);
            $insere->execute();
            return true;
        }
    }

    public function gerar_comanda($id_usuario, $id_estabelecimento)
    {
        global $pdo;
        //verificar a comanda criada
        $sql = $pdo->prepare("SELECT id FROM comanda WHERE id_usuario = :id_user AND id_estabelecimento = :id_est AND pagamento = 0");
        $sql->bindValue(":id_user",$id_usuario);
        $sql->bindValue(":id_est",$id_estabelecimento);
        $sql->execute();
        if($sql->rowCount()>0){ //entrar no sistema
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_comanda'] = $dado['id'];
            return true;
        }
        else {
            return false;
        }
    }

    public function atualiza_mesa($mesa, $id_comanda_mesa){
        global $pdo;
        $sql = $pdo->prepare("UPDATE comanda SET numero_mesa = :n WHERE id = :id"); 
        $sql->bindValue(":n",$mesa);
        $sql->bindValue(":id",$id_comanda_mesa);
        $sql->execute();
        return true;
    }
    
    public function diminui_produto_comanda($id){
        $quantidade = 0;
        $valor = 0;
        $unidade = 0;
        global $pdo;
        $sql = $pdo->prepare("SELECT pc.quantidade, pc.valor, p.preco FROM produto_comanda pc INNER JOIN produtos p ON p.id = pc.id_produto WHERE pc.id = :id");
        $sql->bindValue(":id",$id);
        $sql->execute();
        if($sql->rowCount()>0){
            $comanda = $sql->fetch(PDO::FETCH_ASSOC);
            $quantidade = $comanda['quantidade'] - 1;
            $unidade = $comanda['preco'];
            $valor = $comanda['valor'] - $unidade;

            $atualiza = $pdo->prepare("UPDATE produto_comanda SET quantidade = :q AND valor = :v WHERE id = :id");
            $atualiza->bindValue(":q",$quantidade);
            $atualiza->bindValue(":v",$valor);
            $atualiza->bindValue(":id",$id);
            $atualiza->execute();
            echo "Passou 1";
            return true;
        } else{
            echo "Passou 2";
            return false;
        }
    }
}

?>