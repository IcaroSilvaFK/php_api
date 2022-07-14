<?php 
  namespace App\Services;
  
  use App\Models\User;

  class UserService{
    public function get($id = null){
      if($id){
        http_response_code(200);
        return User::getUserById($id);
      }
      
      return User::SelectAll();
    }

    public function post(){
      $json = file_get_contents('php://input');
      $data = json_decode($json);

      if(!isset($data->email) || !isset($data->password) || !isset($data->name)){
        http_response_code(400);
        return 'Email or password or name as missing a type';
      }
      return User::Create($data->email,$data->password,$data->name);
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
