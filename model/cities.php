<?php

// City model permet de requêter la table city de manière simple
class CityModel {
    private $conn; // Tiens la connexion à la base de donnée;

    public function __construct($db) { // On fait passer la base de donnée à l'initialisation
        $this->conn = $db->getConnection();  // On récupère la connexion et enregistre dans une propriété de la classe
    }

    public function getAll() { // Méthode récupérant toutes les villes
        $query = $this->conn->prepare('SELECT c.name, c.country, c.life FROM city c ORDER BY c.name'); // Création de la requête + utilisation order by pour ne pas utiliser sort
        $query->execute(); // Exécution de la requête
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function searchByName($searchString) { // Méthodes récupérant toutes les recherches
        $query = $this->conn->prepare('SELECT c.name, c.country, c.life FROM city c WHERE c.name like :search ORDER BY c.name'); // Création de la requête + utilisation order by pour ne pas utiliser sort
        $query->execute([':search' => '%' . $searchString .  '%']); // Exécution de la requête
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function save($city) { // méthode d'enregistrement d'une nouvelle ville
        $query = $this->conn->prepare('INSERT INTO city (name, country, life) VALUES (:name, :country, :life)'); // Création de la requête + utilisation order by pour ne pas utiliser sort
        return $query->execute([
            ':name' => $city['name'],
            ':country'=> $city['country'],
            ':life' => $city['life']
        ]);
    }
}