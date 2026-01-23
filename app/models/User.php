<?php
// app/models/User.php
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function login($email, $password) {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Vérification simple (en production, utilisez password_verify)
        if ($user && $password == $user['password']) {
            return $user;
        }
        return false;
    }
}
?>