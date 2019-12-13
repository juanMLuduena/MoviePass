<?php

namespace daoBd;

use models\user as User;
use daoBd\Connection as Connection;
use daoBd\IRepository as IRepository;

class UserRepository extends Singleton implements Irepository
{
     private $connection;

     function __construct()
     { }

     public function Add($user)
     {

          $sql = "INSERT INTO Users (username, email,password, dni) VALUES (:username,:email,:password,:dni)";

          $parameters['username'] = $user->getUsername();
          $parameters['email'] = $user->getEmail();
          $parameters['pass'] = $user->getPass();
          $parameters['dni'] = $user->getDni();
          try {
               $this->connection = Connection::getInstance();
               return $this->connection->ExecuteNonQuery($sql, $parameters);
          } catch (\PDOException $ex) {
               throw $ex;
          }
     }

     public function read($email)
     {

          $sql = "SELECT * FROM Users where email = :email";

          $parameters['email'] = $email;

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

     public function readId($Id)
     {

          $sql = "SELECT * FROM Users where user_id = :id";

          $parameters['id'] = $id;

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
          $sql = "SELECT * FROM Users";

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

     public function edit($user)
     {
          $sql = "UPDATE Users 
               SET  
               password = :password 
               WHERE id_user = :id_user";

          $parameters['pass'] = $user->getPass();
          $parameters['id_user'] = $user->getId();
          try {
               $this->connection = Connection::getInstance();
               return $this->connection->ExecuteNonQuery($sql, $parameters);
          } catch (\PDOException $ex) {
               throw $ex;
          }
     }

     public function delete($email)
     {

          $sql = "DELETE * from Users 
          WHERE email = :email";
     $parameters['email'] = $user->getEmail();
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
               $user = new User();
               $user->setId($p['id_user']);
               $user->setUsername($p['username']);
               $user->setEmail($p['email']);
               $user->setPass($p['pass']);
               $user->setDni($p['dni']);
               return $user;
          }, $value);

          return count($resp) > 1 ? $resp : $resp['0'];
     }
}
