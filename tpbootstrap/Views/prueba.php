<?php namespace Views;


include("Config/Autoload.php");

$prueba = new MovieRepository();

$prueba :: retrieveData();

print_r($prueba);

?>