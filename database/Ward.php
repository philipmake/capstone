<?php
require_once "Database.php";

class Ward {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function create($parent_id, $name, $age, $gender, $school_level, $subject, $learning_needs, $goals, $preferred_schedule) {
        $sql = "INSERT INTO ward (
                    parent_id, name, age, gender, school_level,
                    subject, learning_needs, goals, preferred_schedule
                ) VALUES (
                    :parent_id, :name, :age, :gender, :school_level,
                    :subject, :learning_needs, :goals, :preferred_schedule
                )";

        $stmt = $this->conn->prepare($sql);
        
        return $stmt->execute([
            ':parent_id' => $parent_id,
            ':name' => $name,
            ':age' => $age,
            ':gender' => $gender,
            ':school_level' => $school_level,
            ':subject' => $subject,
            ':learning_needs' => $learning_needs,
            ':goals' => $goals,
            ':preferred_schedule' => $preferred_schedule
        ]);

    }

    public function getByParentId($parent_id) {
        $sql = "SELECT * FROM ward WHERE parent_id = :parent_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':parent_id' => $parent_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
