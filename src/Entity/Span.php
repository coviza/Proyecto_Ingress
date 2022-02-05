<?php

namespace App\Entity;

use App\Repository\SpanRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpanRepository::class)
 * @ORM\Table(name="span")
 */
class Span
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="id_span")
     * @ORM\GeneratedValue
     */
    private $id;

    /** @ORM\Column(type="string", length="100", name="time_span") */
    private $timeSpan;

    /**
     * Un espacio de tiempo para muchos Uploads, Lado de one mappedBy, bidireccional
     * @ORM\OneToMany(targetEntity="Uploads", mappedBy="span")
     */
    private $uploads;

    public function __construct()
    {
        $this->uploads = new ArrayCollection();
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
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
     * Get un espacio de tiempo para muchos Uploads, Lado de one mappedBy, bidireccional
     */ 
    public function getUploads()
    {
        return $this->uploads;
    }

    /**
     * Set un espacio de tiempo para muchos Uploads, Lado de one mappedBy, bidireccional
     *
     * @return  self
     */ 
    public function setUploads($uploads)
    {
        $this->uploads = $uploads;

        return $this;
    }
}