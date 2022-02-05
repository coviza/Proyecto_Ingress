<?php
/**
 * Clase que extiende del EntityRepository donde podemos personalizar los métodos
 * que creamos necesitar añadiendo a los ya definidos por defecto.
 */
namespace App\Repository;

use App\Entity\Uploads;
use App\Core\EntityManager;
use Doctrine\ORM\EntityRepository;

class UploadsRepository extends EntityRepository{
     /**
      * Creo la funcion 'insertUploads' a la cual le paso 4 parametros.
      * Creo una nueva instancia de la Entidad 'Uploads'
      * Llamo a los setters correspondientes a cada campo y relacion de la Entidad Uploads 
      * Obtengo el EntityManager y lo persisto con el metodo persist() 
      * Por ultimo hago flush() para meter el registro en la bbdd
      */
     public function insertUploads($data, $idAgent, $span, $idevent = 0) {
         $uploads = new Uploads();
         $uploads->setDate(new \DateTime($data[0][3]));
         $uploads->setTime(new \DateTime($data[0][4]));
         $uploads->setAgent($idAgent);
         $uploads->setSpan($span);
         $uploads->setIdEvent($idevent);
         $this->getEntityManager()->persist($uploads); //obtengo el EntityManager y llamo su metodo persist 
         $this->getEntityManager()->flush(); //meto registro en la bbdd
         return $uploads;
     }
}