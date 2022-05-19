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
}
?>
