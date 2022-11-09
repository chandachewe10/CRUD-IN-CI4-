<?php

namespace App\Controllers;

use App\Models\Crud as ModelsCrud;

class Crud extends BaseController
{

   
public function index($header="header",$footer="footer",$title="ADD USER")
    {

        // Check for users if any in the db   


$model = model(ModelsCrud::class);

$all_registered_users = ([ 
    'data_users' => $model->get_users()
]); 

$data = ['title'=>$title];

return view("$header",$all_registered_users)
.view('create',$data)
.view("$footer");





    }


    public function store($header="header",$footer="footer",$title="ADD USER")
    {
        $data = ['title'=>$title];
        if($this->request->getMethod()==="post" && $this->validate([
            "name" => "required|max_length[22]|min_length[2]",
            "email" =>"required|valid_email"
        ])){
            $user_data = [
                "name" => $this->request->getPost("name"),
                "email" => $this->request->getPost("email"),
               ];

        
               $userModel = model(ModelsCrud::class);
               $userModel->save($user_data);
               $session = session();
               $session->setFlashdata('user_stored', 'User created successfully');

               $all_registered_users = ([ 
                'data_users' => $userModel->get_users()
            ]); 



               return view("$header",$all_registered_users)
               .view('create',$data)
               .view("$footer");
        
        


        }
        return view("$header")
               .view('create',$data)
               .view("$footer");
     
     
    }



    public function update($header="header",$footer="footer",$title="ADD USER")
    {
       $data = ['title'=>$title];
       return view("$header")
       .view('create',$data)
       .view("$footer");
    }




    public function delete($header="header",$footer="footer",$title="ADD USER")
    {
       $data = ['title'=>$title];
       return view("$header")
       .view('create',$data)
       .view("$footer");
    }

}