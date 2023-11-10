<?php
require_once './app/models/seasonModel.php';
require_once './app/models/chapterModel.php';
require_once './app/views/seasonView.php';
require_once './app/helpers/authHelper.php'; 

class SeasonsController{
    private $seasonModel; 
    private $chapterModel; 
    private $view;
    private $authHelper; 
    function __construct(){
        $this->seasonModel = new SeasonModel();
        $this->chapterModel = new ChapterModel();
        $this->view = new SeasonView(); 
        $this->authHelper = new AuthHelper(); 
    }


    function showSeasons(){
        $seasons = $this->seasonModel->getAllChapterOrdenByNumber();
        $this->view->showAllSeasons($seasons);
    }

    function chapterOfSeason($season_id){
        $season = $this->seasonModel->getSeasonId($season_id);
        $this->view->showSeasonId($season);  

    }
    function showSeasonEditor(){
        $this->authHelper->checkLoggedIn();
        $seasons = $this->seasonModel->getAllChapterOrdenByNumber(); 
        $this->view->showSeasonEditor($seasons); 
    }

    function addSeason(){
        $this->authHelper->checkLoggedIn();
        $seasonNumber = $_POST['seasonNumber'];
        $releaseYear = $_POST['releaseYear'];
        $director = $_POST['director'];
        $recordingCity = $_POST['recordingCity'];
        $categoryGenre = $_POST['categoryGenre'];

        if(empty($seasonNumber) ||empty($releaseYear ) ||empty($director) ||empty($recordingCity) ||empty($categoryGenre)){
            $this->view->showError("Complete all fields of the form");
            die();
        }
        $seasonNumberExists = $this->seasonModel->seasonNumberExists($seasonNumber);
        if($seasonNumberExists){
            $this->view->showError("Error there is already a season with that number");
            die();
        }
        $id = $this->seasonModel->insertSeason($seasonNumber,$releaseYear, $director, $recordingCity, $categoryGenre);
        if($id){ 
            header('Location:' . BASE_URL . 'seasonsEdition');
        }
        else{
            $this->view->showError("Error inserting Season");
        }
    }

    function removeSeason($id){
        $this->authHelper->checkLoggedIn();
        $tiene = $this->chapterModel->getChaptersOfSeasonID($id);
        if($tiene){
            $this->view->showError("This season contains chapters. Can not be deleted");
            die();
        }
        $this->seasonModel->deleteSeason($id);
        header('Location:'. BASE_URL . 'seasonsEdition');
}

    function showEditSeason($season_id){
        $this->authHelper->checkLoggedIn();
        $this->view->showEditSeason($season_id);
    }
   
    function editSeason($id){
        $this->authHelper->checkLoggedIn();
        $seasonNumber = $_POST['seasonNumber'];
        $releaseYear = $_POST['releaseYear'];
        $director = $_POST['director'];
        $recordingCity = $_POST['recordingCity'];
        $categoryGenre = $_POST['categoryGenre'];

        if(empty($seasonNumber) ||empty($releaseYear ) ||empty($director) ||empty($recordingCity) ||empty($categoryGenre)){
            $this->view->showError("Complete all fields of the form");
            die();
        }
        $seasonNumberExists = $this->seasonModel->seasonNumberExists($seasonNumber);
        if($seasonNumberExists){
            $this->view->showError("Error there is already a season with that number");
            die();
        }
        $id = $this->seasonModel->updateSeason($seasonNumber,$releaseYear, $director, $recordingCity, $categoryGenre, $id);
        if($id){
            header('Location:' . BASE_URL . 'seasonsEdition');
        }
        else{
            $this->view->showError("Error editing Season");
        }
    }
}