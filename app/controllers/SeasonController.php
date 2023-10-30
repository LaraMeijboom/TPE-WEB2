<?php
include_once './app/models/SeasonModel.php';
include_once './app/views/SeasonView.php';
include_once './app/helpers/AuthHelper.php';
<<<<<<< HEAD
=======

>>>>>>> 6e729e17076e14c8bb77a5490397ebd594e11963

class SeasonController{
    private $authHelper;
    private $seasonModel;
    private $seasonView;

    function __construct(){
<<<<<<< HEAD
       //AuthHelper::verify();
=======
>>>>>>> 6e729e17076e14c8bb77a5490397ebd594e11963
       $this->authHelper = new AuthHelper();
        $this->seasonModel = new SeasonModel();
        $this->seasonView = new SeasonView();
    }

    function showSeasons(){
        $seasons = $this->seasonModel->getSeasons();
        $this->seasonView->showSeasons($seasons);
    }
<<<<<<< HEAD
//seasonNumber, relaseYear, director, recordingCity, categoryGenre
}
=======


}


>>>>>>> 6e729e17076e14c8bb77a5490397ebd594e11963
