<?php

Class Mesa
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

    public function verificacao($id_estabelecimento)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM mesa WHERE id_estabelecimento = :id");
        $sql->bindValue(":id",$id_estabelecimento);
        $sql->execute();
        $count = $sql->rowCount();
        return $count;
    }

    public function cadastrar($quantidade, $id_estabelecimento)
    {
        global $pdo;
        $sql = $pdo->prepare("INSERT INTO mesa (quantidade, id_estabelecimento) VALUES (:q, :id)"); 
        $sql->bindValue(":q",$quantidade);
        $sql->bindValue(":id",$id_estabelecimento);
        $sql->execute();
        return true;
    }

    public function editar($quantidade, $id_estabelecimento)
    {
        global $pdo;
        $sql = $pdo->prepare("UPDATE mesa SET quantidade = :q WHERE id_estabelecimento = :id");   
        $sql->bindValue(":q",$quantidade);
        $sql->bindValue(":id",$id_estabelecimento);
        $sql->execute();
        return true;
    }

    public function fechar_mesa($id_comanda, $id_estabelecimento, $id_usuario)
    {
        global $pdo;
        $sql = $pdo->prepare("UPDATE comanda SET pagamento = 1 WHERE id = :id AND id_estabelecimento = :id_estabelecimento AND id_usuario = :id_usuario");
        $sql->bindValue(":id",$id_comanda);
        $sql->bindValue(":id_estabelecimento",$id_estabelecimento);
        $sql->bindValue(":id_usuario",$id_usuario);
        $sql->execute();
        return true;
    }

    public function detalhar_comanda($id_comanda)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT pc.id_comanda FROM produto_comanda pc WHERE pc.id_comanda = :id");
        $sql->bindValue(":id",$id_comanda);
        $sql->execute();
        if($sql->rowCount()>0){ //entrar no sistema
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id_comanda'] = $dado['id_comanda'];
            return true;
        }
        else {
            return false;
        }
    }

    public function pedido_entregue($id_comanda)
    {
        global $pdo;
        $sql = $pdo->prepare("UPDATE produto_comanda SET entregue = 1 WHERE id = :id");
        $sql->bindValue(":id",$id_comanda);
        $sql->execute();
        return true;
    }
}
?>

