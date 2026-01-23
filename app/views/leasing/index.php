<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

require_once '../../../config/database.php';
require_once '../../../app/models/Leasing.php';

$database = new config();
$db = $database->getConnexion();
$model = new Leasing($db);
$dossiers = $model->getAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>BT - Gestion Leasing</title>
    <style>
        body { font-family: sans-serif; margin: 0; padding: 0; background: #fff; color: #334155; }
        .container { padding: 30px; }
        h2 { color: #004a99; font-size: 24px; margin-bottom: 20px; border-left: 5px solid #c5a059; padding-left: 15px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 15px; }
        th { background: #f1f5f9; color: #475569; padding: 15px; text-align: left; border-bottom: 2px solid #e2e8f0; }
        td { padding: 12px 15px; border-bottom: 1px solid #f1f5f9; }
    </style>
</head>
<body>
    <?php include '../layouts/navbar.php'; ?>

    <div class="container">
        <h2>Gestion des dossiers Leasing</h2> 
        <a href="form.php" style="background: #004a99; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none; display: inline-block;">
        ➕ Ajouter un dossier Leasing
    </a>
    
        <table border="1">
            <tr>
                <th>Client</th><th>Numéro</th><th>Montant</th><th>Statut</th><th>Document</th>
            </tr>
            <?php foreach ($dossiers as $l): ?>
            <tr>
                <td><?= htmlspecialchars($l['client']) ?></td>
                <td><?= htmlspecialchars($l['numero']) ?></td>
                <td><?= htmlspecialchars($l['montant']) ?> DT</td>
                <td><?= htmlspecialchars($l['statut']) ?></td>
                <td><a href="../../../public/uploads/<?= htmlspecialchars($l['fichier']) ?>" target="_blank" style="color:#004a99;">📄 Ouvrir</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <div style="margin-bottom: 20px;">
    
</div>
    </div>

    <?php include '../layouts/footer.php'; ?>
</body>
</html>