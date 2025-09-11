<?php
require_once "Database.php";

class Booking {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function create($parent_id, $tutor_id, $subject_id, $days, $duration, $start_date, $end_date) {
        $sql = "INSERT INTO bookings (parent_id, tutor_id, subject_id, days, duration, start_date, end_date)
                VALUES (:parent_id, :tutor_id, :subject_id, :days, :duration, :start_date, :end_date)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ":parent_id" => $parent_id,
            ":tutor_id" => $tutor_id,
            ":subject_id" => $subject_id,
            ":days" => $days,
            ":duration" => $duration,
            ":start_date" => $start_date,
            ":end_date" => $end_date
        ]);
    }

    public function updateStatus($id, $status) {
        $sql = "UPDATE bookings SET status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([":status" => $status, ":id" => $id]);
    }

    public function getById($id) {
        $sql = "SELECT * FROM bookings WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":id" => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
