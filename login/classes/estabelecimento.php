<?php

Class Estabelecimento
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

    public function cadastrar($nome, $telefone, $endereco, $cnpj, $email, $senha)
    {
        global $pdo;
        //verificar se já existe email cadastrado
        $sql = $pdo->prepare("SELECT id FROM estabelecimento WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false;
        }
        else
        { //cadastrar email não cadastrado
            $sql = $pdo->prepare("INSERT INTO estabelecimento (nome, telefone, endereco, cnpj, email, senha) VALUES (:n, :t, :en, :c, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":en",$endereco);
            $sql->bindValue(":c",$cnpj);     
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true;
        }        
    }
//teste
    public function logar($email, $senha)
    {
        global $pdo;
        //verificar se está cadatrado
        $sql = $pdo->prepare("SELECT id FROM estabelecimento WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();
        if($sql->rowCount()>0){ //entrar no sistema
            $dado = $sql->fetch();
            session_start();
            $_SESSION['id'] = $dado['id'];
            return true;
        }
        else {
            return false;
        }
    }

}

?>