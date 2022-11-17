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

    public function cadastrar($nomeEc,$telefoneEc, $cepEc, $logradouroEc, $bairroEc, $localidadeEc, $ufEc, $cnpjEc, $emailEc, $senhaEc)
    {
        global $pdo;
        //verificar se já existe email cadastrado
        $sql = $pdo->prepare("SELECT id FROM estabelecimento WHERE email = :e");
        $sql->bindValue(":e",$emailEc);
        $sql->execute();
        if($sql->rowCount() > 0)
        {
            return false;
        }
        else
        { //cadastrar email não cadastrado
            $sql = $pdo->prepare("INSERT INTO estabelecimento (nome, telefone, cep, logradouro, bairro, cidade, uf, cnpj, email, senha) VALUES (:n, :t, :cep, :en, :b, :l, :uf, :c, :e, :s)");
            $sql->bindValue(":n",$nomeEc);
            $sql->bindValue(":t",$telefoneEc);
            $sql->bindValue(":cep",$cepEc);
            $sql->bindValue(":en",$logradouroEc);
            $sql->bindValue(":b",$bairroEc);
            $sql->bindValue(":l",$localidadeEc);
            $sql->bindValue(":uf",$ufEc);
            $sql->bindValue(":c",$cnpjEc);     
            $sql->bindValue(":e",$emailEc);
            $sql->bindValue(":s",md5($senhaEc));
            $sql->execute();
            return true;
        }        
    }

    public function logar($emailEc, $senhaEc)
    {
        global $pdo;
        //verificar se está cadatrado
        
        $sql = $pdo->prepare("SELECT id FROM estabelecimento WHERE email = :e AND senha = :s");
        $sql->bindValue(":e",$emailEc);
        $sql->bindValue(":s",md5($senhaEc));
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