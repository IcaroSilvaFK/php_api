<?php
  namespace App\Models;



  class User {
    private static $table = 'users';

    public static function getUserById(int $id){
      $sql = new \PDO(DBDRIVE.':dbname='.DBNAME.';host='.DBHOST, DBUSER, DBPASS);
      $sql->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);

      $query = "SELECT * FROM ".self::$table.' WHERE id = :id';
 
      $stmt = $sql->prepare($query);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
      
      if($stmt->rowCount() <= 0){ 
        throw new \Exception("User not found");
      }
      
      return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public static function SelectAll(){

    }
    
  }
