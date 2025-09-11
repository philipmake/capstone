<?php
require_once "Database.php";

class Review {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function create($booking_id, $parent_id, $tutor_id, $rating, $comment) {
        $sql = "INSERT INTO reviews (booking_id, parent_id, tutor_id, rating, comment)
                VALUES (:booking_id, :parent_id, :tutor_id, :rating, :comment)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ":booking_id" => $booking_id,
            ":parent_id" => $parent_id,
            ":tutor_id" => $tutor_id,
            ":rating" => $rating,
            ":comment" => $comment
        ]);
    }

    public function getByTutorId($tutor_id) {
        $sql = "SELECT * FROM reviews WHERE tutor_id = :tutor_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":tutor_id" => $tutor_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
