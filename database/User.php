<?php
require_once "Database.php";

class User {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function signup($role, $fullname, $email, $phone, $alt_phone, $password) {
        // checks if email already exists
        $stmt = $this->conn->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->execute([':email' =>$email]);

        if ($stmt->fetch()) {
            die("Email already exists.");
        } else {
            $sql = "INSERT INTO users (role, fullname, email, phone, alt_phone, password) 
                    VALUES (:role, :fullname, :email, :phone, :alt_phone, :password)";
            $stmt = $this->conn->prepare($sql);

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            return $stmt->execute([
                ":role" => $role,
                ":fullname" => $fullname,
                ":email" => $email,
                ":phone" => $phone,
                ":alt_phone" => $alt_phone,
                ":password" => $hashedPassword
            ]);
        }
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":email" => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user["password"])) {
            return $user; // return full user record
        }
        return false;
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":id" => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProfilePicture($id, $profile_picture) {
        $sql = "UPDATE users SET profile_picture = :profile_picture WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([":profile_picture" => $profile_picture, ":id" => $id]);
    }
}
