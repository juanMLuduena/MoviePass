<?php

namespace daoJson;

use models\user as User;
use daoJson\IRepository as IRepository;

class UserRepository implements IRepository
{
    private $userList = array();

    public function __constructor()
    { }

    public function Add($user)
    {


        $this->retrieveData();

        if (empty($this->userList)) {
            $newId = 1;
        } else {
            $lastElement = end($this->userList);
            $newId = $lastElement->getId() + 1;
        }
        $user->setId($newId);

        array_push($this->userList, $user);

        $this->saveData();
    }

    public function read($email)
    {
        $this->retrieveData();
        $flag = false;
        $userReturn = new User();
        foreach ($this->userList as $u) {
            if (!$flag) {
                if ($email == $u->getEmail()) {
                    $flag = true;
                    $userReturn = $u;
                }
            }
        }
        return $userReturn;
    }

    public function readId($id)
    {
        $this->retrieveData();
        $flag = false;
        $userReturn = new User();
        foreach ($this->userList as $u) {
            if (!$flag) {
                if ($id == $u->getid()) {
                    $flag = true;
                    $userReturn = $u;
                }
            }
        }
        return $userReturn;
    }


    public function getAll()
    {

        $this->retrieveData();

        return $this->userList;
    }

    public function saveData()
    {

        $arrayToJson = array();

        foreach ($this->userList as $user) {

            $valuesArray["id"] = $user->getId();
            $valuesArray["userName"] = $user->getUserName();
            $valuesArray["pass"] = $user->getPass();
            $valuesArray["email"] = $user->getEmail();
            $valuesArray["dni"] = $user->getDni();

            array_push($arrayToJson, $valuesArray);
        }

        $jsonContent = json_encode($arrayToJson, JSON_PRETTY_PRINT);

        file_put_contents('Data/users.json', $jsonContent);
    }


    public function retrieveData()
    {

        $this->userList = array();

        if (file_exists('Data/users.json')) {

            $jsonContent = file_get_contents('Data/users.json');

            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

            foreach ($arrayToDecode as $valuesArray) {

                $user = new User();

                $user->setId($valuesArray["id"]);
                $user->setUserName($valuesArray["userName"]);
                $user->setPass($valuesArray["pass"]);
                $user->setEmail($valuesArray["email"]);
                $user->setDni($valuesArray["dni"]);

                array_push($this->userList, $user);
            }
        }
    }

    public function edit($user)
    {

        $this->retrieveData();
        $flag = false;
        $i = 0;
        foreach ($this->userList as $values) {

            if ($user->getEmail() == $values->getEmail()) {
                $values->setPassword($user->getPassword());
                break;
            }
        }


        $this->saveData();
    }


    
    public function deleteFisico($email)
    {

        $this->retrieveData();

        foreach ($this->userList as $user) {
            if ($user->getEmail() == $email) {
                $userToDelete = array_search($user, $this->userList);
                unset($this->userList[$userToDelete]);
                break;
            }
        }

        $this->saveData();
    }
}
