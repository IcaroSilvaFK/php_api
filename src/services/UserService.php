<?php 
  namespace App\Services;
  
  use App\Models\user;

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

    public function delete(){

    }
  }
