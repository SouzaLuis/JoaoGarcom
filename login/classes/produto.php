<?php

Class Produto
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

    public function cadastrar($nome, $imagem, $preco, $descricao, $id_estabelecimento)
    {
        global $pdo;
        $sql = $pdo->prepare("INSERT INTO produtos (nome, imagem, preco, descricao, id_estabelecimento) VALUES (:n, :i, :p, :d, :id)");
        $sql->bindValue(":n",$nome);
        $sql->bindValue(":i",$imagem);
        $sql->bindValue(":p",$preco);     
        $sql->bindValue(":d",$descricao);
        $sql->bindValue(":id",$id_estabelecimento);
        $sql->execute();
        return true;
    }
    public function editar($nome, $imagem, $preco, $descricao, $id, $id_estabelecimento)
    {
        global $pdo;
        $sql = $pdo->prepare("UPDATE produtos SET nome = :n, imagem = :i, preco = :p, descricao = :d WHERE id = :id and id_estabelecimento = :id_estabelecimento");
        $sql->bindValue(":n",$nome);
        $sql->bindValue(":i",$imagem);
        $sql->bindValue(":p",$preco);     
        $sql->bindValue(":d",$descricao);
        $sql->bindValue(":id",$id);
        $sql->bindValue(":id_estabelecimento",$id_estabelecimento);
        $sql->execute();
        return true;
    }
    public function deletar($id, $id_estabelecimento)
    {
        global $pdo;
        $sql = $pdo->prepare("DELETE from produtos WHERE id = :id and id_estabelecimento = :id_estabelecimento");
        $sql->bindValue(":id",$id);
        $sql->bindValue(":id_estabelecimento",$id_estabelecimento);
        $sql->execute();
        return true;
    }
}

?>