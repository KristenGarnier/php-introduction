<?php

class CityModel {
    private $conn; // Tiens la connexion à la base de donnée;

    public function __construct($db) {
        $this->conn = $db->getConnection();
    }

    public function getAll() {
        $query = $this->conn->prepare('SELECT c.name, c.country, c.life FROM city c ORDER BY c.name'); // Création de la requête + utilisation order by pour ne pas utiliser sort
        $query->execute(); // Exécution de la requête
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function searchByName($searchString) {
        $query = $this->conn->prepare('SELECT c.name, c.country, c.life FROM city c WHERE c.name like :search ORDER BY c.name'); // Création de la requête + utilisation order by pour ne pas utiliser sort
        $query->execute([':search' => '%' . $searchString .  '%']); // Exécution de la requête
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function save() {
        $query = $this->conn->prepare('INSERT INTO city (name, country, life) VALUES (:name, :country, :life)'); // Création de la requête + utilisation order by pour ne pas utiliser sort
        return $query->execute([
            ':name' => $city['name'],
            ':country'=> $city['country'],
            ':life' => $city['life']
        ]);
    }
}