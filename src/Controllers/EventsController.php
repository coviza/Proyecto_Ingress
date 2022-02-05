<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Events;
use Doctrine\ORM\Mapping\Entity;

class EventsController extends AbstractController  { 

    /**
     * 1.Creo instancia del EntityManager y accedo al repositorio de la tabla Events
     * 2.Accedo al repositorio de Eventos
     * 3.Accedo a todos los registros de la tabla Events
     * 4.Renderizo la plantilla y creo la variable resultados con todos los registros de Events
     */
    public function mostrarEventos() {
        $entityManager = (new EntityManager())->get();                     //paso1
        $eventsRepository = $entityManager->getRepository(Events::class);  //paso2
        $events = $eventsRepository->findAll();                            //paso3
        // var_dump($agent);
        $this->render("eventos.html.twig",[                                //paso4
            "resultados" => $events 
        ]);
    }
    
}