<?php namespace DAO;

use Models\Cellphone as Cellphone;
use DAO\Connection as Connection;

class CellphoneRepository 
{
    private $connection;

    function __construct() {}


    public function add($cellphone) 
    {
             
	    $sql = "INSERT INTO Cellphones (code, brand, model, price) VALUES (:code, :brand, :model, :price)";

        $parameters['code'] = $cellphone->getCode();
        $parameters['brand'] = $cellphone->getBrand();
        $parameters['model'] = $cellphone->getModel();
        $parameters['price'] = $cellphone->getPrice();

        try 
        {
            $this->connection = Connection::getInstance();
             
			return $this->connection->ExecuteNonQuery($sql, $parameters);
        } 
        catch(\PDOException $ex) 
        {
            throw $ex;
        }

    }



    public function read($id_cellphone) 
    {

        $sql = "SELECT * FROM Cellphones where id_cellphone = :id_cellphone";

        $parameters['id_cellphone'] = $id_cellphone;

        try 
        {
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql, $parameters);
        } 
        catch(Exception $ex) 
        {
            throw $ex;
        }


        if(!empty($resultSet))
            return $this->mapear($resultSet);
        else
            return false;
    }

          public function getAll() {
               $sql = "SELECT * FROM Cellphones";

               try {
                    $this->connection = Connection::getInstance();
                    $resultSet = $this->connection->execute($sql);
               } catch(Exception $ex) {
                   throw $ex;
               }

               if(!empty($resultSet))
                    return $this->mapear($resultSet);
               else
                    return false;
          }


          /**
           *
           */
          public function edit($cellphone) {
               $sql = "UPDATE Cellphones SET code = :code, brand = :brand, model = :model, price = :price";

               $parameters['id_cellphone'] = $cellphone->getId();
               $parameters['code'] = $cellphone->getCode();
               $parameters['brand'] = $cellphone->getBrand();
               $parameters['model'] = $cellphone->getModel();
               $parameters['price'] = $cellphone->getPrice();

               try {
     			$this->connection = Connection::getInstance();
				return $this->connection->ExecuteNonQuery($sql, $parameters);
			} catch(\PDOException $ex) {
                   throw $ex;
              }
          }


          public function delete($id_cellphone) {
               $sql = "DELETE FROM Cellphones WHERE id_cellphone = :id_cellphone";

               $obj_pdo = new Conexion();

               try {
                    $conexion = $obj_pdo->conectar();

				$sentencia = $conexion->prepare($sql);

                    $sentencia->bindParam(":id_cellphone", $id_cellphone);

                    $sentencia->execute();


               } catch(PDOException $Exception) {

				throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );

			}
          }


		protected function mapear($value) {

			$value = is_array($value) ? $value : [];

			$resp = array_map(function($p){
				return new Cellphone($p['id_cellphone'], $p['code'], $p['model'], $p['brand'], $p['price']);
			}, $value);

               return count($resp) > 1 ? $resp : $resp['0'];

		}
     }
