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

class VehicleController
{

    public function addVehicleForm()
    {

        require_once(VIEWS_PATH . "addVehicle.php");
    }

    public function modifyForm($id)
    {
        $vehicleRepo= new VehicleRepository;
        $vehicle = $vehicleRepo->read($id);
        require_once(VIEWS_PATH . "modifyVehicle.php");
    }

    public function showVehicles()
    {
        $vehicleRepo = new VehicleRepository();
        $vehicleList = $vehicleRepo->getAll();

        require_once(VIEWS_PATH . "vehicleList.php");
    }

    public function addVehicle($brand, $model, $plate, $year)
    {

        $add = true;
        $vehicleRepo = new VehicleRepository;

        $vehicle = new Vehicle;

        $vehicle->setBrand($brand);
        $vehicle->setModel($model);
        $vehicle->setPlate($plate);
        $vehicle->setYear($year);
        $vehicle->setEmail($_SESSION['loggedUser']->getEmail());
        try {
            $vehicleRepo->add($vehicle);
        } catch (Exception $ex) {
            echo $ex;
        }

        $vehicleList = $vehicleRepo->getAll();

        require_once(VIEWS_PATH.'vehicleList.php');
    }

    public function modifyVehicle($brand, $model, $plate, $year,$email,$id)
    {
        $newVehicle = new Vehicle();
        $newVehicle->setModel($model);
        $newVehicle->setYear($year);
        $newVehicle->setBrand($brand);
        $newVehicle->setPlate($plate);
        $newVehicle->setEmail($email);
        $newVehicle->setId($id);
        $vehicleRepo = new VehicleRepository();
        try 
        {
            $vehicleRepo->edit($newVehicle);
            $this->showVehicles();
            //$this->logOut();
        } 
        catch (Exception $ex) 
        {
            echo $ex;
        }
    }

    public function deleteVehicle($id){

        $vehicleRepo = new VehicleRepository();
        $vehicleRepo->delete($id);
        $this->showVehicles();
    }
}
