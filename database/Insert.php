<?php
require_once'../config.php';
class Insert extends PDO{
   private $connection;
   public function __construct() {
     $this->connection=Conexao::conectBanco();
       } 
   public function insertPerson(Person $person):bool{
    $sql='INSERT INTO pessoa (nome,cpf,email,senha,endereco,bairro,cidade,uf,cep,contato)' 
        .'VALUES(:NOME,:CPF,:EMAIL,:SENHA,:ENDERECO,:BAIRRO,:CIDADE,:UF,:CEP,:CONTATO)'; 
    try {
        $sqls=$this->connection->prepare($sql);
        $sqls->bindValue(':NOME',$person->getNome(),PDO::PARAM_STR);
        $sqls->bindValue(':CPF',$person->getCpf(),PDO::PARAM_STR);
        $sqls->bindValue(':EMAIL',$person->getEmail(),PDO::PARAM_STR);
        $sqls->bindValue(':SENHA',$person->getSenha(),PDO::PARAM_STR);
        $sqls->bindValue(':ENDERECO',$person->getEndereco(),PDO::PARAM_STR);
        $sqls->bindValue(':BAIRRO',$person->getBairro(),PDO::PARAM_STR);
        $sqls->bindValue(':CIDADE',$person->getCidade(),PDO::PARAM_STR);
        $sqls->bindValue(':UF',$person->getUf(),PDO::PARAM_STR);
        $sqls->bindValue(':CEP',$person->getCep(),PDO::PARAM_STR);
        $sqls->bindValue(':CONTATO',$person->getContato(),PDO::PARAM_STR);
       if($sqls->execute()>0){
           return true;
       }
 }catch (PDOException $exc) {
    return false;
    echo "erro no cadastro".$exc;
}
   }
 public function insertOngs(Ongs $ongs):bool{
   $sql='INSERT INTO ongs (nome,cnpj,email,senha,endereco,bairro,cidade,uf,cep,contato,imagem_ongs)' 
        .'VALUES(:NOME,:CNPJ,:EMAIL,:SENHA,:ENDERECO,:BAIRRO,:CIDADE,:UF,:CEP,:CONTATO,:IMAGEM)';
    try {
        $sqls=$this->connection->prepare($sql);
        $sqls->bindValue(':NOME',$ongs->getNome(),PDO::PARAM_STR);
        $sqls->bindValue(':CNPJ',$ongs->getCnpj(),PDO::PARAM_STR);
        $sqls->bindValue(':EMAIL',$ongs->getEmail(),PDO::PARAM_STR);
        $sqls->bindValue(':SENHA',$ongs->getSenha(),PDO::PARAM_STR);
        $sqls->bindValue(':ENDERECO',$ongs->getEndereco(),PDO::PARAM_STR);
        $sqls->bindValue(':BAIRRO',$ongs->getBairro(),PDO::PARAM_STR);
        $sqls->bindValue(':CIDADE',$ongs->getCidade(),PDO::PARAM_STR);
        $sqls->bindValue(':UF',$ongs->getUf(),PDO::PARAM_STR);
        $sqls->bindValue(':CEP',$ongs->getCep(),PDO::PARAM_STR);
        $sqls->bindValue(':CONTATO',$ongs->getContato(),PDO::PARAM_STR);
        $sqls->bindValue(':IMAGEM',$ongs->getImagem_Ongs(),PDO::PARAM_STR);
       if($sqls->execute()>0){
           return true;
       }
 }catch (PDOException $e) {
    return false;
    
}
   }
  public function insertTemporaryHomer(TemporaryHomer $homer):bool{
       $sql='INSERT INTO lartemporario (nome,cpf,email,senha,endereco,bairro,cidade,uf,cep,contato,imagem_comproResidencia)' 
        .'VALUES(:NOME,:CPF,:EMAIL,:SENHA,:ENDERECO,:BAIRRO,:CIDADE,:UF,:CEP,:CONTATO,:IMAGEM)'; 
    try {
        $sqls=$this->connection->prepare($sql);
        $sqls->bindValue(':NOME',$homer->getNome(),PDO::PARAM_STR);
        $sqls->bindValue(':CPF',$homer->getCpf(),PDO::PARAM_STR);
        $sqls->bindValue(':EMAIL',$homer->getEmail(),PDO::PARAM_STR);
        $sqls->bindValue(':SENHA',$homer->getSenha(),PDO::PARAM_STR);
        $sqls->bindValue(':ENDERECO',$homer->getEndereco(),PDO::PARAM_STR);
        $sqls->bindValue(':BAIRRO',$homer->getBairro(),PDO::PARAM_STR);
        $sqls->bindValue(':CIDADE',$homer->getCidade(),PDO::PARAM_STR);
        $sqls->bindValue(':UF',$homer->getUf(),PDO::PARAM_STR);
        $sqls->bindValue(':CEP',$homer->getCep(),PDO::PARAM_STR);
        $sqls->bindValue(':CONTATO',$homer->getContato(),PDO::PARAM_STR);
        $sqls->bindValue(':IMAGEM',$homer->getImgComprovante(),PDO::PARAM_STR);
       if($sqls->execute()>0){
           return true;
       }
 }catch (PDOException $exc) {
    return false;
}
  }
  public function insertAnimals(Animals $animals,int $id):bool{
    $sql='INSERT INTO animais(id_Ongs,nome,porte,sexo,descricao,saude,imagem_animal)' 
        .'VALUES(:ID,:NOME,:PORTE,:SEXO,:DESCRICAO,:SAUDE,:IMAGEM)'; 
    try {
        $sqls=$this->connection->prepare($sql);
        $sqls->bindValue(':ID',$id,PDO::PARAM_INT);
        $sqls->bindValue(':NOME',$animals->getNome(),PDO::PARAM_STR);
        $sqls->bindValue(':PORTE',$animals->getPorte(),PDO::PARAM_STR);
        $sqls->bindValue(':SEXO',$animals->getSexo(),PDO::PARAM_STR);
        $sqls->bindValue(':DESCRICAO',$animals->getDescricao(),PDO::PARAM_STR);
        $sqls->bindValue(':SAUDE',$animals->getSaude(),PDO::PARAM_STR);
        $sqls->bindValue(':IMAGEM',$animals->getImg_animais(),PDO::PARAM_STR);
       if($sqls->execute()>0){
           return true;
       }
 }catch (PDOException $exc) {
    return false;
    echo "erro no cadastro".$exc;
}   
  }
   
}
