<?php
require_once '../../config/database.php';
require_once '../models/Contrat.php';

$contratModel = new Contrat($conn);

if (isset($_POST['add_contrat'])) {
    $nomFichier = $_FILES['fichier']['name'];
    $destination = "../../public/uploads/" . $nomFichier;

    // Déplacement du fichier uploadé 
    if (move_uploaded_file($_FILES['fichier']['tmp_name'], $destination)) {
        $data = [
            $_POST['fournisseur'], $_POST['reference'], $_POST['departement'],
            $_POST['date_debut'], $_POST['date_fin'], $_POST['designation'], $nomFichier
        ];
        $contratModel->create($data);
        header("Location: ../views/contrats/index.php?success=1");
    }
}
?>