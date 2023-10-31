<?php
require_once './app/models/model.php';
class SeasonModel extends Model{

    function getAllSeasons(){
        //fijarme si este lo uso , de no ser asi borrarlo
        $query = $this->db->prepare('SELECT * FROM season');
        $query->execute();
        $seasons = $query->fetchAll(PDO::FETCH_OBJ);
        return $seasons; 
    }
    function getAllChapterOrdenByNumber(){
        $query = $this->db->prepare('SELECT * FROM `season` ORDER BY `season`.`seasonNumber` ASC');
        $query->execute();
        $seasons = $query->fetchAll(PDO::FETCH_OBJ);
        return $seasons; 
    }
    function getSeasonId($season_id){
        $query = $this->db->prepare('SELECT * FROM season WHERE season_id = ?');
        $query->execute([$season_id]);

        $season= $query->fetch(PDO::FETCH_OBJ);
        return $season; 
    }
    
    //TENDRIA QUE AGREGAR UN CHECK LOGIN ACA EN EL MODEL 
    function insertSeason($seasonNumber,$releaseYear, $director, $recordingCity, $categoryGenre){
        $query = $this->db->prepare('INSERT INTO season (seasonNumber,releaseYear, director, recordingCity,categoryGenre) VALUES (?,?,?,?,?)');
        $query->execute([$seasonNumber,$releaseYear, $director, $recordingCity, $categoryGenre]);
        return $this->db->lastInsertId();
    }
    function deleteSeason($id){
        $query = $this->db->prepare('DELETE FROM season WHERE season_id = ?');
        $query->execute([$id]);
    }
    function updateSeason($seasonNumber,$releaseYear, $director, $recordingCity, $categoryGenre, $id){
        $query = $this->db->prepare('UPDATE season SET seasonNumber = ?, releaseYear = ?, director = ?, recordingCity = ?, categoryGenre = ? WHERE season_id = ?');
        $query->execute([$seasonNumber,$releaseYear, $director, $recordingCity, $categoryGenre, $id]);
        return $query; 
    }
    
}