<?php
// app/controllers/AuthController.php

// 1. Gestion de la session pour éviter l'erreur "already active"
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Inclusion de la base de données avec chemin sécurisé
require_once __DIR__ . '/../../config/database.php';

$database = new config();
$db = $database->getConnexion();

// --- LOGIQUE DE DÉCONNEXION ---
// Cette partie règle le problème de la page blanche
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_unset();
    session_destroy();
    
    // Redirection vers la page de login après déconnexion
    header("Location: ../views/home/index.php");
    exit();
}

// --- LOGIQUE DE CONNEXION ---
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password']; // Mot de passe saisi (ex: eya123)

    try {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // 3. Comparaison directe (SANS CRYPTAGE) 
            // On compare le mot de passe saisi avec celui stocké en base
            if ($password === $user['password']) {
                
                // Initialisation des sessions pour l'utilisateur
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['departement'] = $user['departement'];

                // Redirection vers la page de sélection des modules
                header("Location: ../views/dashboard/select-module.php");
                exit();
            } else {
                // Mot de passe incorrect
                header("Location: ../views/auth/login.php?error=1");
                exit();
            }
        } else {
            // Utilisateur non trouvé
            header("Location: ../views/auth/login.php?error=1");
            exit();
        }
    } catch (PDOException $e) {
        die("Erreur de base de données : " . $e->getMessage());
    }
}
?>