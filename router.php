<?php
  require_once "./app/controllers/SeasonController.php";
  require_once "./app/controllers/ChapterController.php";
  require_once "./app/controllers/AuthController.php";
  require_once "./app/controllers/EditorController.php";
<<<<<<< HEAD
=======

>>>>>>> 6e729e17076e14c8bb77a5490397ebd594e11963

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
<<<<<<< HEAD
=======

>>>>>>> 6e729e17076e14c8bb77a5490397ebd594e11963
  
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
    case 'addChapter':
      $editorController->addChapter();
      break;
    case 'showSeasons':
      $seasonController->showSeasons();
<<<<<<< HEAD
      break;
    case 'delete':
      $editorController->removeSeason($params[1]);
      break;
=======
    break;
    case 'deleteSeason':
      $editorController->deleteSeason($params[1]);
    break;
    case 'deleteChapter':
      $editorController->deleteChapter($params[1]);
    break; 
>>>>>>> 6e729e17076e14c8bb77a5490397ebd594e11963
    case 'logout':
      $authController->logout();
    break;
    case 'showEdit':
      $editorController->showEdit($params[1]);
      break;
<<<<<<< HEAD
  }
  ?>
=======
    case 'editChapter':
      $editorController->editChapter($params[1]);
      break;
    default: 
      echo "404 Page Not Found";
    break;
 }
  
?>
>>>>>>> 6e729e17076e14c8bb77a5490397ebd594e11963
