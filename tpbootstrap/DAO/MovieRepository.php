<?php namespace DAO;

//API key ead8068ec023b7d01ad25d135bf8f620

use Models\Movie as Movie;
use DAO\IRepository as IRepository;

class MovieRepository implements IRepository
{

    private $movieList = array ();

    public function __constructor(){

    }


    public function add($movie){

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
    
            $arrayToDecode= ($jsonContent) ? json_decode($jsonContent, true) : array();
            //el json original es de la busqueda, y dentro de esa busqueda esta el array de movies
           // $arrayToDecode=$arrayToDecode2['results'];
            foreach($arrayToDecode['results'] as $valuesArray){

                $movie = new Movie();
                
                $movie->setAdult($valuesArray['adult']);
               // $movie->setGenreIds($valuesArray["genre_ids"]);
                $movie->setIdMovie($valuesArray['id']);
                //$movie->setHomePage($valuesArray["homePage"]);
                $movie->setLanguage($valuesArray['original_language']);
                $movie->setTitle($valuesArray['title']);
                $movie->setOverview($valuesArray['overview']);
                $movie->setPosterPath($valuesArray['poster_path']);
                $movie->setReleaseDate($valuesArray['release_date']);
                $movie->setBackdropPath($valuesArray['backdrop_path']);

                $movie->toString();
                array_push($this->movieList, $movie);
            }
        }
    }

    public function update($data){


    }

    public function delete($id){


    }
    
    public function toString(){

        $i=0;
        for($i=0;$i<sizeof($this->movieList);$i++){

        echo $this->movieList[$i]->getTitle();          

        }

    }
}
