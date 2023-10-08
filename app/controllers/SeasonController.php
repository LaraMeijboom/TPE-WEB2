<?php
include_once './app/models/SeasonModel.php';
include_once './app/views/SeasonView.php';

class SeasonController{
    private $seasonModel;
    private $seasonView;

    function __construct(){
        $this->seasonModel = new SeasonModel();
        $this->seasonView = new SeasonView();
    }

    function showSeasons(){
        $seasons = $this->seasonModel->getSeasons();
        $this->seasonView->showSeasons($seasons);
    }
}