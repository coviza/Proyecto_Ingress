<?php

namespace App\Core;

//use App\Core\SessionManager;

abstract class AbstractController
{

    private $twig;
    //protected $sessionManager;
    public function __construct()
    {
        // session_start();
        //$this->sessionManager = new SessionManager();

        $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../../templates');
        $this->twig = new \Twig\Environment($loader);

        $this->twig->addGlobal("session1", $_SESSION);
        //$this->sessionManager->setTemplateEngineAvailable($this->twig);
    }

    public function render($template, $params)
    {
        $template = $this->twig->load($template);
        echo $template->render($params);
    }
}
