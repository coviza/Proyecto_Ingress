<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Events;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\Common\Util\Debug;

class ParticipantesController extends AbstractController  { 

    /**
     * 1.Creo instancia del EntityManager y accedo al repositorio de la tabla Events
     * 2.Busco la id del agente 
     * 3.Renderizo la template y accedo a los datos de la entidad statsEvents a traves del getter de 
     * la relacion que existe entre Events y StatsEvents
     */
    public function mostrarParticipantes($id) {
        $entityManager = (new EntityManager())->get();             //paso 1      
        $eventsRepository = $entityManager->getRepository(Events::class);   //paso 1
        $events = $eventsRepository->find($id);  //paso 2
        /* echo $id; 
        echo '<pre>';
        Debug::dump($events->getStatsEvents()[0]->getAgent()->getIdAgent());
        die(); */
        $this->render("participantes.html.twig",[               //paso 3                 
            "resultados" => $events->getStatsEvents()
        ]);
    }
    
}