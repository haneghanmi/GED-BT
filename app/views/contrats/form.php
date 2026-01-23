
<style>
    form { 
        max-width: 600px; 
        margin: 20px auto; 
        padding: 25px; 
        background: #fdfdfd; 
        border: 1px solid #e2e8f0; 
        border-radius: 10px; 
    }
    input, textarea { 
        width: 100%; 
        padding: 12px; 
        margin-bottom: 15px; 
        border: 1px solid #ddd; 
        border-radius: 5px; 
        display: block; 
        box-sizing: border-box; 
    }
    textarea { height: 80px; }
    button { background: #059669; color: white; border: none; padding: 12px 25px; border-radius: 5px; cursor: pointer; font-weight: bold; }
</style>

<form action="../../../app/controllers/ContratController.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="fournisseur" placeholder="Nom Fournisseur" required>
    <input type="text" name="reference" placeholder="Référence">
    <input type="text" name="departement" placeholder="Département">
    <input type="date" name="date_debut">
    <input type="date" name="date_fin">
    <textarea name="designation" placeholder="Désignation"></textarea>
    <input type="file" name="fichier" accept=".pdf,image/*" required> [cite: 24]
    <button type="submit" name="add_contrat">Enregistrer le contrat</button>
</form>