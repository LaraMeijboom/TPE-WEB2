<?php
include_once './app/models/SeasonModel.php';
include_once './app/views/SeasonView.php';
include_once './app/views/editorView.php';

class SeasonController{
    private $seasonModel;
    private $seasonView;
    private $editorView;

    function __construct(){
       //AuthHelper::verify();
        $this->seasonModel = new SeasonModel();
        $this->seasonView = new SeasonView();
        $this->editorView = new EditorView();
    }

    function showSeasons(){
        $seasons = $this->seasonModel->getSeasons();
        $this->seasonView->showSeasons($seasons);
    }

    function seasonsAsEditor(){
        $seasons = $this->seasonModel->getSeasons();
        $this->editorView->showSeasonsAsEditor($seasons);
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
            header('Location:' . BASE_URL . '/editorSection');
        }
        else{
           // $this->seasonView->showError("Error al insertar la temp")
           echo "error";
        }

    }

    function removeSeason($id){
        $this->seasonModel->deleteSeason($id);
        header('Location: ' . BASE_URL . '/editorSection');
    }



}