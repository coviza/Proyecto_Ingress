<?php
/**
 * Clase que extiende del EntityRepository donde podemos personalizar los métodos
 * que creamos necesitar añadiendo a los ya definidos por defecto.
 */
namespace App\Repository;

use App\Entity\Agents;
use App\Core\EntityManager;
use Doctrine\ORM\EntityRepository;

class AgentsRepository extends EntityRepository{
    
}