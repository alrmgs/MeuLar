<?php
require_once '../config.php';
if($_SERVER['REQUEST_METHOD']==="POST"){
 if(empty($_POST['nome'])){
     ControlerStaticActions::EchoEmpty("nome");
 }else if(empty($_POST['cpf'])){
    ControlerStaticActions::EchoEmpty("cpf"); 
 }else if(empty($_POST['email'])){
     ControlerStaticActions::EchoEmpty("email");
 }else if(empty($_POST['senha'])){
     ControlerStaticActions::EchoEmpty("senha");
 }else if(empty($_POST['endereco'])){
     ControlerStaticActions::EchoEmpty("endereco");
 }else if(empty($_POST['bairro'])){
     ControlerStaticActions::EchoEmpty("bairro");
 }else if(empty($_POST['cidade'])){
     ControlerStaticActions::EchoEmpty("cidade");
 }else if(empty($_POST['uf'])){
     ControlerStaticActions::EchoEmpty("uf");
 }else if(empty($_POST['cep'])){
   ControlerStaticActions::EchoEmpty("cep");  
 }else if(empty($_POST['contato'])){
   ControlerStaticActions::EchoEmpty("contato");  
 }else if(!ControlerStaticActions::validateEmail($_POST['email'])){
  echo " Coloque um Email Valido...";   
 }else if(!ControlerStaticActions::validateCpf($_POST['cpf'])){
     echo "por favor coloque um cpf Valido...";
 }else if(!ControlerStaticActions::validateTel($_POST['contato'])){
     echo "Coloque um numero de telefone  valido...";
 }else{
     $nome=$_POST['nome'];
     $email=$_POST['email'];
     $senha=$_POST['senha'];
     $endereco=$_POST['endereco'];
     $bairro=$_POST['bairro'];
     $cidade=$_POST['cidade'];
     $uf=$_POST['uf'];
     $cep=$_POST['cep'];
    $contato= ControlerStaticActions::clearNumbers($_POST['contato']);
     $cpf=$_POST['cpf'];
    $cpf= ControlerStaticActions::clearNumbers($cpf);
   $person = new Person($nome, $email, $senha, $endereco, $bairro, $cidade, $uf, $cep, $contato, $cpf);
   $insert = new Insert();
  if( $insert->insertPerson($person)){
      echo "cadastrado com sucesso";
  }else{
     echo "nao foi possivel cadastrar";
  }
 }

}else{
    header('Location: ../view/pages/register/index.html');
}


