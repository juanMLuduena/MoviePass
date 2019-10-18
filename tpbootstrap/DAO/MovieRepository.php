<?php namespace DAO;
include("DAO/IMovieRepository.php");
//API key ead8068ec023b7d01ad25d135bf8f620

use Models\Movie as Movie;

class MovieRepository //implements IMovieRepository
{
    private $movieList = array ();

    public function __constructor(){

    }


    public function add(Movie $movie){

        $this->retrieveData();

        array_push($this->movieList, $movie);

        $this->saveData();
    }

    public function getAll(){

        $this->retrieveData();

        return $this->movieList;
    }

    public function saveData(){

        $arrayToJson = array();

        foreach($this->movieList as $movie){

            $valuesArray["adult"] = $movie->getAdult();
            $valuesArray["genre_ids"] = $movie->getGenreIds();
            $valuesArray["id"] = $movie->getIdMovie();
            //$valuesArray["homePage"] = $movie->getHomePage();
            $valuesArray["original_language"] = $movie->getLanguage();
            $valuesArray["title"] = $movie->getTitle();
            $valuesArray["overview"] = $movie->getOverview();
            $valuesArray["poster_path"] = $movie->getPosterPath();
            $valuesArray["release_date"] = $movie->getReleaseDate();
            $valuesArray["backdrop_path"] = $movie->getBackdropPath();

            array_push($arrayToJson, $valuesArray);
        }

        $jsonContent = json_enconde($arrayToJson, JSON_PRETTY_PRINT);

        file_put_contents('Data/movies.json', $jsonContent);
    }

    public function retrieveData(){

        $this->movieList = array ();

        if(file_exists('Data/movies.json')){

            $jsonContent = file_get_contents('Data/movies.json');
            echo " HOLA";
           $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
            print_r($arrayToDecode); //Con esto mostramos todo el contenido del json
            //aca empieza a andar mal
            foreach($arrayToDecode as $key => $valuesArray){
                echo "HOLA DESDE EL FOREACH";
                $movie = new Movie();
                
                $movie->setAdult($valuesArray["adult"]);
               // $movie->setGenreIds($valuesArray["genre_ids"]);
                $movie->setIdMovie($valuesArray["id"]);
                //$movie->setHomePage($valuesArray["homePage"]);
                $movie->setLanguage($valuesArray["original_language"]);
                $movie->setTitle($valuesArray["title"]);
                echo $valuesArray["title"]; //usamos esto para ver si cargaba algo(no lo hace)
                $movie->setOverview($valuesArray["overview"]);
                $movie->setPosterPath($valuesArray["poster_path"]);
                $movie->setReleaseDate($valuesArray["release_date"]);
                $movie->setBackdropPath($valuesArray["backdrop_path"]);

                $movie->toString();
                array_push($this->movieList, $movie);
            }
        }
    }
    
    public function toString(){

        $i=0;
        for($i=0;$i<sizeof($this->movieList);$i++){

        //$movieList[$i]->toString(); 
        echo $movieList[$i]->getTitle();          

        }

    }
}
