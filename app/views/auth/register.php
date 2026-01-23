<?php
// app/views/auth/register.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>BT - Inscription Utilisateur</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f7f6; padding: 40px; }
        h2 { color: #004a99; text-align: center; }
        form { 
            max-width: 500px; 
            margin: 0 auto; 
            background: white; 
            padding: 30px; 
            border-radius: 8px; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.1); 
        }
        label { font-weight: bold; color: #334155; display: block; margin-bottom: 5px; }
        input, select { 
            width: 100%; 
            padding: 10px; 
            margin-bottom: 20px; 
            border: 1px solid #cbd5e1; 
            border-radius: 4px; 
            box-sizing: border-box; 
        }
        button { 
            background: #004a99; 
            color: white; 
            border: none; 
            padding: 12px; 
            width: 100%; 
            border-radius: 4px; 
            cursor: pointer; 
            font-weight: bold; 
            font-size: 16px;
        }
        button:hover { background: #003366; }
        .back-link { text-align: center; display: block; margin-top: 20px; text-decoration: none; color: #64748b; }
    </style>
</head>
<body>

    <h2>Créer un nouveau compte utilisateur</h2>
    
    <form action="../../controllers/UserController.php" method="POST">
        <label>Id / Matricule :</label>
        <input type="text" name="id" placeholder="Ex: 87654321" required>

        <label>Email (Login) :</label>
        <input type="email" name="email" placeholder="exemple@gmail.com" required>

        <label>Mot de passe :</label>
        <input type="password" name="password" required>

        <label>Confirmer le mot de passe :</label>
        <input type="password" name="confirm_password" required>

        <label>Département :</label>
        <select name="departement" required>
            <option value="Informatique">Informatique</option>
        </select>

        <label>Rôle :</label>
        <select name="role" required>
            <option value="USER">Utilisateur simple</option>
            <option value="ADMIN">Administrateur</option>
            <option value="SUPER_ADMIN">Super Administrateur</option>
        </select>

        <button type="submit" name="register">Enregistrer l'utilisateur</button>
    </form>

    <a href="../auth/login.php" class="back-link">Retour à la connexion</a>

</body>
</html>