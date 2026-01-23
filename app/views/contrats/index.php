<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

require_once '../../../config/database.php';
require_once '../../../app/models/Contrat.php';

$database = new config();
$db = $database->getConnexion();
$model = new Contrat($db);
$contrats = $model->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des Contrats - BT</title>
    <style>
        body { font-family: sans-serif; margin: 0; padding: 0; background: #fff; color: #334155; }
        .container { padding: 30px; }
        h2 { color: #004a99; font-size: 24px; margin-bottom: 20px; border-left: 5px solid #c5a059; padding-left: 15px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 15px; }
        th { background: #f1f5f9; color: #475569; padding: 15px; text-align: left; border-bottom: 2px solid #e2e8f0; }
        td { padding: 12px 15px; border-bottom: 1px solid #f1f5f9; }
        tr:hover { background: #f8fafc; }
        .btn-add { 
            background: #004a99; color: white; padding: 10px 20px; 
            border-radius: 6px; text-decoration: none; display: inline-block; margin-bottom: 20px; 
        }
    </style>
</head>
<body>
    <?php include '../layouts/navbar.php'; ?>

    <div class="container">
       <h2>Gestion des Contrats fournisseurs</h2> 
        <a href="form.php" class="btn-add">➕ Ajouter un contrat</a>
        <table border="1">
            <tr>
                <th>Fournisseur</th><th>Référence</th><th>Fin de contrat</th><th>Fichier</th>
            </tr>
            <?php foreach ($contrats as $c): ?>
            <tr>
                <td><?= htmlspecialchars($c['fournisseur']) ?></td>
                <td><?= htmlspecialchars($c['reference']) ?></td>
                <td><?= htmlspecialchars($c['date_fin']) ?></td>
                <td><a href="../../../public/uploads/<?= htmlspecialchars($c['fichier']) ?>" target="_blank" style="color:#004a99;">📄 Voir</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <?php include '../layouts/footer.php'; ?>
</body>
</html>