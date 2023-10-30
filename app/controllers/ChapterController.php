<?php
include_once './app/models/ChapterModel.php';
include_once './app/views/ChapterView.php';
include_once './app/helpers/AuthHelper.php';

class ChapterController
{
    private $chapterView;
    private $chapterModel;
    function __construct()
    {
        $this->chapterModel = new ChapterModel();
        $this->chapterView = new ChapterView();
    }

    function showChapters(){
        $chapters = $this->chapterModel->getChapters();
        $this->chapterView->showChapters($chapters);
    }

    function ShowChapterOfSeason($id)
    {
        $chapter = $this->chapterModel->getChapterOfSeason($id);
        $this->chapterView->ShowChapterOfSeason($chapter);
    }
}
