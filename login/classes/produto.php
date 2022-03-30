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

    public function cadastrar($nome, $imagem, $preco, $descricao, $codigo, $id_estabelecimento)
    {
        global $pdo;
        //verificar se já existe email cadastrado
        $sql = $pdo->prepare("SELECT id FROM produtos WHERE codigo = :c");
        $sql->bindValue(":c",$codigo);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false;
        }
        else
        { //cadastrar produto não cadastrado
            $sql = $pdo->prepare("INSERT INTO produtos (nome, imagem, preco, descricao, codigo, id) VALUES (:n, :i, :p, :d, :c, :id)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":i",$imagem);
            $sql->bindValue(":p",$preco);     
            $sql->bindValue(":d",$descricao);
            $sql->bindValue(":c",$codigo);
            $sql->bindValue(":id",$id_estabelecimento);
            $sql->execute();
            return true;
        }        
    }


}

?>