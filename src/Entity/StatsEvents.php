<?php

namespace App\Entity;

use App\Repository\StatsEventsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatsEventsRepository::class)
 * @ORM\Table(name="stats_events")
 */
class StatsEvents
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id_stats")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * Muchas estadística para un evento, Lado de Muchos inversedBy, bidireccional
     * @ORM\ManyToOne(targetEntity="Events", inversedBy="statsEvents")
     * @ORM\JoinColumn(name="id_event", referencedColumnName="id_event")
     */
    private $event;

    /**
     * Muchos stat Events tienen una subida. Este es el lado propietario.
     * @ORM\ManyToOne(targetEntity="Uploads", inversedBy="statsEvents")
     * @ORM\JoinColumn(name="id_upload", referencedColumnName="id_upload")
     */
    private $uploads;

    /**
     * Muchos stats Events tienen un agente. Este es el lado propietario.
     * @ORM\ManyToOne(targetEntity="Agents", inversedBy="statsEvents")
     * @ORM\JoinColumn(name="id_agent", referencedColumnName="id_agent")
     */
    private $agent;

    /** 
     * 
     * @ORM\Column(type="integer", name="lifetime_ap") */
    private $lifetimeAp;

    /** 
     * 
     * @ORM\Column(type="integer", name="unique_portals_visited") */
    private $uniquePortalsVisited;

    /** 
     * 
     * @ORM\Column(type="integer", name="resonators_deployed") */
    private $resonatorsDeployed;

    /** 
     * 
     * @ORM\Column(type="integer", name="links_created") */
    private $linksCreated;

    /** 
     * 
     * @ORM\Column(type="integer", name="control_fields_created") */ 
    private $controlFieldsCreated;

    /** 
     * 
     * @ORM\Column(type="integer", name="xm_recharged") */
    private $xmRecharged;

    /** 
     * 
     * @ORM\Column(type="integer", name="portals_captured") */
    private $portalsCaptured;

    /** 
     * 
     * @ORM\Column(type="integer", name="hacks") */
    private $hacks;

    /** 
     * 
     * @ORM\Column(type="integer", name="resonators_destroyed") */
    private $resonatorsDestroyed;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    
    /**
     * Get the value of lifetimeAp
     */ 
    public function getLifetimeAp()
    {
        return $this->lifetimeAp;
    }

    /**
     * Set the value of lifetimeAp
     *
     * @return  self
     */ 
    public function setLifetimeAp($lifetimeAp)
    {
        $this->lifetimeAp = $lifetimeAp;

        return $this;
    }

    /**
     * Get the value of uniquePortalsVisited
     */ 
    public function getUniquePortalsVisited()
    {
        return $this->uniquePortalsVisited;
    }

    /**
     * Set the value of uniquePortalsVisited
     *
     * @return  self
     */ 
    public function setUniquePortalsVisited($uniquePortalsVisited)
    {
        $this->uniquePortalsVisited = $uniquePortalsVisited;

        return $this;
    }

    /**
     * Get the value of resonatorsDeployed
     */ 
    public function getResonatorsDeployed()
    {
        return $this->resonatorsDeployed;
    }

    /**
     * Set the value of resonatorsDeployed
     *
     * @return  self
     */ 
    public function setResonatorsDeployed($resonatorsDeployed)
    {
        $this->resonatorsDeployed = $resonatorsDeployed;

        return $this;
    }

    /**
     * Get the value of linksCreated
     */ 
    public function getLinksCreated()
    {
        return $this->linksCreated;
    }

    /**
     * Set the value of linksCreated
     *
     * @return  self
     */ 
    public function setLinksCreated($linksCreated)
    {
        $this->linksCreated = $linksCreated;

        return $this;
    }

    /**
     * Get the value of controlFieldsCreated
     */ 
    public function getControlFieldsCreated()
    {
        return $this->controlFieldsCreated;
    }

    /**
     * Set the value of controlFieldsCreated
     *
     * @return  self
     */ 
    public function setControlFieldsCreated($controlFieldsCreated)
    {
        $this->controlFieldsCreated = $controlFieldsCreated;

        return $this;
    }

    /**
     * Get the value of xmRecharged
     */ 
    public function getXmRecharged()
    {
        return $this->xmRecharged;
    }

    /**
     * Set the value of xmRecharged
     *
     * @return  self
     */ 
    public function setXmRecharged($xmRecharged)
    {
        $this->xmRecharged = $xmRecharged;

        return $this;
    }

    /**
     * Get the value of portalsCaptured
     */ 
    public function getPortalsCaptured()
    {
        return $this->portalsCaptured;
    }

    /**
     * Set the value of portalsCaptured
     *
     * @return  self
     */ 
    public function setPortalsCaptured($portalsCaptured)
    {
        $this->portalsCaptured = $portalsCaptured;

        return $this;
    }

    /**
     * Get the value of hacks
     */ 
    public function getHacks()
    {
        return $this->hacks;
    }

    /**
     * Set the value of hacks
     *
     * @return  self
     */ 
    public function setHacks($hacks)
    {
        $this->hacks = $hacks;

        return $this;
    }

    /**
     * Get the value of resonatorsDestroyed
     */ 
    public function getResonatorsDestroyed()
    {
        return $this->resonatorsDestroyed;
    }

    /**
     * Set the value of resonatorsDestroyed
     *
     * @return  self
     */ 
    public function setResonatorsDestroyed($resonatorsDestroyed)
    {
        $this->resonatorsDestroyed = $resonatorsDestroyed;

        return $this;
    }



    /**
     * Get muchas estadística para un evento, Lado de Muchos inversedBy, bidireccional
     */ 
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set muchas estadística para un evento, Lado de Muchos inversedBy, bidireccional
     *
     * @return  self
     */ 
    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get muchos stat Events tienen una subida. Este es el lado propietario.
     */ 
    public function getUploads()
    {
        return $this->uploads;
    }

    /**
     * Set muchos stat Events tienen una subida. Este es el lado propietario.
     *
     * @return  self
     */ 
    public function setUploads($uploads)
    {
        $this->uploads = $uploads;

        return $this;
    }

    /**
     * Get muchos stats Events tienen un agente. Este es el lado propietario.
     */ 
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * Set muchos stats Events tienen un agente. Este es el lado propietario.
     *
     * @return  self
     */ 
    public function setAgent($agent)
    {
        $this->agent = $agent;

        return $this;
    }
}