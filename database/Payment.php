<?php
require_once "Database.php";

class Payment {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function create($booking_id, $amount, $method) {
        $sql = "INSERT INTO payments (booking_id, amount, method)
                VALUES (:booking_id, :amount, :method)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ":booking_id" => $booking_id,
            ":amount" => $amount,
            ":method" => $method
        ]);
    }

    public function updateStatus($id, $status) {
        $sql = "UPDATE payments SET status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([":status" => $status, ":id" => $id]);
    }

    public function getByBookingId($booking_id) {
        $sql = "SELECT * FROM payments WHERE booking_id = :booking_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":booking_id" => $booking_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
