<?php
include_once './app/views/editorView.php';
include_once './app/models/ChapterModel.php';
include_once './app/models/SeasonModel.php';
include_once './app/helpers/AuthHelper.php';

class EditorController{
    private $editorView;
    private $chapterModel;
    private $seasonModel;
    private $authHelper;

    function __construct()
    {
        $this->editorView = new EditorView();
        $this->authHelper = new AuthHelper();
        $this->seasonModel = new SeasonModel();
        $this->chapterModel = new ChapterModel();        
    }

    function itemsAsEditor(){
        $this->authHelper->checkLoggedIn();
        $chapters = $this->chapterModel->getChapters();
        $seasons = $this->seasonModel->getSeasons();
        $this->editorView->showItemsAsEditor($seasons, $chapters);
    }

    function addSeason(){
        $this->authHelper->checkLoggedIn();
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
           //$this->viewError->showError("Error");
        }
     }
    
    function removeSeason($id){
        if($this->authHelper->checkLoggedIn()){
            $this->seasonModel->deleteSeason($id);
        header('Location: ' . BASE_URL . '/editorSection');
    }
  }
}