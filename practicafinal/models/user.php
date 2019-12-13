<?php 
namespace models;
class User {

    private $username;
    private $email;
    private $dni;
    private $pass;
    private $id;

    public function __construct($username=null, $email=null,$dni = null, $pass=null,$id=null) {
        $this->username=$username;
        $this->email=$email;
        $this->dni=$dni;
        $this->pass=$pass;
        $this->id=$id;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setUsername($username){
        $this->username=$username;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email=$email;
    }
    public function getDni(){
        return $this->dni;
    }

    public function setDni($dni){
        $this->dni=$dni;
    }
    public function getPass(){
        return $this->pass;
    }

    public function setPass($pass){
        $this->pass=$pass;
    }
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id=$id;
    }

}