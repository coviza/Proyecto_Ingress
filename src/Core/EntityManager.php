<?php
/**
 * Clase que instancia el EntityManager para poder conectarnos entre Doctrine
 * y la BB.DD. de MySQL
 */
namespace App\Core;

use Doctrine\ORM\Tools\Setup;

class EntityManager{
     
    private $em;
    private $dbConfig;

    public function __construct(){

        $this->dbConfig= json_decode(file_get_contents(__DIR__ . "/../../config/dbConfig.json"), true);

        $paths = array(__DIR__.'/../Entity');
        //Para poder definir si estamos o no en modo de Desarrollo
        $isDevMode = true;
        $dbParams = array(
            'host' => $this->dbConfig["server"],
            'driver' => $this->dbConfig["driver"],
            'user' => $this->dbConfig["user"],
            'password' => $this->dbConfig["password"],
            'dbname' => $this->dbConfig["dbname"],
        );

        //Creamos la configuración de donde y como
        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
        //Creamos el EntityManager con la configuración anterior y los parámetros de conexión
        $this->em = \Doctrine\ORM\EntityManager::create($dbParams,$config);
    }

    /**
     * Creamos un geter para poder obtener el EntityManager a utilizar
     */
    public function get(){
        return $this->em;
    }
}