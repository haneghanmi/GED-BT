<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Banque de Tunisie</title>
    
    <style>
    body { 
        font-family: 'Segoe UI', Arial, sans-serif; 
        display: flex; 
        justify-content: center; 
        align-items: center; 
        height: 100vh; 
        background: linear-gradient(135deg, #004a99 0%, #002d5f 100%); 
        margin: 0;
    }
    .login-box { 
        background: white; 
        padding: 40px; 
        border-radius: 12px; 
        box-shadow: 0 15px 35px rgba(0,0,0,0.2); 
        width: 380px; 
    }
    h2 { color: #004a99; text-align: center; font-size: 28px; margin-bottom: 25px; border-bottom: 2px solid #f4f4f4; padding-bottom: 10px; }
    label { font-weight: 600; color: #555; display: block; margin-bottom: 5px; }
    input { 
        width: 100% !important; 
        padding: 12px !important; 
        margin-bottom: 20px !important; 
        border: 1px solid #ddd !important; 
        border-radius: 6px !important; 
        box-sizing: border-box; 
    }
    .btn-bt { 
        background: #004a99; 
        color: white; 
        border: none; 
        padding: 14px; 
        width: 100%; 
        border-radius: 6px; 
        cursor: pointer; 
        font-size: 16px; 
        font-weight: bold; 
        transition: background 0.3s; 
    }
    .btn-bt:hover { background: #00356d; }
    .error { background: #fee2e2; color: #dc2626; padding: 10px; border-radius: 4px; text-align: center; font-size: 14px; }
</style>
</head>
<body>

    <div class="login-box">
        <h2 style="color: #004a99; text-align: center;">GED - BT</h2>
        
        <?php if(isset($_GET['error'])): ?>
            <p class="error">Email ou mot de passe incorrect.</p>
        <?php endif; ?>

        <form action="../../controllers/AuthController.php" method="POST">
            <label>Email (Login)</label><br>
            <input type="email" name="email" style="width: 100%; margin-bottom: 15px;" required><br>
            
            <label>Mot de passe</label><br>
            <input type="password" name="password" style="width: 100%; margin-bottom: 20px;" required><br>
            
            <button type="submit" name="login" class="btn-bt">Se connecter</button>
        </form>
    </div>
</body>
</html>