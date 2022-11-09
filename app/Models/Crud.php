<?php
namespace App\Models;

use CodeIgniter\Model;

class Crud extends Model
{

protected $table = 'users';

protected $allowedFields = ['name', 'email'];
protected $primaryKey = 'id';


// Retrive all users from the database 

public function get_users(){
    return $this->findAll();
    
}



// Retrieve certain user  
public function find_user($user_id){
    return $this->where(['id'=>$user_id])->first();
}    


// Destroy User  
public function destroy($user_id){
    return $this->where(['id'=>$user_id])->delete();
}    

}