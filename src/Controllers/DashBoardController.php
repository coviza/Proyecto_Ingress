<?php

namespace App\Controllers;

use App\Core\AbstractController;

/**
 * 1.Creo la clase DashBoardController que hereda de AbstractController
 * 2.Creo el metodo dashBoard() y le digo que me renderice la plantilla login ($this->render("login.html.twig",[]);)
 * Esta clase y este metodo sera el que cargue la ruta '/' en el archivo '/config/Routes'
 */
class DashBoardController extends AbstractController
{
   public function dashBoard()
   {
      $this->render("login.html.twig", []);
   }
}
