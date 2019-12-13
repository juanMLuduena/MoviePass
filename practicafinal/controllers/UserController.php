<?php

namespace controllers;

use daoJson\UserRepository as UserRepository;
use daoJson\VehicleRepository as VehicleRepository;

// use daoBd\UserRepository as UserRepository;
// use daoBd\VehicleRepository as VehicleRepository;


use models\vehicle as Vehicle;
use models\user as User;

use Exception;
use PDOException;


class UserController
{
    public function signUpForm()
    {
        include_once(VIEWS_PATH . "header.php");
        include_once(VIEWS_PATH . "signup.php");
    }

    public function signUp($username, $pass, $email, $dni)
    {
 
        $add = true;

        $userRepo = new UserRepository();
        try {
            foreach ($userRepo->getAll() as $values) {
                if ($values->getEmail() == $email || $values->getUsername() == $username) {
                    $add = false;
                }
            }
            if ($add) {
                $user = new User(); //crea el nuevo usuario y setea los datos
                $user->setUsername($username);
                $user->setPass($pass);
                $user->setEmail($email);
                $user->setDni($dni);
                $userRepo->Add($user);

                $_SESSION["loggedUser"] = $user; //se setea el usuario en sesion a la variable session  
                include_once(VIEWS_PATH . "header.php");
                require_once(VIEWS_PATH."signup.php");
            } else {
                echo "No se ha podido registrar el usuario. Inténtelo de nuevo." . "<br>"; //manejar mensajes con excepciones
                $this->signUpForm(); //si no se pudo registrar el usuario se redirecciona al formulario para volver a ingresar datos
            }
        } catch (Exception $ex) {
            echo $ex;
        }

    }

    public function logInForm($msj = null)
    {
        include_once(VIEWS_PATH . "header.php");
        require_once(VIEWS_PATH . "login.php");
    }

    //Manejo dudoso de excepcion
    public function logIn($username = null, $pass = null)
    {

        $msj = "Datos incorrectos";
        $login = false;
        $userRepo = new UserRepository();
        try {
            $userList = $userRepo->getAll(); 
            foreach ($userList as $values) {

                if (($values->getUserName() == $username) && ($values->getPass() == $pass)) {


                    $msj = null;
                    $loggedUser = new User();
                    $loggedUser->setId($values->getId());
                    $loggedUser->setUserName($username);
                    $loggedUser->setPass($pass);
                    $loggedUser->setEmail($values->getEmail());
                    $loggedUser->setDni($values->getDni());
                    $_SESSION["loggedUser"] = $loggedUser;
                    $login=true;
                    include_once(VIEWS_PATH . "header.php");
                    require_once(VIEWS_PATH . "homeLogged.php");
                }
            }

            if (!$login) {
                $this->logInForm($msj); 
            }
        } catch (Exception $ex) {
            echo $ex;
        }

    }

    public function logOut()
    {
        unset($_SESSION["loggedUser"]); 
        include_once(VIEWS_PATH . "header.php");
        require_once(VIEWS_PATH . "home.php");
    }

    public function checkSession()
    {
        if (session_status() == PHP_SESSION_NONE)
            session_start();

        if (isset($_SESSION['loggedUser'])) {
            $userRepo = new UserRepository();

            $user = $userRepo->read($_SESSION['loggedUser']->getEmail());

            if ($user->getPass() == $_SESSION['loggedUser']->getPass())
                return $user;
        } else {
            return false;
        }
    }

    public function modifyUser($email, $dni, $username, $pass)
    {
        $newUser = new User();
        $newUser->setId($_SESSION['loggedUser']->getId());
        $newUser->setEmail($email);
        $newUser->setDni($dni);
        $newUser->setUsername($username);
        $newUser->setPass($pass);
        $userList = new UserRepository();
        try {
            $userList->edit($newUser);
            $this->logOut(); //si lo pide especificamente al index o a donde nos pide
        } catch (Exception $ex) {
            echo $ex;
        }   
    }

    public function showUsers()
    {
        $userRepo = new UserRepository();
        $userList = $userRepo->getAll();

        require_once(VIEWS_PATH . "header.php");
        require_once(VIEWS_PATH. "userList.php");

    }

    public function showVehiclesUser()
    {
        $vehicleRepo = new VehicleRepository();
        $vehicleList = array();

        foreach($vehicleRepo->getAll() as $vehicle)
        {
            if($vehicle->getEmail() == $_SESSION['loggedUser']->getEmail())
            {
                array_push($vehicleList, $vehicle);
            }
        }

        include_once(VIEWS_PATH . "header.php");
        require_once(VIEWS_PATH . "vehiclesUser.php");
    }

    public function userProfile($id)
    {
        $userRepo = new UserRepository();
        $user=$userRepo->readId($id);

        require_once(VIEWS_PATH . "header.php");
        require_once(VIEWS_PATH. "profile.php");


    }
}
