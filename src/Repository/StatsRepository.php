<?php
/**
 * Clase que extiende del EntityRepository donde podemos personalizar los métodos
 * que creamos necesitar añadiendo a los ya definidos por defecto.
 */
namespace App\Repository;

use App\Entity\Stats;
use App\Core\EntityManager;
use Doctrine\ORM\EntityRepository;

class StatsRepository extends EntityRepository{
   
    /**
     * 1.Creo new Instance Stats
     * 2.llamo a los seters para setear la nueva info
     * 3.Persisto y hago flush() para introducir en la bbd los nuevos registros seteados 
     */
    public function insertStats($upload, $idAgent, $datos) {
        $stats = new Stats();
        $stats->setIdUpload($upload);
        $stats->setIdAgent($idAgent);
        $stats->setLevel($datos[0][5]);
        $stats->setLifetimeAp($datos[0][6]);
        $stats->setCurrentAp($datos[0][7]);
        $this->getEntityManager()->persist($stats);
        $this->getEntityManager()->flush();

        return $stats;
    }

}