<?php
class Logins {
public static function loginPerson($email,$senha):bool{
     $sql="SELECT email,senha FROM pessoa WHERE email=:EMAIL AND senha=:SENHA";
      try{
        $sqls= Conexao::conectBanco()->prepare($sql);
        $param=array(
           ":EMAIL"=>$email,
            ":SENHA"=>$senha
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
  public static function loginOngs($email,$senha):bool{
     $sql="SELECT email,senha FROM ongs WHERE email=:EMAIL AND senha=:SENHA";
      try{
        $sqls= Conexao::conectBanco()->prepare($sql);
        $param=array(
           ":EMAIL"=>$email,
            ":SENHA"=>$senha
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
 public static function loginHomer($email,$senha):bool{
     $sql="SELECT email,senha FROM lartemporario WHERE email=:EMAIL AND senha=:SENHA";
      try{
        $sqls= Conexao::conectBanco()->prepare($sql);
        $param=array(
           ":EMAIL"=>$email,
            ":SENHA"=>$senha
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
