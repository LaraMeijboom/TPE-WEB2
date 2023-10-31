<?php
  require_once './app/controllers/seasonController.php';
  require_once './app/controllers/chapterController.php';
  require_once './app/controllers/authController.php';
  define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
  $action = 'seasons';
  if(!empty($_GET['action'])) {
    $action = $_GET['action'] ;
  }
  
  $params = explode('/' , $action);
  $seasonController = new SeasonsController ();
  $chapterController = new ChapterController();
  $authController = new AuthController();




  switch ($params[0]) {
    case 'seasons':
      $seasonController->showSeasons();
      break;
    case 'deployChaptersOfSeasonID':
      $chapterController->chaptersOfSeasonID($params[1]);
      break;
    case 'chapters': 
      $chapterController->showAllChapters(); 
      break; 
    case 'chapterOfSeason':
      $seasonController->chapterOfSeason($params[1]);
      break; 
    case 'login':
        $authController->showLogin(); 
        break;
    case 'auth':
        $authController->auth();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'seasonsEdition': 
      $seasonController->showSeasonEditor(); 
      break; 
    case 'addSeason':
      $seasonController->addSeason(); 
      break;
    case 'deleteSeason': 
      $seasonController->removeSeason($params[1]); 
      break;
    case 'showEditSeason':
      $seasonController->showEditSeason($params[1]);
      break; 
    case 'editSeason': 
      $seasonController->editSeason($params[1]); 
      break;
    
    case 'chaptersEdition': 
        $chapterController->showChapterEditor(); 
        break; 
      case 'addChapter':
        $chapterController->addChapter(); 
        break;
      case 'deleteChapter': 
        $chapterController->removeChapter($params[1]); 
        break;
      case 'showEditChapter':
        $chapterController->showEditChapter($params[1]);
        break; 
      case 'editChapter': 
        $chapterController->editChapter($params[1]); 
        break;
    

   
  }