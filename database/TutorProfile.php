<?php
require_once "Database.php";

class TutorProfile {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function create($tutor_id, $address, $bio, $hourly_rate, $experience_yrs, $education) {
        $sql = "INSERT INTO tutor (tutor_id, address, bio, hourly_rate, experience_yrs, education)
                VALUES (:tutor_id, :address, :bio, :hourly_rate, :experience_yrs, :education)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ":tutor_id" => $tutor_id,
            ":address" => $address,
            ":bio" => $bio,
            ":hourly_rate" => $hourly_rate,
            ":experience_yrs" => $experience_yrs,
            ":education" => $education
        ]);

         
    }

    public function getByTutorId($tutor_id) {
        $sql = "SELECT * FROM tutor WHERE tutor_id = :tutor_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":tutor_id" => $tutor_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
