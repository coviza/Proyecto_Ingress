<?php

namespace App\Entity;

use App\Repository\UploadsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UploadsRepository::class)
 * @ORM\Table(name="uploads")
 */
class Uploads
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id_upload")
     * @ORM\GeneratedValue
     */
    private $id;

    /** @ORM\Column(type="datetime") */
    private $date;

    /** @ORM\Column(type="time") */
    private $time;

    /** @ORM\Column(type="boolean", name="id_event") */
    private $idEvent;

    /**
     * En las relaciones ManyToOne se reciben como parametros lo siguiente:
     * -La Entidad con la que esta relacionada 
     * -La varibale que hemos creado en el lado OneToMany para contener el objeto de tipo Agente
     */

    /**
     * Muchas subidas tienen un agente. Este es el lado propietario.
     * @ORM\ManyToOne(targetEntity="Agents", inversedBy="uploads")
     * @ORM\JoinColumn(name="id_agent", referencedColumnName="id_agent")
     */
    private $agent;

    /**
     * Muchas subidas tienen un span. Este es el lado propietario.
     * @ORM\ManyToOne(targetEntity="Span", inversedBy="uploads")
     * @ORM\JoinColumn(name="time_span", referencedColumnName="id_span")
     */
    private $span;

    /**
     * Un upload tiene muchos eventos de Estado. Este es el lado inverso.
     * @ORM\OneToMany(targetEntity="StatsEvents", mappedBy="uploads")
     */
    private $statsEvents;

    /**
     * Un upload tiene muchos estados. Este es el lado inverso.
     * @ORM\OneToMany(targetEntity="Stats", mappedBy="idUpload")
     */
    private $stats;

    public function __construct() {
        $this->statsEvents = new ArrayCollection();
        $this->stats = new ArrayCollection();
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }


    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of time
     */ 
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set the value of time
     *
     * @return  self
     */ 
    public function setTime($time)
    {
        $this->time = $time;

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
     * Set the value of idAgent
     *
     * @return  self
     */ 
    public function setIdAgent($idAgent)
    {
        $this->idAgent = $idAgent;

        return $this;
    }

    /**
     * Get the value of timeSpan
     */ 
    public function getTimeSpan()
    {
        return $this->timeSpan;
    }

    /**
     * Set the value of timeSpan
     *
     * @return  self
     */ 
    public function setTimeSpan($timeSpan)
    {
        $this->timeSpan = $timeSpan;

        return $this;
    }

    /**
     * Get the value of idEvent
     */ 
    public function getIdEvent()
    {
        return $this->idEvent;
    }

    /**
     * Set the value of idEvent
     *
     * @return  self
     */ 
    public function setIdEvent($idEvent)
    {
        $this->idEvent = $idEvent;

        return $this;
    }

    /**
     * Get muchas subidas tienen un agente. Este es el lado propietario.
     */ 
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * Set muchas subidas tienen un agente. Este es el lado propietario.
     *
     * @return  self
     */ 
    public function setAgent($agent)
    {
        $this->agent = $agent;

        return $this;
    }

    /**
     * Get muchas subidas tienen un span. Este es el lado propietario.
     */ 
    public function getSpan()
    {
        return $this->span;
    }

    /**
     * Set muchas subidas tienen un span. Este es el lado propietario.
     *
     * @return  self
     */ 
    public function setSpan($span)
    {
        $this->span = $span;

        return $this;
    }

    /**
     * Get un upload tiene muchos eventos de Estado. Este es el lado inverso.
     */ 
    public function getStatsEvents()
    {
        return $this->statsEvents;
    }

    /**
     * Set un upload tiene muchos eventos de Estado. Este es el lado inverso.
     *
     * @return  self
     */ 
    public function setStatsEvents($statsEvents)
    {
        $this->statsEvents = $statsEvents;

        return $this;
    }

    /**
     * Get un upload tiene muchos estados. Este es el lado inverso.
     */ 
    public function getStats()
    {
        return $this->stats;
    }

    /**
     * Set un upload tiene muchos estados. Este es el lado inverso.
     *
     * @return  self
     */ 
    public function setStats($stats)
    {
        $this->stats = $stats;

        return $this;
    }
}