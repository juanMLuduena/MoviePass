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

        if(file_exist('Data/movies.json')){

            $jsonContent = file_get_contents('Data/movies.json');

            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

            foreach($arrayToDecode as $valuesArray){

                $movie = new Movie();
                $movie->setAdult($valuesArray["adult"]);
                $movie->setGenreIds($valuesArray["genre_ids"]);
                $movie->setIdMovie($valuesArray["id"]);
                //$movie->setHomePage($valuesArray["homePage"]);
                $movie->setLanguage($valuesArray["original_language"]);
                $movie->setTitle($valuesArray["title"]);
                $movie->setOverview($valuesArray["overview"]);
                $movie->setPosterPath($valuesArray["poster_path"]);
                $movie->setReleaseDate($valuesArray["release_date"]);
                $movie->setBackdropPath($valuesArray["backdrop_path"]);


                array_push($this->movieList, $movie);
            }
        }
    }
}
