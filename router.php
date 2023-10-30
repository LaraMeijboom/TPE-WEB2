<?php
  require_once "./app/controllers/SeasonController.php";
  require_once "./app/controllers/ChapterController.php";
  require_once "./app/controllers/AuthController.php";
  require_once "./app/controllers/EditorController.php";

  define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


  $action = 'home';
  if(!empty($_GET['action'])) {
      $action = $_GET['action'] ;
  }
  
  $params = explode('/' , $action);
  $seasonController = new SeasonController();
  $chapterController = new ChapterController();
  $authController = new AuthController();
  $editorController = new EditorController();
  
  switch ($params[0]) {
    case 'home':
      $seasonController->showSeasons();
    break;
    case'season' : 
      $chapterController->ShowChapterOfSeason($params[1]);
    break;
    case 'login' :
      $authController->showFormLogin();
    break;
    case 'validate':
      $authController->validateUser();
    break;
    case 'editorSection': 
      $editorController->itemsAsEditor();
    break;
    case 'addSeason': 
      $editorController->addSeason();
    break;
    case 'showSeasons':
      $seasonController->showSeasons();
      break;
    case 'delete':
      $editorController->removeSeason($params[1]);
      break;
    case 'logout':
      $authController->logout();
      break;
  }
  ?>