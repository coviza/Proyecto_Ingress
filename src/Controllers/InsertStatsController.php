<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Stats;
use App\Entity\Uploads;
use App\Entity\Span;
use App\Entity\Agents;
use Doctrine\ORM\Mapping\Entity;


/**
 * 1. Creamos la clase InsertStatsController que hereda de AbstractController
 * 2. Creamos el metodo insertStats() y creo una nueva instancia del objeto EntityManager
 * 3. Accedo a los repositorios de las Entidades Stats, Agents, Uploads y Span
 * 4. Busco el idAgent a traves del repositorio de la Entidad Agents 
 * 5. Accedo al texto que introduzco por formulario a traves del metodo 'formatData' creado en la Entidad Agents
 * 6. Envio al repositorio Span el timeSpan concreto que se encuentra en la posicion '0' del array '$data[0]'
 * 7. Envio al repositorio de Uploads los datos con el date, time, idAgent y timeSpan 
 * 8. Envio al repositorio de Stats la id de upload, id de agente y las estadisticas
 * 9. Una vez subo las estadisticas, renderizo la plantilla stats y muestro el idAgent + agentName en la template con Twig 
 *    a traves de la variable de sesion y tambien de la variable del repositorio de Agente.
 */
//
class InsertStatsController extends AbstractController   //paso1
{
    public function insertStats() {
        $entityManager = (new EntityManager())->get(); //paso2
        $statsRepository = $entityManager->getRepository(Stats::class); //paso3
        $agentsRepository = $entityManager->getRepository(Agents::class); 
        $uploadsRepository = $entityManager->getRepository(Uploads::class);
        $spanRepository = $entityManager->getRepository(Span::class);
        $idAgent = $agentsRepository->find($_SESSION['idAgent']); //paso 4
        $data = $idAgent->formatData($_POST); //paso5
        $span = $spanRepository->findOneBy(['timeSpan' => $data[0]]); //paso6
        $uploads = $uploadsRepository->insertUploads($data, $idAgent, $span); //paso7
        $stats = $statsRepository->insertStats($uploads, $idAgent, $data); //paso8
        // header('location:/');
       
        $this->render("stats.html.twig",[ //paso9
            "resultados" => $idAgent->getStats()[0],
            "session" => $_SESSION["agent_name"]
        ]);
    }
    
}
    

