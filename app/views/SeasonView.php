<?php
class SeasonView{

    function showSeasons($seasons){
        $count = count($seasons);
        require './templates/seasonsList.phtml';
        
    }

    function showSeasonsAsEditor($seasons){
        $count = count($seasons);
        require './templates/editorSection.phtml';
    }

    public function showError($error){
        require './templates/error.phtml';
    }

}