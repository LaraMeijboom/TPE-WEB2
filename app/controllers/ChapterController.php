<?php
include_once './app/models/ChapterModel.php';
include_once './app/views/ChapterView.php';

class ChapterController{
    private $chapterView;
    private $chapterModel;

    function __construct(){
        $this->chapterModel = new ChapterModel();
        $this->chapterView = new ChapterView();   
    }

    function showChapters(){
        $chapters = $this->chapterModel->getChapters();
        $this->chapterView->showChapters($chapters);
    }
}