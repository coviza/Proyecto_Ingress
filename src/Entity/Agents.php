<?php

/**
 * Enlazo el repositorio y apunto al Mapping mediante los use.
 */
namespace App\Entity;
use App\Repository\AgentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Las anotaciones son metainformacion que php es capaz de leer e interpretar y sirven para modelar. 
 * En esta primera anotacion le digo que la entidad 'Agents' se relaciona con la tabla 'agent' de la bbdd.
 * Posteriormente defino la estructura de los atributos para que se corresponda con la estructura de la 
 * bbdd de phpMyAdmin con las anotaciones Doctrine, es decir, especifico su tipo: integer, text, string, 
 * etc... su longitud, nombre...
 */

/**
 * @ORM\Entity(repositoryClass=AgentsRepository::class)
 * @ORM\Table(name="agent")
 */
class Agents
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id_agent")
     * @ORM\GeneratedValue
     */
    private $idAgent;

    /** @ORM\Column(type="string", length="100", name="agent_name") */
    private $agentName;

    /** @ORM\Column(type="string",name="`password`", length=64, options={"fixed" = true}) */
    private $password;

    /** @ORM\Column(type="string", length="100") */
    private $faction;

    /**
     * En las relaciones OneToMany:
     * -Se reciben como parametros en forma de anotaciones lo siguiente:
     *   La entidad con la que esta relacionada 
     *   El nombre de la variable que hace referencia al campo de la tabla del lado ManyToOne
     */

    /**
     * Un agente tiene muchos uploads.Lado de Uno, bidireccional
     * @ORM\OneToMany(targetEntity="Uploads", mappedBy="agent")
     */
    private $uploads;

    /**
     * Un agente tiene muchas estadisticas de eventos.Lado de Uno, bidireccional
     * @ORM\OneToMany(targetEntity="StatsEvents", mappedBy="agent")
     */
    private $statsEvents;

    /**
     * Un agente tiene muchas estadisticas.Lado de Uno, bidireccional
     * @ORM\OneToMany(targetEntity="Stats", mappedBy="idAgent")
     */
    private $stats;
/**
 * Creo un constructor e inicializo el campo 'agentes' para que contenga un ArrayCollection.
 * Ese ArrayCollection sera rellenado por Doctrine en background cuando sea necesario.
 */
    public function __construct() {
        $this->uploads = new ArrayCollection();
        $this->statsEvents = new ArrayCollection();
        $this->stats = new ArrayCollection();
    }

    /**
     * Get the value of agentName
     */ 
    public function getAgentName()
    {
        return $this->agentName;
    }

    /**
     * Set the value of agentName
     *
     * @return  self
     */ 
    public function setAgentName($agentName)
    {
        $this->agentName = $agentName;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of faction
     */ 
    public function getFaction()
    {
        return $this->faction;
    }

    /**
     * Set the value of faction
     *
     * @return  self
     */ 
    public function setFaction($faction)
    {
        $this->faction = $faction;

        return $this;
    }

    /**
     * Get the value of idAgent
     */ 
    public function getIdAgent()
    {
        return $this->idAgent;
    }

    /**
     * Get un agente tiene muchos estados de evento.Lado de Uno, bidireccional
     */ 
    public function getStatsEvents()
    {
        return $this->statsEvents;
    }

    /**
     * Set un agente tiene muchos estados de evento.Lado de Uno, bidireccional
     *
     * @return  self
     */ 
    public function setStatsEvents($statsEvents)
    {
        $this->statsEvents = $statsEvents;

        return $this;
    }

    /**
     * Get un agente tiene muchas subidas.Lado de Uno, bidireccional
     */ 
    public function getUploads()
    {
        return $this->uploads;
    }

    /**
     * Set un agente tiene muchas subidas.Lado de Uno, bidireccional
     *
     * @return  self
     */ 
    public function setUploads($uploads)
    {
        $this->uploads = $uploads;

        return $this;
    }

    /**
     * Get un agente tiene muchas estadisticas.Lado de Uno, bidireccional
     */ 
    public function getStats()
    {
        return $this->stats;
    }

    /**
     * Set un agente tiene muchas estadisticas.Lado de Uno, bidireccional
     *
     * @return  self
     */ 
    public function setStats($stats)
    {
        $this->stats = $stats;

        return $this;
    }

    public function formatData($data) {
        $string = $data["estadisticas"];    //Recupero la info por $_POST del textarea
        $split_data = explode("\n", $string);   //Separo la información por saltos de línea
        $datos = explode("\t", $split_data[1]);     //Tengo toda la info en el índice 1
        $array_inserts = [];    //Creo un nuevo array vacio
        array_push($array_inserts, $datos); // Meto los datos del array pasado por el formulario($_POST) al final del nuevo array
        return $array_inserts;
        
    }
}