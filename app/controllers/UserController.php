<?php
// app/controllers/UserController.php
require_once __DIR__ . '/../../config/database.php';

if (isset($_POST['register'])) {
    // 1. Récupération des données du formulaire
    $id = $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Récupéré en texte clair
    $confirm = $_POST['confirm_password'];
    $role = $_POST['role'];
    $dept = $_POST['departement']; // Récupère "Informatique" de la liste déroulante

    // 2. Vérification de sécurité simple
    if ($password !== $confirm) {
        die("❌ Les mots de passe ne correspondent pas");
    }

    // 3. Connexion à la base de données
    $database = new config();
    $db = $database->getConnexion();

    // 4. Requête SQL (Notez qu'on insère $password directement sans hachage)
    $sql = "INSERT INTO users (id, email, password, role, departement, created_at)
            VALUES (?, ?, ?, ?, ?, NOW())";

    try {
        $stmt = $db->prepare($sql);
        
        // 5. Exécution de la requête
        if ($stmt->execute([$id, $email, $password, $role, $dept])) {
            // Redirection vers la page de login pour éviter la page blanche
            header("Location: ../views/auth/login.php?success=1");
            exit(); 
        }
    } catch (PDOException $e) {
        // Gestion de l'erreur si l'ID existe déjà (Duplicate entry)
        if ($e->getCode() == 23000) {
            die("❌ Erreur : L'ID ou l'Email existe déjà dans la base.");
        }
        die("❌ Erreur SQL : " . $e->getMessage());
    }
}
?>