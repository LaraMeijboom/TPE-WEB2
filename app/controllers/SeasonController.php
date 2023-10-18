<?php
include_once './app/models/SeasonModel.php';
include_once './app/views/SeasonView.php';
include_once './app/helpers/AuthHelper.php';


class SeasonController{
    private $authHelper;
    private $seasonModel;
    private $seasonView;

    function __construct(){
       $this->authHelper = new AuthHelper();
        $this->seasonModel = new SeasonModel();
        $this->seasonView = new SeasonView();
    }

    function showSeasons(){
        $seasons = $this->seasonModel->getSeasons();
        $this->seasonView->showSeasons($seasons);
    }


}


