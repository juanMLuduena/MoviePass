<?php
/*
require_once "Models/Movie.php";
use Models\Movie as Movie;

$prueba=new Movie();

$prueba->setTitle("el bromas");
$prueba->setPosterPath("xd");

$prueba->toString();    

*/


include("Models/Movie.php");
include("DAO/MovieRepository.php");
use DAO\MovieRepository as MovieRepository;
$prueba= array();
$prueba = new MovieRepository();

$prueba->retrieveData();


$prueba->toString();

?>