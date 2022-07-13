<?php
  namespace App\Models;

  use PDO;

  class user {
    private static $table = 'users';

    public static function getUserById(int $id){
     
      $sql = new PDO(DBDRIVE.':host='.DBHOST.';dbname='.DBNAME, DBUSER, DBPASS);
      
      $query = "SELECT * FROM".self::$table."WHERE id = :id";

      $stmt = $sql->prepare($query);
      $stmt->bindValue(':id', $id);
      $stmt->execute();

      if($stmt->rowCount() <= 0){
        throw new \Exception("User not found");
      }

      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function SelectAll(){

    }
    
  }
