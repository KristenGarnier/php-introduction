<?php
/**
 * Created by PhpStorm.
 * User: kristengarnier
 * Date: 2019-03-19
 * Time: 10:27
 */
namespace Model\Gateway;

use App\Src\App;

class CityGateway
{
    /**
     * @var \PDO
     */
    private $conn;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $life;

    /**
     * CityGateway constructor.
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->conn = $app->getService('database')->getConnection();
    }

    /**
     * Get id of the city
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get name of the city
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name of the city
     *
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Get country of the city
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set country of the city
     *
     * @param string $country
     */
    public function setCountry($country): void
    {
        $this->country = $country;
    }

    /**
     * Get life of the city
     *
     * @return string
     */
    public function getLife()
    {
        return $this->life;
    }

    /**
     * Set life of the city
     *
     * @param string $life
     */
    public function setLife($life): void
    {
        $this->life = $life;
    }

    /**
     * Insert CityGateway in the database table
     *
     * @throws \Error;
     */
    public function insert() : void {
        $query = $this->conn->prepare('INSERT INTO city (name, country, life) VALUES (:name, :country, :life)'); // Création de la requête + utilisation order by pour ne pas utiliser sort
        $executed = $query->execute([
            ':name' => $this->name,
            ':country'=> $this->country,
            ':life' => $this->life
        ]);

        if(!$executed) throw new \Error('Insert Failed');

        $this->id = $this->conn->lastInsertId();
    }

    /**
     * Update CityGateway  in the database
     *
     * @throws \Error;
     */
    public function update() : void {
        if(!$this->id) throw new \Error('Instance does not exist in base');

        $query = $this->conn->prepare('UPDATE city SET name = :name, country = :country, life = :life WHERE id = :id'); // Création de la requête + utilisation order by pour ne pas utiliser sort
        $executed = $query->execute([
            ':name' => $this->name,
            ':country'=> $this->country,
            ':life' => $this->life,
            ':id' => $this->id
        ]);

        if(!$executed) throw new \Error('Update Failed');
    }

    /**
     * Delete CityGateway instance in the database
     *
     * @throws \Error;
     */
    public function delete() : void {
        if(!$this->id) throw new \Error('Instance does not exist in base');

        $query = $this->conn->prepare('DELETE FROM city WHERE id = :id'); // Création de la requête + utilisation order by pour ne pas utiliser sort
        $executed = $query->execute([
            ':id' => $this->id
        ]);

        if(!$executed) throw new \Error('Delete Failed');
    }

    /**
     * Hydrate the object from values in the database
     *
     * @param array $elem Associative array containing the data information
     */
    public function hydrate(Array $elem) {
        $this->id = $elem['id'];
        $this->name = $elem['name'];
        $this->country = $elem['country'];
        $this->life = $elem['life'];
    }
}