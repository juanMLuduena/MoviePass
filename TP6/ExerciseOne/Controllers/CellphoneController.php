<?php namespace Controllers;

use Models\Cellphone as Cellphone;
use DAO\CellphoneRepository as CellphoneRepository;

class CellphoneController
{
    public function __construct()
    {

    }

    public function add($code, $brand, $model, $price)
    {
        $cellphone = new Cellphone();
        $cellphone->setCode($code);
        $cellphone->setBrand($brand);
        $cellphone->setModel($model);
        $cellphone->setPrice($price);

        $cellphoneRepo = new CellphoneRepository();

        $cellphoneRepo->add($cellphone);
    }
}