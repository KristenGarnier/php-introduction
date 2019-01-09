<?php

class Database {

    private $dbh;

    public function __construct() {
        $host = '127.0.0.1'; // Addresse de la base de données
        $name = 'citytowns'; // Nom de la base de donnée
        $user = 'root'; // Utilisateur de la base de données
        $pass = 'root'; // Mot de passe de la base de données
        $port = '8889';
        $this->dbh = new PDO("mysql:host=$host;port=$port;dbname=$name", $user, $pass);
    }

    public function getConnection() {
        return $this->dbh;
    }
}