<?php 
//require_once './database/config.php';
require_once './app/models/Model.php';
class SeasonModel extends Model{
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

<<<<<<< HEAD
    
}
=======
}


    
    
?>
>>>>>>> 6e729e17076e14c8bb77a5490397ebd594e11963
