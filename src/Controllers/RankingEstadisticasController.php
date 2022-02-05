<?php

namespace App\Controllers;

use App\Core\AbstractController;
use App\Core\EntityManager;
use App\Entity\Stats; //Uso la Entidad Stats para acceder a las estadisticas a traves del repositorio y con un findBy
use Doctrine\ORM\Mapping\Entity;

class RankingEstadisticasController extends AbstractController  { 

    /**
     * 1.Creo instancia del EntityManager y accedo al repositorio de la tabla Stats
     * 2.Busco con el metodo FindBy creando un array vacio y le paso por parametro un array asociativo con el campo de la tabla Stats 'level' 
     * con el criterio de orden Descendente y otro campo 'lifetimeAp' con el criterio de orden Ascendente
     * 3.Renderizo la template ranking.html.twig y le paso como parametro la variable $stats con el criterio de busqueda 
     */
    public function Ranking() {
        $entityManager = (new EntityManager())->get();                   //paso1
        $statsRepository = $entityManager->getRepository(Stats::class);  //paso1
        $stats = $statsRepository->findBy(array(), array('level' => 'DESC', 'lifetimeAp' => 'ASC')); //paso2
        // var_dump($agent);
        $this->render("ranking.html.twig",[                                //paso3
            "resultados" => $stats 
        ]);
    }
    
}