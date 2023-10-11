<?php
class SeasonView{

    function showSeasons($seasons){
        $count = count($seasons);
        require './templates/seasonsList.phtml';
        
    }

  

    public function showError($error){
        require './templates/error.phtml';
    }

}