<?php

class SeasonModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=bd_app;charset=utf8', 'root');
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
        //ver
        $query = $this->db->prepare("DELETE FROM chapters WHERE $season_id");
        $query->execute();
    }
    
}