<?php
// Ao selecionar um estabelecimento na tela inicial, criar um registro na tabela de comanda, enviando o id do usuario, do estabelecimento, valor = 0 e a data atual.
// Após isso, todos os pedidos feitos na tela de cardápio, enviar também o id da comanda criado anteriormente para a tabela produto_comanda
Class Comanda
{
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

    public function abrir_comanda($valor,$id_estabelecimento, $id_usuario, $mesa, $pagamento){
        global $pdo;   
        $sql = $pdo->prepare("INSERT INTO comanda (valor, data_comanda, id_estabelecimento, id_usuario, numero_mesa, pagamento) VALUES (:v, NOW(), :id_est, :id_user, :n, :p)");
        $sql->bindValue(":v",$valor);
        $sql->bindValue(":id_est",$id_estabelecimento);
        $sql->bindValue(":id_user",$id_usuario);
        $sql->bindValue(":n",$mesa);
        $sql->bindValue(":p",$pagamento);
        $sql->execute();
        return true;
    }

    public function carregar_comanda($quantidade, $valor, $id_comanda, $id_produto)
    {
        global $pdo;
        $sql = $pdo->prepare("INSERT INTO produto_comanda (quantidade, valor, id_comanda, id_produto) VALUES (:q, :p, :id_com, :id_prod)");
        $sql->bindValue(":q",$quantidade);
        $sql->bindValue(":p",$valor);     
        $sql->bindValue(":id_com",$id_comanda);
        $sql->bindValue(":id_prod",$id_produto);
        $sql->execute();
        return true;
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
}

?>