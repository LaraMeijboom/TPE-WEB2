<?php
class ChapterView{

    function showChapterOfSeasonID($chapters, $season_id){
       
        require './templates/listOfChaptersBySeason.phtml';
    }
    function showAllChapters($chapters){
        require './templates/chaptersAll.phtml';
    }
    function showError($error) {
        require 'templates/error.phtml';
    }
    function showChapterEditor($chapters, $seasons){
        require './templates/chaptersEdition.phtml';
    }
    function showEditChapter($chapter_id){
        require './templates/chapterEditingSection.phtml';
    }
}