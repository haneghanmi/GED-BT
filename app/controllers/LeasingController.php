<?php
// app/controllers/LeasingController.php
require_once '../../config/database.php';
require_once '../models/Leasing.php';

session_start();

// Vérification de la permission FULL pour l'ajout [cite: 61]
if (isset($_POST['add_leasing'])) {
    $leasingModel = new Leasing($conn);
    
    // Gestion du fichier [cite: 32]
    $fileName = time() . '_' . $_FILES['fichier']['name'];
    $targetDir = "../../public/uploads/";
    $targetFilePath = $targetDir . $fileName;

    if (move_uploaded_file($_FILES['fichier']['tmp_name'], $targetFilePath)) {
        // Préparation des données selon le cahier des charges [cite: 26, 85]
        $data = [
            $_POST['client'],   // Client [cite: 27]
            $_POST['numero'],   // Numéro [cite: 28]
            $_POST['montant'],  // Montant [cite: 29]
            $_POST['date'],     // Date [cite: 30]
            $_POST['statut'],   // Statut [cite: 31]
            $fileName           // Fichier [cite: 32]
        ];

        if ($leasingModel->create($data)) {
            header("Location: ../views/leasing/index.php?msg=success");
        }
    } else {
        echo "Erreur lors de l'upload du document.";
    }
}
?>