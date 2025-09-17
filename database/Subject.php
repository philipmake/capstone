<?php
require_once "Database.php";

class Subject {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // Add a subject to a tutor
    public function addSubject($tutor_id, $subject_id) {
        $sql = "INSERT IGNORE INTO tutor_subjects (tutor_id, subject_id)
                VALUES (:tutor_id, :subject_id)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ":tutor_id" => $tutor_id,
            ":subject_id" => $subject_id
        ]);
    }

    // Get all subjects
    public function getAllSubjects() {
        $sql = "SELECT * FROM subjects";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get all subjects for a tutor
    public function getSubjectsByTutor($tutor_id) {
        $sql = "SELECT s.id, s.name
                FROM tutor_subjects ts
                JOIN subjects s ON ts.subject_id = s.id
                WHERE ts.tutor_id = :tutor_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":tutor_id" => $tutor_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Remove a subject from a tutor
    public function removeSubject($tutor_id, $subject_id) {
        $sql = "DELETE FROM tutor_subjects WHERE tutor_id = :tutor_id AND subject_id = :subject_id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ":tutor_id" => $tutor_id,
            ":subject_id" => $subject_id
        ]);
    }
}
