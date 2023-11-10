<?php
require_once './app/models/seasonModel.php';
require_once './app/models/chapterModel.php';
require_once './app/views/chapterView.php';
require_once './app/helpers/authHelper.php'; 

class ChapterController{
  private $seasonModel; 
  private $chapterModel; 
  private $view;
  private $authHelper;
  function __construct(){
    $this->seasonModel = new SeasonModel();
    $this->chapterModel = new ChapterModel();
    $this->view = new ChapterView();
    $this->authHelper = new AuthHelper();  
  }
  function chaptersOfSeasonID ($season_id){
    /* $chapters = $this->chapterModel->getChaptersOfSeasonID($season_id);
      $this->view->showChapterOfSeasonID($chapters, $season_id); */
     // $season = $this->seasonModel->getSeasonId($season_id);
     //PORQ CON SHOWCHAPTEROFSEASONID NO ME ANDA, SIENDO QUE SERIA LO INDICADO PORQ ME DEVUELVE UN ARR SOLO CON LOS CAP DE ESA TEMP
     if($season_id > 0){
      $chapters = $this->chapterModel->getAllChapter();
      $this->view->showChapterOfSeasonID( $chapters, $season_id);        
     }
  }
  function showAllChapters(){
    $chapters = $this->chapterModel->getAllChapterOrdenByNumber(); 
    $this->view->showAllChapters($chapters);
  }
  function showChapterEditor(){
    $this->authHelper->checkLoggedIn();
    $seasons = $this->seasonModel->getAllChapterOrdenByNumber();
    $chapters = $this->chapterModel->getAllChapterOrdenByNumber();
    $this->view->showChapterEditor($chapters, $seasons);      
  }
  
  function addChapter(){
    $this->authHelper->checkLoggedIn();
    //$seasons = $this->seasonModel->getAllChapterOrdenByNumber();
    $chapterNumber = $_POST['chapterNumber'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $season_id = $_POST['season_id'];
  
    if(empty($chapterNumber) || empty($name) || empty($description) || empty($season_id)){
      $this->view->showError("Complete all fields of the form");
      die();
    }
    $chapterNumberExists = $this->chapterModel->chapterNumberExists($chapterNumber);
    if($chapterNumberExists){
      $this->view->showError("Error there is already a chapter with that number");
      die();
    }
    $id = $this->chapterModel->insertChapter($chapterNumber, $name, $description,$season_id);
    if($id){
      header('Location:'. BASE_URL . 'chaptersEdition');
    }
    else{
      $this->view->showError("Error inserting chapter");
    }
  }
    
  
  function removeChapter($id){
    $this->authHelper->checkLoggedIn();
    $this->chapterModel->deleteChapter($id);
    header('Location:' . BASE_URL . 'chaptersEdition'); 
  }

  function showEditChapter($chapter_id){
    $this->authHelper->checkLoggedIn();
    $this->view->showEditChapter($chapter_id);
  }

  function editChapter($id){
    $this->authHelper->checkLoggedIn();
    $chapterNumber = $_POST['chapterNumber'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    if(empty($chapterNumber) || empty($name) || empty($description)){
      $this->view->showError("Complete all fields of the form");
      die();
    }
    $chapterNumberExists = $this->chapterModel->chapterNumberExists($chapterNumber);
    if($chapterNumberExists){
      $this->view->showError("Error there is already a chapter with that number");
      die();
    }

    $id = $this->chapterModel->updateChapter($chapterNumber, $name, $description, $id);
    if($id){
      header('Location:'. BASE_URL . 'chaptersEdition');
    }
    else{
      $this->view->showError("Error when editing chapter");
    }   
  }
} 