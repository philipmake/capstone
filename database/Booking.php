<?php
require_once "Database.php";

class Booking {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    /**
     * Create a booking.
     * Returns inserted booking id on success, false on failure.
     */
    public function create($parent_id, $tutor_id, $subject, $days, $duration, $start_date, $end_date, $status = 'pending') {
        $sql = "INSERT INTO bookings (parent_id, tutor_id, subject, days, duration, start_date, end_date, status, created_at)
                VALUES (:parent_id, :tutor_id, :subject, :days, :duration, :start_date, :end_date, :status, NOW())";
        $stmt = $this->conn->prepare($sql);
        $ok = $stmt->execute([
            ':parent_id' => $parent_id,
            ':tutor_id' => $tutor_id,
            ':subject' => $subject,
            ':days' => $days,
            ':duration' => $duration,
            ':start_date' => $start_date,
            ':end_date' => $end_date,
            ':status' => $status
        ]);

        if ($ok) {
            return $this->conn->lastInsertId();
        }
        return false;
    }

    /**
     * Get bookings by parent id (returns array)
     */
    public function getByParent($parent_id) {
        $sql = "SELECT b.*, t.user_id AS tutor_user_id, t.hourly_rate AS tutor_rate
                FROM bookings b
                LEFT JOIN tutor t ON t.tutor_id = b.tutor_id
                WHERE b.parent_id = :parent_id
                ORDER BY b.created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':parent_id' => $parent_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * (Optional) get booking by id
     */
    public function getById($id) {
        $sql = "SELECT * FROM bookings WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
