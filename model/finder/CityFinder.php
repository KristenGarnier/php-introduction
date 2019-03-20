<?php
/**
 * Created by PhpStorm.
 * User: kristengarnier
 * Date: 2019-03-19
 * Time: 10:18
 */
namespace Model\Finder;

use Model\Finder\FinderInterface;
use Model\Gateway\CityGateway;
use App\Src\App;

class CityFinder implements FinderInterface
{
    /**
     * @var \PDO
     */
    private $conn;
    private $app;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->conn = $app->getService('database')->getConnection();
    }

    /**
     * Fetch all cities form the database
     *
     * @return array|null
     */
    public function findAll()
    {
        $query = $this->conn->prepare('SELECT c.id, c.name, c.country, c.life FROM city c ORDER BY c.name'); // Création de la requête + utilisation order by pour ne pas utiliser sort
        $query->execute(); // Exécution de la requête
        $elements = $query->fetchAll(\PDO::FETCH_ASSOC);
        if (count($elements) === 0) return null;

        $cities = [];
        foreach ($elements as $item) {
            $city = new CityGateway($this->app);
            $city->hydrate($item);
            $cities[] = $city;
        }

        return $cities;
    }

    /**
     * Fetch one city by id from the database
     *
     * @param int $id id of the city to fetch
     * @return CityGateway|null
     */
    public function findOneById(int $id)
    {
        $query = $this->conn->prepare('SELECT c.id, c.name, c.country, c.life FROM city c WHERE c.id = :id'); // Création de la requête + utilisation order by pour ne pas utiliser sort
        $query->execute([':id' => $id]); // Exécution de la requête
        $element = $query->fetch(\PDO::FETCH_ASSOC);
        if ($element === null) return null;

        $city = new CityGateway($this->app);
        $city->hydrate($element);

        return $city;
    }
}