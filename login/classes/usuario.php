<?php

Class Usuario
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

    public function cadastrar($nome, $telefone, $cep, $logadouro, $bairro, $localidade, $uf, $cpf, $email, $senha)
    {
        global $pdo;
        //verificar se já existe email cadastrado
        $sql = $pdo->prepare("SELECT id FROM usuario WHERE email = :e");
        $sql->bindValue(":e",$email);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false;
        }
        else
        { //cadastrar email não cadastrado
            $sql = $pdo->prepare("INSERT INTO usuario (nome, telefone, cep, logadouro, bairro, localidade, uf, cpf, email, senha) VALUES (:n, :t, :en, :cp, :log, :b, :loc, :uf,:c, :e, :s)");
            $sql->bindValue(":n",$nome);
            $sql->bindValue(":t",$telefone);
            $sql->bindValue(":cp",$cep);
            $sql->bindValue(":log",$logadouro);
            $sql->bindValue(":b",$bairro);
            $sql->bindValue(":loc",$localidade);
            $sql->bindValue(":uf",$uf);       
            $sql->bindValue(":c",$cpf);     
            $sql->bindValue(":e",$email);
            $sql->bindValue(":s",md5($senha));
            $sql->execute();
            return true;
        }        
    }

    public function logar($email, $senha)
    {
        global $pdo;
        //verificar se está cadatrado
        $sql = $pdo->prepare("SELECT id FROM usuario WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$email);
        $sql->bindValue(":s",md5($senha));
        $sql->execute();
        if($sql->rowCount()>0){ //entrar no sistema
            $dado = $sql->fetch();
          
            $_SESSION['id'] = $dado['id'];
            return true;
        }
        else {
            return false;
        }
    }

}

?>