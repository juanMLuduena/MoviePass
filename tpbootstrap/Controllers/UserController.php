<?php namespace Controllers;

use DAO\UserRepository as UserRepository;
use Models\User as User;

class UserController{

    public function signUp(
        $username=null, 
        $password=null, 
        $firstname=null, 
        $lastname=null, 
        $email=null
        )
    {
        if($email==null){
            include_once("");//vista del formulario signup
        }
        else{
            $add=true;
            $userList= new UserRepository();
            $userList->getAll();
            foreach($userList as $values){
                if($values->getEmail()==$email){
                    $add=false;
                }
            }
            if($add){
                $user= new User();
                $user->setUserName($username);
                $user->setPassword($password);
                $user->setFirstname($firstname);
                $user->setLastname($lastname);
                $user->setEmail($email);
                $userList->add($user);
            }
        }
    }

    public function logIn(
        $email=null, 
        $password=null
        )
    {
        if($email==null){
            include_once("");//vista del formulario login
        }
        else{
            $login=false;
            $userList = new UserRepository();
            $userList->getAll();
            foreach ($userList as $values) {
                if($values->getEmail()==$email && $values->getPassword()==$password){
                    $login=true;
                }
            }
            if($login){
                include_once("");//vista del home
            }
        }

    }
}