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

    public function cadastrar($nomeUc,$telefoneUc, $cepUc, $logradouroUc, $bairroUc, $localidadeUc, $ufUc, $cpfUc, $emailUc, $senhaUc)
    {
        global $pdo;
        //verificar se já existe email cadastrado
        $sql = $pdo->prepare("SELECT id FROM estabelecimento WHERE email = :e");
        $sql->bindValue(":e",$emailUc);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false;
        }
        else
        { //cadastrar email não cadastrado
            $sql = $pdo->prepare("INSERT INTO usuario (nome, telefone, cep, logradouro, bairro, cidade, uf, cpf, email, senha) VALUES (:n, :t, :cep, :en, :b, :l, :uf, :c, :e, :s)");
            $sql->bindValue(":n",$nomeUc);
            $sql->bindValue(":t",$telefoneUc);
            $sql->bindValue(":cep",$cepUc);
            $sql->bindValue(":en",$logradouroUc);
            $sql->bindValue(":b",$bairroUc);
            $sql->bindValue(":l",$localidadeUc);
            $sql->bindValue(":uf",$ufUc);
            $sql->bindValue(":c",$cpfUc);     
            $sql->bindValue(":e",$emailUc);
            $sql->bindValue(":s",md5($senhaUc));
            $sql->execute();
            return true;
        }        
    }

    public function logar($emailUc, $senhaUc)
    {
        global $pdo;
        //verificar se está cadatrado
        $sql = $pdo->prepare("SELECT id FROM usuario WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$emailUc);
        $sql->bindValue(":s",md5($senhaUc));
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