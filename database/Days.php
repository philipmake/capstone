<?php
require_once "Database.php";

class Days {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // Create availability
    public function create($tutor_id, $day, $start_time, $end_time) {
        $sql = "INSERT INTO availability (tutor_id, day, start_time, end_time)
                VALUES (:tutor_id, :day, :start_time, :end_time)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ":tutor_id" => $tutor_id,
            ":day" => $day,
            ":start_time" => $start_time,
            ":end_time" => $end_time
        ]);

        return $this->conn->lastInsertId();
    }

    // Read availability by tutor
    public function getByTutorId($tutor_id) {
        $sql = "SELECT * FROM availability WHERE tutor_id = :tutor_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":tutor_id" => $tutor_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update availability entry
    public function update($id, $day, $start_time, $end_time) {
        $sql = "UPDATE availability SET day = :day, start_time = :start_time, end_time = :end_time
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ":id" => $id,
            ":day" => $day,
            ":start_time" => $start_time,
            ":end_time" => $end_time
        ]);
    }

    // Delete availability entry
    public function delete($tutor_id, $day_id) {
        $sql = "DELETE FROM availability WHERE tutor_id = :tutor_id AND id = :day_id";
        // $sql = "DELETE FROM availability WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([":tutor_id" => $tutor_id, ":day_id" => $day_id]);
    }
}
