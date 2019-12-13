<?php 
namespace models;
class Vehicle{

    private $brand;
    private $model;
    private $plate;
    private $year;
    private $email;
    private $id;

    public function __construct($brand = null, $model = null, $plate=null,$year=null,$email=null,$id=null) {
        $this->brand=$brand;
        $this->model=$model;
        $this->plate=$plate;
        $this->year=$year;
        $this->email=$email;
        $this->id=$id;
    }


    public function getBrand(){
        return $this->brand;
    }

    public function setBrand($brand){

        $this->brand=$brand;
    }
    public function getModel(){
        return $this->model;
    }

    public function setModel($model){
        $this->model=$model;
    }
    public function getPlate(){
        return $this->plate;
    }

    public function setPlate($plate){
        $this->plate=$plate;
    }
    public function getYear(){
        return $this->year;
    }

    public function setYear($year){
        $this->year=$year;
    }
    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email=$email;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id=$id;
    }

}