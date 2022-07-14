<?php
  namespace App\Models;

use Exception;

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
      $sql = new \PDO(DBDRIVE.':dbname='.DBNAME.';host='.DBHOST, DBUSER, DBPASS);
      $sql->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
      
      $query = "SELECT * FROM ".self::$table;

      $stmt = $sql->prepare($query);
      $stmt->execute();

      if($stmt->rowCount() <= 0 ){
        throw new \Exception("Not found users in databse");
      }

      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function DeleteOne(int $id){
      $sql = new \PDO(DBDRIVE.':dbname='.DBNAME.';host='.DBHOST, DBUSER, DBPASS);
      $sql->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);


      $query = "DELETE FROM ".self::$table." WHERE id = :id";
      $stmt = $sql->prepare($query);
      $stmt->bindValue(':id', $id);
      $stmt->execute();

      if($stmt->rowCount() < 0){
        throw new \Exception("Failed in delete");
      }

      return 'User deleted';

    }

  }
