<?php
class Leasing {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function getAll() {
        $query = "SELECT * FROM leasing";
        return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO leasing (client, numero, montant, date, statut, fichier) VALUES (?, ?, ?, ?, ?, ?)";
        return $this->db->prepare($sql)->execute($data);
    }
}
?>