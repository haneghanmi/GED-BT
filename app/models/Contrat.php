<?php
class Contrat {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM contrats";
        return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO contrats (fournisseur, reference, departement, date_debut, date_fin, designation, fichier) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        return $this->db->prepare($sql)->execute($data);
    }
}
?>