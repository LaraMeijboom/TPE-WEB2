<?php
  require_once "./app/controllers/SeasonController.php";
  require_once "./app/controllers/ChapterController.php";
  require_once "./app/controllers/AuthController.php";

  define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


  $action = 'home';
  if(!empty($_GET['action'])) {
      $action = $_GET['action'] ;
  }
  
  $params = explode('/' , $action);
  $seasonController = new SeasonController();
  $chapterController = new ChapterController();
  $authController = new AuthController();

  
  switch ($params[0]) {
      case 'home':
          $seasonController->showSeasons();
          break;
          case'season' : 
            $chapterController->ShowChapterOfSeason($params[1]);
            break;
          case 'login' :
            $authController->showLogIn();
          break;
          case 'auth':
            $authController->auth();
            break;
    }
  
  ?>