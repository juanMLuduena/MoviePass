<?php namespace Models;

class Cellphone
{
    private $id;
    private $code;
    private $brand;
    private $model;
    private $price;

    public function __construct($id=null,$code=null,$brand=null,$model=null,$price=null)
    {
        $this->id=$id;
        $this->code=$code;
        $this->brand=$brand;
        $this->model=$model;
        $this->price=$price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id=$id;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code=$code;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand)
    {
        $this->brand=$brand;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model=$model;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price=$price;
    }

}