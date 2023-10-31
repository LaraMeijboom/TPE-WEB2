<?php
class SeasonView{

    function showAllSeasons($seasons){
       // $count = count($seasons);
        require './templates/seasons.phtml';
    }
    function showSeasonId($season){
        require './templates/seasonId.phtml'; 
    }
    function showSeasonEditor($seasons){
        require './templates/seasonsEdition.phtml'; 
    }
    function showError($error) {
        require 'templates/error.phtml';
    }
    function showEditSeason($season_id){
        require './templates/seasonEditingSection.phtml'; 
    }
}
//LE TENGO QUE PASAR A ADD CHAPTER TODAS LAS TEMP
//ORDENADAS PARA EL SELECT DE NUMBER TEMP
//AGREGAR ESO EN LOS CONTROLLER Y EN LAS VIEW
