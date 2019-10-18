<?php namespace Models;

class Movie{
    private $adult;
    private $genreIds;
    private $idMovie;
    private $homePage;
    private $language;
    private $title;
    private $overview;
    private $posterPath;
	private $releaseDate;
	private $backdropPath;


    public function __constructor($adult, $genreIds, $idMovie, $homePage, $language, $title, $overview, $posterPath, $releaseDate,$backdropPath)
    {
		$this->adult=$adult;
		//$this->genreIds=$genreIds;
		$this->idMovie=$idMovie;
		$this->homePage=$homePage;
		$this->language=$language;
		$this->tilte=$title;
		$this->overview=$overview;
		$this->posterPath=$posterPath;
		$this->releaseDate=$releaseDate;
		$this->backdropPath=$backdropPath;
        
    }

    public function getAdult(){
		return $this->adult;
	}

	public function setAdult($adult){
		$this->adult = $adult;
	}

	//Hacer que estos sean para arrays
	public function getGenreIds(){
		return $this->genreIds;
	}

	public function setGenreIds($genreIds){
		$this->genreIds = $genreIds;
	}

	public function getIdMovie(){
		return $this->idMovie;
	}

	public function setIdMovie($idMovie){
		$this->idMovie = $idMovie;
	}

	public function getHomePage(){
		return $this->homePage;
	}

	public function setHomePage($homePage){
		$this->homePage = $homePage;
	}

	public function getLanguage(){
		return $this->language;
	}

	public function setLanguage($language){
		$this->language = $language;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setTitle($title){
		$this->title = $title;
	}

	public function getOverview(){
		return $this->overview;
	}

	public function setOverview($overview){
		$this->overview = $overview;
	}

	public function getPosterPath(){
		return $this->posterPath;
	}

	public function setPosterPath($posterPath){
		$this->posterPath = $posterPath;
	}

	public function getReleaseDate(){
		return $this->releaseDate;
	}

	public function setReleaseDate($releaseDate){
		$this->releaseDate = $releaseDate;
	}

	public function getBackdropPath(){
		return $this->backdropPath;
	}

	public function setBackdropPath($backdropPath){
		$this->backdropPath = $backdropPath;
	}

	public function toString(){
	echo $this->title."<br>";
	echo $this->posterPath."<br>";
	}
}