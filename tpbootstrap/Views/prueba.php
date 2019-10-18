<?php namespace Views;

use DAO\MovieRepository as MovieRepository;

$prueba = new MovieRepository();

$prueba :: retrieveData();

print_r($prueba);

?>