<?php namespace DAO;

class MovieRepository implements IMovieRepository
{
    private $movieList = array ();


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
            $valuesArray["idGenre"] = $movie->getIdGenre();
            $valuesArray["idMovie"] = $movie->getIdMovie();
            $valuesArray["homePage"] = $movie->getHomePage();
            $valuesArray["language"] = $movie->getLanguage();
            $valuesArray["title"] = $movie->getTitle();
            $valuesArray["overview"] = $movie->getOverview();
            $valuesArray["posterPath"] = $movie->getPosterPath();
            $valuesArray["releaseDate"] = $movie->getReleaseDate();

            array_push($arrayToJson, $valuesArray);
        }

        $jsonContent = json_enconde($arrayToJson, JSON_PRETTY_PRINT);

        file_put_contents('DAO/movies.json', $jsonContent);
    }

    public function retrieveData(){

        $this->movieList = array ();

        if(file_exist('DAO/movies.json')){

            $jsonContent = file_get_contents('DAO/movies.json');

            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

            foreach($arrayToDecode as $valuesArray){

                $movie = new Movie();
                $movie->setAdult($valuesArray["adult"]);
                $movie->setIdGenre($valuesArray["idGenre"]);
                $movie->setIdMovie($valuesArray["idMovie"]);
                $movie->setHomePage($valuesArray["homePage"]);
                $movie->setLanguage($valuesArray["language"]);
                $movie->setTitle($valuesArray["title"]);
                $movie->setOverview($valuesArray["overview"]);
                $movie->setPosterPath($valuesArray["posterPath"]);
                $movie->setReleaseDate($valuesArray["releaseDate"]);


                array_push($this->movieList, $movie);
            }
        }
    }
}
