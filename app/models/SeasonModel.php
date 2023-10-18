<?php 
require_once './database/config.php';
class SeasonModel {
    protected $db;
    function __construct(){
      $this->db = new PDO("mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
      
    }
    function getSeasons(){
        $query = $this->db->prepare('SELECT * FROM seasons');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function addSeason($seasonNumber, $releaseYear, $director, $recordingCity, $categoryGenre){
        $query = $this->db->prepare('INSERT INTO seasons (seasonNumber, releaseYear, director, recordingCity, categoryGenre) VALUES (?,?,?,?,?)');
        $query->execute([$seasonNumber, $releaseYear, $director, $recordingCity, $categoryGenre]);
        return $this->db->lastInsertId();
    }

    function deleteSeason($season_id){
        $query = $this->db->prepare('DELETE FROM seasons WHERE season_id= ?');
        $query->execute([$season_id]);
        
    }

}


    
    
?>