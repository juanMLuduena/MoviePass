<?php namespace Controllers;

use controllers\UserController as UserController;

class HomeController{



    public function Index($message = "")
        {
            $uc = new UserController;
            require_once(VIEWS_PATH."header.php");
            if($uc->checkSession()==false){
                require_once(VIEWS_PATH."home.php");
            }
            else{
                require_once(VIEWS_PATH."homeLogged.php");
            }
        }     
}