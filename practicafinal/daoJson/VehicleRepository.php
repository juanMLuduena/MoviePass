<?php

namespace daoJson;

use models\vehicle as Vehicle;
use daoJson\IRepository as IRepository;

class VehicleRepository implements IRepository
{
    private $vehicleList = array();

    public function __constructor()
    { }

    public function Add($vehicle)
    {


        $this->retrieveData();

        if (empty($this->vehicleList)) {
            $newId = 1;
        } else {
            $lastElement = end($this->vehicleList);
            $newId = $lastElement->getId() + 1;
        }
        $vehicle->setId($newId);

        array_push($this->vehicleList, $vehicle);

        $this->saveData();
    }

    public function read($id)
    {
        $this->retrieveData();
        $flag = false;
        $vehicleReturn = new Vehicle();
        foreach ($this->vehicleList as $v) {
            if (!$flag) {
                if ($id == $v->getId()) {
                    $flag = true;
                    $vehicleReturn = $v;
                }
            }
        }
        return $vehicleReturn;
    }

    public function getAll()
    {

        $this->retrieveData();

        return $this->vehicleList;
    }

    public function saveData()
    {

        $arrayToJson = array();

        foreach ($this->vehicleList as $vehicle) {

            $valuesArray["brand"] = $vehicle->getBrand();
            $valuesArray["model"] = $vehicle->getModel();
            $valuesArray["plate"] = $vehicle->getPlate();
            $valuesArray["year"] = $vehicle->getYear();
            $valuesArray["email"] = $vehicle->getEmail();
            $valuesArray["id"] = $vehicle->getId();


            array_push($arrayToJson, $valuesArray);
        }

        $jsonContent = json_encode($arrayToJson, JSON_PRETTY_PRINT);

        file_put_contents('Data/vehicles.json', $jsonContent);
    }


    public function retrieveData()
    {

        $this->vehicleList = array();

        if (file_exists('Data/vehicles.json')) {

            $jsonContent = file_get_contents('Data/vehicles.json');

            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

            foreach ($arrayToDecode as $valuesArray) {

                $vehicle = new Vehicle();

                $vehicle->setBrand($valuesArray["brand"]);
                $vehicle->setModel($valuesArray["model"]);
                $vehicle->setPlate($valuesArray["plate"]);
                $vehicle->setYear($valuesArray["year"]);
                $vehicle->setEmail($valuesArray["email"]);
                $vehicle->setId($valuesArray["id"]);

                array_push($this->vehicleList, $vehicle);
            }
        }
    }

    public function edit($vehicle)
    {
        $this->retrieveData();
        foreach ($this->vehicleList as $values) {
            if ($vehicle->getId() == $values->getId()) {
                $values->setBrand($vehicle->getBrand());
                $values->setModel($vehicle->getModel());
                $values->setYear($vehicle->getYear());
                $values->setPlate($vehicle->getPlate());
                
                break;
            }
        }


        $this->saveData();
    }


    
    public function delete($id)
    {

        $this->retrieveData();

        foreach ($this->vehicleList as $vehicle) {
            if ($vehicle->getId() == $id) {
                $vehicleToDelete = array_search($vehicle, $this->vehicleList);
                unset($this->vehicleList[$vehicleToDelete]);
                break;
            }
        }

        $this->saveData();
    }
}
