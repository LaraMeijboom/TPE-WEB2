<?php require_once './database/config.php';
class ChapterModel {
    protected $db;
    function __construct(){
      $this->db = new PDO("mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
      
    }
    function getChapterOfSeason($season_id_fk){
        $query = $this->db->prepare('SELECT * FROM chapters WHERE season_id_fk = ?');
        $query->execute([$season_id_fk]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    function getChapters(){
        $query = $this->db->prepare('SELECT * FROM chapters');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function addChapter($name, $description, $season_id_fk){
        $query = $this->db->prepare('INSERT INTO chapters (`chapter_id`,`name`,`description`,`season_id_fk`) VALUES (NULL,?,?,?)');
        $query->execute([$name, $description, $season_id_fk]); 
        return $this->db->lastInsertId();
    }

    function deleteChapter($chapter_id){
        $query = $this->db->prepare('DELETE FROM chapters WHERE chapter_id= ?');
        $query->execute([$chapter_id]);
    }

    function updateChapter($name, $description, $season_id_fk, $chapter_id) {
        $query = $this->db->prepare('UPDATE chapters SET name = ?,  description = ?, season_id_fk  = ? WHERE chapter_id = ?');
        $query->execute([$name, $description, $season_id_fk, $chapter_id]);
        return $query;
    }
}
?>
