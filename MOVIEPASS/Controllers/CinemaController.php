<?php

namespace Controllers;

use DAO\CinemaRepository as CinemaRepository;
use Controllers\MovieController as MovieController;
use Models\Cinema as Cinema;


class CinemaController
{

    private $cineDAO;

    public function __construct()
    {
        $this->cineDAO = new CinemaRepository();
    }

    public function formAddCinema()
    {
        $movieController = new MovieController();
        $nowPlaying = $movieController->getNowPlaying();

        $arrayGeneros = $movieController->getGenres();

        require_once(VIEWS_PATH . "addcinema.php");
    }

    public function addCinema($name, $address, $seats, $price, $moviechecked = array())
    {
        $cinema = new Cinema();
        $cinema->setName($name);
        $cinema->setAddress($address);
        $cinema->createSeats($seats);
        $cinema->setTicketPrice($price);

        $pelisPost = array();
        $pelisPost = $moviechecked;
        $arrayPeliculas = array();

        $movieController = new MovieController();

        if (!empty($pelisPost)) {
            foreach ($pelisPost as $title) {
                array_push($arrayPeliculas, $movieController->searchMovieByTitle($title));
            }
            $cinema->setBillBoard($arrayPeliculas);
        }

        $this->cineDAO->Add($cinema);
        require_once(VIEWS_PATH . "listcinemas.php");
    }

    public function listCinemas()
    {
        require_once(VIEWS_PATH . "listcinemas.php");
    }

    public function deleteCinema($id)
    {
        $this->cineDAO->deleteCinema($id);
        require_once(VIEWS_PATH . "listcinemas.php");
    }

    public function modifyBillBoard($id, $moviechecked)
    {
        $nuevaCartelera = array();
        $nuevaCartelera = $moviechecked;
        $arrayPeliculas = array();
        $movieController = new MovieController();

        if ($moviechecked != "") {
            foreach ($nuevaCartelera as $title) {
                array_push($arrayPeliculas, $movieController->searchMovieByTitle($title));
            }

            $this->cineDAO->modifyBillBoard($id, $arrayPeliculas);
        } else
            $this->cineDAO->modifyBillBoard($id, $arrayPeliculas);
    }

    public function modifyCinema($id, $nombre, $direccion, $asientos, $precio, $estado = false, $moviechecked = "")
    {
        $this->cineDAO->modifyCinema($id, $nombre, $direccion, $asientos, $precio, $estado);
        $this->modifyBillBoard($id, $moviechecked);
        require_once(VIEWS_PATH . "listcinemas.php");
    }
}
