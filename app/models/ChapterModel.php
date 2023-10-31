<?php
require_once './app/models/model.php';
class ChapterModel extends Model{

    function getChaptersOfSeasonID($season_id){
        $query = $this->db->prepare('SELECT * FROM chapter WHERE season_id = ?');
        $query->execute([$season_id]);

        $chapters = $query->fetch(PDO::FETCH_OBJ);
        return $chapters;
    }
    function getAllChapter(){
        //si no se usa borrarlo
        $query = $this->db->prepare('SELECT * FROM chapter'); 
        $query->execute();

        $chapters = $query->fetchAll(PDO::FETCH_OBJ); 
        return $chapters;
    }
    function getAllChapterOrdenByNumber(){
        $query = $this->db->prepare('SELECT * FROM `chapter` ORDER BY `chapter`.`chapterNumber` ASC');
        $query->execute();
        $chapters = $query->fetchAll(PDO::FETCH_OBJ);
        return $chapters; 
    }
    function insertChapter($chapterNumber, $name, $description,$season_id){
        $query = $this->db->prepare('INSERT INTO chapter (chapterNumber, name, description,season_id) VALUES (?,?,?,?)');
        $query->execute([$chapterNumber, $name, $description,$season_id]);
        return $this->db->lastInsertId();
    }

    function deleteChapter($id){
        $query = $this->db->prepare('DELETE FROM chapter WHERE chapter_id = ?');
        $query->execute([$id]);
    }
    function updateChapter($chapterNumber, $name, $description, $id){
        $query = $this->db->prepare('UPDATE chapter SET chapterNumber = ?, name = ?, description = ?  WHERE chapter_id = ?');
        $query->execute([$chapterNumber, $name, $description, $id]);
        return $query; 
    }
}