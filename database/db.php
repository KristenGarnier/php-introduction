<?php

class Database { // Création d'une classe permettant d'initaliser une connexion avec la base de donnée

    private $dbh; // Mise en place de la propriété qui contiendra notre connexion

    public function __construct() {
        $host = '127.0.0.1'; // Addresse de la base de données
        $name = 'citytowns'; // Nom de la base de donnée
        $user = 'root'; // Utilisateur de la base de données
        $pass = 'root'; // Mot de passe de la base de données
        $port = '8889';
        $this->dbh = new PDO("mysql:host=$host;port=$port;dbname=$name", $user, $pass); // Création de la connexion
    }

    public function getConnection() { // Récupération de la connexion pour l'utiliser ailleurs
        return $this->dbh;
    }
}