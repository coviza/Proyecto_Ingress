<?php

/**
 * Enlazo el repositorio y apunto al Mapping mediante los use.
 */
namespace App\Entity;

use App\Repository\EventsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Las anotaciones son metainformacion que php es capaz de leer e interpretar y
 * sirven para modelar 
 * En esta primera anotacion le digo que la entidad 'Agents' se relaciona con la tabla 'agent' de la bbdd.
 * Posteriormente defino la estructura de los atributos para que se corresponda con la estructura de la 
 * bbdd de phpMyAdmin con las anotaciones Doctrine, es decir, especifico su tipo: integer, text, string, 
 * etc... su longitud, nombre...
 */

/**
 * @ORM\Entity(repositoryClass=EventsRepository::class)
 * @ORM\Table(name="events")
 */
class Events {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id_event")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * Un evento tiene muchos eventos de Estado. Este es el lado inverso.
     * @ORM\OneToMany(targetEntity="StatsEvents", mappedBy="event")
     */
    private $statsEvents;

    /**
     * Mediante el constructor se inicializan los ArrayCollection de las asociaciones de 
     * uno a muchos que tenemos con la tabla statsEvents
     */
    public function __construct() {
        /* Inicializamos las variables asociadas como Arraycollection para poder
        obtener todos los objetos asociados */
        $this->statsEvents = new ArrayCollection();
    }

    /**
     * @ORM\Column(type="string", length="100", name="name_event")
     */
    private $nameEvent;

    /**
     * @ORM\Column(type="string", length="100", name="alias_event")
     */
    private $aliasEvent;

    /**
     * @ORM\Column(type="string", length="250", name="descrip_event")
     */
    private $descripEvent;

    /**
     * @ORM\Column(type="datetime", name="date_event")
     */
    private $dateEvent;

    /**
     * @ORM\Column(type="string", length="250", name="place_event")
     */
    private $placeEvent;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nameEvent
     */ 
    public function getNameEvent()
    {
        return $this->nameEvent;
    }

    /**
     * Set the value of nameEvent
     *
     * @return  self
     */ 
    public function setNameEvent($nameEvent)
    {
        $this->nameEvent = $nameEvent;

        return $this;
    }

    /**
     * Get the value of aliasEvent
     */ 
    public function getAliasEvent()
    {
        return $this->aliasEvent;
    }

    /**
     * Set the value of aliasEvent
     *
     * @return  self
     */ 
    public function setAliasEvent($aliasEvent)
    {
        $this->aliasEvent = $aliasEvent;

        return $this;
    }

    /**
     * Get the value of descripEvent
     */ 
    public function getDescripEvent()
    {
        return $this->descripEvent;
    }

    /**
     * Set the value of descripEvent
     *
     * @return  self
     */ 
    public function setDescripEvent($descripEvent)
    {
        $this->descripEvent = $descripEvent;

        return $this;
    }

    /**
     * Get the value of dateEvent
     */ 
    public function getDateEvent()
    {
        return $this->dateEvent;
    }

    /**
     * Set the value of dateEvent
     *
     * @return  self
     */ 
    public function setDateEvent()
    {
        return $this->dateEvent->format('Y-m-d');

    }

    /**
     * Get the value of placeEvent
     */ 
    public function getPlaceEvent()
    {
        return $this->placeEvent;
    }

    /**
     * Set the value of placeEvent
     *
     * @return  self
     */ 
    public function setPlaceEvent($placeEvent)
    {
        $this->placeEvent = $placeEvent;

        return $this;
    }

    /**
     * Get un evento tiene muchos eventos de Estado. Este es el lado inverso.
     */ 
    public function getStatsEvents()
    {
        return $this->statsEvents;
    }

    /**
     * Set un evento tiene muchos eventos de Estado. Este es el lado inverso.
     *
     * @return  self
     */ 
    public function setStatsEvents($statsEvents)
    {
        $this->statsEvents = $statsEvents;

        return $this;
    }
}