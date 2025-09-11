<?php
require_once "Database.php";

class ParentProfile {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function create($user_id, $address, $preferred_mode, $additional_info) {
        $sql = "INSERT INTO parent (user_id, address, preferred_mode, additional_info)
                VALUES (:user_id, :address, :preferred_mode, :additional_info)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ":user_id" => $user_id,
            ":address" => $address,
            ":preferred_mode" => $preferred_mode,
            ":additional_info" => $additional_info
        ]);
    }

    public function getByUserId($user_id) {
        $sql = "SELECT * FROM parent WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":user_id" => $user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
