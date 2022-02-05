<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Agents;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\AgentsRepository;

class AgentInsertController extends AbstractController
{
    /**
     * 1. Creo instancia del entityManager
     * 2. Creo instancia de la clase Agents
     * 3. Seteo las nuevas caracteristicas del nuevo Agente
     * 4. Persisto el nuevo objeto creado ($register) y lo transformo en un nuevo registro de la bbdd haciendo flush()
     * 5. Redirigo a la ruta '/' con el metodo header()
     */
    public function insertAgents()
    {
        $entityManager = (new EntityManager())->get();
        $register = new Agents();
        $register->setAgentName($_POST['agent_name']);
        $register->setPassword($_POST['password']);
        $register->setFaction($_POST['faction']);
        $entityManager->persist($register);
        $entityManager->flush();
        header('location:/'); 

        /* $this->render("insert.html.twig", [

        ]); */
    }
        
}
