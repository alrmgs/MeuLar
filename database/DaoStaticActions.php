<?php
 final class DaoStaticActions extends PDO{
 public static function personEmailExists($email):bool{
     $sql = 'SELECT email FROM pessoa WHERE email=:EMAIL';
     try{
        $sqls= Conexao::conectBanco()->prepare($sql);
        $param=array(
           ":EMAIL"=>$email 
        );
      $sqls->execute($param);
    if($sqls->rowCount()>0){
        return true;
    }else{
        return false;
    }
     } catch (PDOException $ex) {
      header('Location: ../view/error.php');
     }
 }
 public static function personCpfExists($cpf):bool{
   $sql = 'SELECT cpf FROM pessoa WHERE cpf=:CPF';
   try{
        $sqls= Conexao::conectBanco()->prepare($sql);
        $param=array(
           ":CPF"=>$cpf 
        );
      $sqls->execute($param);
    if($sqls->rowCount()>0){
        return true;
    }else{
        return false;
    }
     } catch (PDOException $ex) {
      header('Location: ../view/error.php');
     }
 }
 public static function ongEmailExists($email):bool{
  $sql = 'SELECT email FROM ongs WHERE email=:EMAIL';
     try{
        $sqls= Conexao::conectBanco()->prepare($sql);
        $param=array(
           ":EMAIL"=>$email 
        );
      $sqls->execute($param);
    if($sqls->rowCount()>0){
        return true;
    }else{
        return false;
    }
     } catch (PDOException $ex) {
      header('Location: ../view/error.php');
     }   
 }
 public static function ongCnpjExists($cnpj):bool{
  $sql = 'SELECT cnpj FROM ongs WHERE cnpj=:CNPJ';
     try{
        $sqls= Conexao::conectBanco()->prepare($sql);
        $param=array(
           ":CNPJ"=>$cnpj 
        );
      $sqls->execute($param);
    if($sqls->rowCount()>0){
        return true;
    }else{
        return false;
    }
     } catch (PDOException $ex) {
      header('Location: ../view/error.php');
     }   
 }
 public static function homerTemporaryEmailExists($email):bool{
      $sql = 'SELECT email FROM lartemporario WHERE email=:EMAIL';
     try{
        $sqls= Conexao::conectBanco()->prepare($sql);
        $param=array(
           ":EMAIL"=>$email 
        );
      $sqls->execute($param);
    if($sqls->rowCount()>0){
        return true;
    }else{
        return false;
    }
     } catch (PDOException $ex) {
      header('Location: ../view/error.php');
     }
 }
 public static function homerTemporaryCpfExists($cpf):bool{
     $sql = 'SELECT cpf FROM lartemporario WHERE cpf=:CPF';
   try{
        $sqls= Conexao::conectBanco()->prepare($sql);
        $param=array(
           ":CPF"=>$cpf 
        );
      $sqls->execute($param);
    if($sqls->rowCount()>0){
        return true;
    }else{
        return false;
    }
     } catch (PDOException $ex) {
      header('Location: ../view/error.php');
     }
 }
}
