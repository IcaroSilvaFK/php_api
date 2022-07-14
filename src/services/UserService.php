<?php 
  namespace App\Services;
  
  use App\Models\User;

  class UserService{
    public function get($id = null){
      if($id){
        return User::getUserById($id);
      }
      return User::SelectAll();
    }

    public function post(){

    }

    public function update(){

    }

    public function delete(int $id){

      if(!$id){
        throw new \Exception('Id as missing a type');
      }
      return User::DeleteOne($id);
    }
  }
