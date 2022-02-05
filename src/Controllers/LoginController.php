<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Agents;
use Doctrine\ORM\Mapping\Entity;
use App\Repository\AgentsRepository;
use Doctrine\Common\Util\Debug;



//Creo la clase LoginController y heredo de la clase AbstractController  
class LoginController extends AbstractController
{
   /**
    * 1.Si existe $_POST le asigno el name y el password introducidos por formulario, y si no vengo del formulario
    *    es porque existe una sesion previa 
    * 2.Creamos una instancia del EntityManager para acceder a la bbdd y accedemos al repositorio de la Entidad Agents
    * 3.Utilizo el metodo nativo findOneBy() para buscar el registro por uno o mas 
    *   criterios ( en este caso los criterios son el username y el password) y validar que he logeado.
    * 4.Si no existe $_SESSION, creo la sesion con los valores que habria introducido previamente al loguearme 
    * 5.Renderizo la plantilla stats.html.twig y le paso como variable "resultados" que mostrara el indice '0' del array de
    *   la relacion de la tabla Stats con Agents
    */
   public function loginAttempt() { 
                                       //paso 1
      if(isset($_POST['agent_name'])) { //Si existe $_POST le asigno el name y el password introducidos por formulario
         $username = $_POST['agent_name']; 
         $password = $_POST['password']; 
      }else{ //Si no vengo del formulario es pq existe una sesion previa 
         $username = $_SESSION['agent_name'];
         $password = $_SESSION['password'];
      }

      $entityManager = (new EntityManager())->get(); //paso 2
      $agentRepository = $entityManager->getRepository(Agents::class); //paso 2
      $agent = $agentRepository->findOneBy(['agentName' => $username,'password' => $password ]); //paso 3
      if(!$_SESSION['agent_name']) { //Si no existe la session, creo la session   //paso 4
         $_SESSION['idAgent'] = $agent->getIdAgent();
         $_SESSION['agent_name'] = $agent->getAgentName();
         $_SESSION['password'] = $password;
      }

      // var_dump($_SESSION);
      $this->render('stats.html.twig', [ //paso 5
      "resultados" => $agent->getStats()[0],
      "session" => $_SESSION["agent_name"]
      ]);
   }
}

?>
