<?php

class ChapterView{

    function showChapters($chapters){
        $count = count($chapters);
        require './templates/chaptersList.phtml';
    }

    function ShowChapterOfSeason($chapter){
        var_dump($chapter);
    }
}