<?php
include_once './app/models/SeasonModel.php';
include_once './app/views/SeasonView.php';

class SeasonController{
    private $seasonModel;
    private $seasonView;

    function __construct(){
        $this->seasonModel = new SeasonModel();
        $this->seasonView = new SeasonView();
    }

    function showSeasons(){
        $seasons = $this->seasonModel->getSeasons();
        $this->seasonView->showSeasons($seasons);
    }
//seasonNumber, relaseYear, director, recordingCity, categoryGenre
    function addSeason(){
        $seasonNumber = $_POST['seasonNumber'];
        $releaseYear = $_POST['releaseYear'];
        $director = $_POST['director'];
        $recordingCity = $_POST['recordingCity'];
        $categoryGenre = $_POST['categoryGenre'];

        if(empty($seasonNumber) || empty($releaseYear) || empty ($director) || empty($recordingCity) || empty($categoryGenre)){
         //mall
         echo "404";
         die();
        }

        $id = $this->seasonModel->addSeason($seasonNumber, $releaseYear, $director, $recordingCity, $categoryGenre);
        if($id){
            header('Location:' . BASE_URL . '/editorView');
        }

    }

}