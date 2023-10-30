<?php
include_once './app/views/editorView.php';
include_once './app/models/ChapterModel.php';
include_once './app/models/SeasonModel.php';
include_once './app/helpers/AuthHelper.php';
<<<<<<< HEAD
=======
include_once './app/views/ShowError.php';
>>>>>>> 6e729e17076e14c8bb77a5490397ebd594e11963

class EditorController{
    private $editorView;
    private $chapterModel;
    private $seasonModel;
    private $authHelper;
<<<<<<< HEAD

    function __construct()
    {
        $this->editorView = new EditorView();
        $this->authHelper = new AuthHelper();
        $this->seasonModel = new SeasonModel();
        $this->chapterModel = new ChapterModel();        
=======
    private $showError; 

    function __construct(){
        $this->editorView = new EditorView();
        $this->authHelper = new AuthHelper();
        $this->seasonModel = new SeasonModel();
        $this->chapterModel = new ChapterModel();   
        $this->showError = new ShowError();     
>>>>>>> 6e729e17076e14c8bb77a5490397ebd594e11963
    }

    function itemsAsEditor(){
        $this->authHelper->checkLoggedIn();
        $chapters = $this->chapterModel->getChapters();
        $seasons = $this->seasonModel->getSeasons();
        $this->editorView->showItemsAsEditor($seasons, $chapters);
    }

<<<<<<< HEAD
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
=======
function addSeason(){
    $this->authHelper->checkLoggedIn();
    $seasonNumber = $_POST['seasonNumber'];
    $releaseYear = $_POST['releaseYear'];
    $director = $_POST['director'];
    $recordingCity = $_POST['recordingCity'];
    $categoryGenre = $_POST['categoryGenre'];
    if(empty($seasonNumber) || empty($releaseYear) || empty ($director) || empty($recordingCity) || empty($categoryGenre)){
        $this->showError->ShowError("Error inserting season, complete the form");
        die();
    }
    $id = $this->seasonModel->addSeason($seasonNumber, $releaseYear, $director, $recordingCity, $categoryGenre);
    if($id){
        header('Location:' . BASE_URL . '/editorSection');
    }
    else{
       $this->showError->ShowError("Error inserting season");
    }
}
    
function deleteSeason($season_id){
    $this->authHelper->checkLoggedIn();
    $this->seasonModel->deleteSeason($season_id);
    header('Location: ' . BASE_URL . 'editorSection');
}

function addChapter(){
    $this->authHelper->checkLoggedIn();
    $name = $_POST['name'];
    $description = $_POST['description'];
    $season_id_fk  = $_POST['season_id_fk'];

    if(empty($name) || empty($description) || empty($season_id_fk)){
        $this->showError->ShowError("Error inserting chapter, complete the form");
        die();
    }
    $id = $this->chapterModel->addChapter($name, $description, $season_id_fk);
    if($id){
        header('Location:' . BASE_URL . 'editorSection');
    }
    else{
        $this->showError->ShowError("Error inserting chapter");
    }

}

function deleteChapter($id) {
    $this->authHelper->checkLoggedIn();
    $chapters = $this->chapterModel->getChapters();
    $seasons = $this->seasonModel->getSeasons();
    $contador = 0;
    foreach ($chapters as $chapter) {
        if($chapter->chapter_id ==$id){
            foreach ($chapter as $chapter) {
                if($chapter->chapter_id==$id){
                    $contador ++;
                }
            }
            if($contador == 0){
                $this->chapterModel->deleteChapter($id);
                header('Location:' . BASE_URL . 'editorSection');
            } 
        }
    }
}

function showEdit($chapter_id) {
    $this->authHelper->checkLoggedIn();
    $seasons = $this->seasonModel->getSeasons();
    $chapters = $this->chapterModel->getChapterOfSeason($chapter_id);
    $this->editorView->showEdit($seasons, $chapter_id, $chapters);
}

function editChapter($chapter_id){
    $this->authHelper->checkLoggedIn();
    $name = $_POST['name'];
    $description = $_POST['description'];
    $season_id_fk = $_POST['season_id_fk'];
    
    if (empty($name) || empty($description) || empty($season_id_fk)) {
        $this->showError->showError("Error, complete the form");
        die();
    }

    $id = $this->chapterModel->updateChapter($name, $description, $season_id_fk, $chapter_id);
    if ($id) {
        header('Location: ' . BASE_URL . 'editorSection');
    } else {
        $this->showError->showError("Error al modificar la tarea");
    }
}


>>>>>>> 6e729e17076e14c8bb77a5490397ebd594e11963
}