<?php require_once './database/config.php';
class UserModel {
    protected $db;
    function __construct(){
      $this->db = new PDO("mysql:host=".MYSQL_HOST .";dbname=".MYSQL_DB.";charset=utf8", MYSQL_USER, MYSQL_PASS);
      
    }
    public function getByName($name) {
        $query = $this->db->prepare('SELECT * FROM users WHERE name = ?');
        $query->execute([$name]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}

?>
