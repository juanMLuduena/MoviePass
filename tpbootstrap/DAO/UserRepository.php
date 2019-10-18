<?php namespace DAO;

class UserRepository implements IUserRepository
{
    
    public function __construct(){

    }

    public function create($user){

        session_start();

        $add = true;

        if(isset($_SESSION['users'])){

        $usersArray = $_SESSION['users'];

        foreach($usersArray as $key => $value){

            if($object->getUser() == $value->getUser()){

                $add = false;

            }
        }
        }
        if($add){

            $usersArray[] = $user;
            $_SESSION['users'] = $usersArray;

        }
    }

    public function read($id){


    }

    public function update($user){


    }

    public function delete($id){


    }
}
