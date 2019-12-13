<?php

namespace daoBd;

use models\vehicle as Vehicle;
use daoBd\Connection as Connection;
use daoBd\IRepository as IRepository;

class VehicleRepository extends Singleton implements Irepository
{
     private $connection;

     function __construct()
     { }

     public function Add($vehicle)
     {

          $sql = "INSERT INTO Vehicles (brand,model,plate,year,email) VALUES (:brand, :model, :plate, :year,:email)";

          $parameters['brand'] = $vehicle->getBrand();
          $parameters['model'] = $vehicle->getModel();
          $parameters['plate'] = $vehicle->getPlate();
          $parameters['year'] = $vehicle->getYear();
          $parameters['email'] = $vehicle->getEmail();
          try {
               $this->connection = Connection::getInstance();
               return $this->connection->ExecuteNonQuery($sql, $parameters);
          } catch (\PDOException $ex) {
               throw $ex;
          }
     }

     public function read($id_vehicle)
     {

          $sql = "SELECT * FROM Vehicles where id_vehicle = :id_vehicle";

          $parameters['id_vehicle'] = $id_vehicle;

          try {
               $this->connection = Connection::getInstance();
               $resultSet = $this->connection->execute($sql, $parameters);
          } catch (Exception $ex) {
               throw $ex;
          }


          if (!empty($resultSet))
               return $this->mapear($resultSet);
          else
               return false;
     }

     public function getAll()
     {
          $sql = "SELECT * FROM Vehicles";

          try {
               $this->connection = Connection::getInstance();
               $resultSet = $this->connection->execute($sql);
          } catch (Exception $ex) {
               throw $ex;
          }

          if (!empty($resultSet))
               return $this->mapear($resultSet);
          else
               return false;
     }

     public function edit($vehicle)
     {
          $sql = "UPDATE Vehicles 
               SET  
               brand = :brand, 
               model = :model,
               plate = :plate,
               year = :year,
               WHERE id_vehicle = :id_vehicle";

          $parameters['brand'] = $vehicle->getBrand();
          $parameters['model'] = $vehicle->getModel();
          $parameters['plate'] = $vehicle->getPlate();
          $parameters['year'] = $vehicle->getYear();
          $parameters['id_vehicle'] = $vehicle->getId();
          try {
               $this->connection = Connection::getInstance();
               return $this->connection->ExecuteNonQuery($sql, $parameters);
          } catch (\PDOException $ex) {
               throw $ex;
          }
     }

     public function delete($id)
     {

          $sql = "DELETE * from Vehicles 
          WHERE id_vehicle = :id";
     $parameters['id'] = $vehicle->getId();
     try {
          $this->connection = Connection::getInstance();
          return $this->connection->ExecuteNonQuery($sql, $parameters);
     } catch (\PDOException $ex) {
          throw $ex;
     }
      }

     protected function mapear($value)
     {
          $value = is_array($value) ? $value : [];
          $resp = array_map(function ($p) {
               $vehicle = new Vehicle();
               $vehicle->setBrand($p['brand']);
               $vehicle->setModel($p['model']);
               $vehicle->setPlate($p['plate']);
               $vehicle->setYear($p['year']);
               $vehicle->setEmail($p['email']);
               $vehicle->setId($p['id_vehicle']);
               return $vehicle;
          }, $value);

          return count($resp) > 1 ? $resp : $resp['0'];
     }
}