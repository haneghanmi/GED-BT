<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>BT - Nouveau Dossier Leasing</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f8fafc; margin: 0; padding: 0; }
        .container { padding: 40px; display: flex; justify-content: center; }
        .form-card { 
            background: white; padding: 30px; border-radius: 12px; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.05); width: 100%; max-width: 600px; 
            border: 1px solid #e2e8f0;
        }
        h2 { color: #004a99; text-align: center; margin-bottom: 30px; }
        input, select, textarea { 
            width: 100%; padding: 12px; margin-bottom: 20px; 
            border: 1px solid #e2e8f0; border-radius: 8px; box-sizing: border-box; 
        }
        .btn-submit { 
            background: #10b981; color: white; border: none; padding: 14px; 
            width: 100%; border-radius: 8px; cursor: pointer; font-weight: bold; font-size: 16px; 
        }
        .btn-submit:hover { background: #059669; }
    </style>
</head>
<body>
    <?php include '../layouts/navbar.php'; ?>

    <div class="container">
        <div class="form-card">
            <h2>Nouveau Dossier Leasing</h2>
            
            <form action="../../controllers/LeasingController.php?action=create" method="POST" enctype="multipart/form-data">
                <input type="text" name="client" placeholder="Nom du Client" required>
                <input type="text" name="numero" placeholder="Numéro de Dossier" required>
                <input type="number" step="0.01" name="montant" placeholder="Montant (DT)" required>
                
                <label style="display:block; margin-bottom:10px; color:#64748b;">Statut du dossier :</label>
                <select name="statut">
                    <option value="En attente">En attente</option>
                    <option value="Validé">Validé</option>
                    <option value="Refusé">Refusé</option>
                </select>

                <label style="display:block; margin-bottom:10px; color:#64748b;">Document (PDF/Image) :</label>
                <input type="file" name="fichier" required>

                <button type="submit" class="btn-submit">Enregistrer le dossier</button>
            </form>
            
            <a href="index.php" style="display:block; text-align:center; margin-top:20px; color:#64748b; text-decoration:none;">Annuler</a>
        </div>
    </div>

    <?php include '../layouts/footer.php'; ?>
</body>
</html>