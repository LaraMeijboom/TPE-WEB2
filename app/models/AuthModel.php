<?php 
require_once './app/models/Model.php';
class UserModel extends Model{
    public function getByName($name) {
        $query = $this->db->prepare('SELECT * FROM users WHERE name = ?');
        $query->execute([$name]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}

?>
