<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="datereservation", type="string", nullable=false)
     */
    private $dateReservation;

    /**
     * @var bool
     *
     * @ORM\Column(name="etat", type="boolean", nullable=false)
     */
    private $etat;

    /**
     * @var \Bien
     *
     * @ORM\ManyToOne(targetEntity="Bien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bien", referencedColumnName="id")
     * })
     */
    private $bien;

     /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="client", referencedColumnName="id")
     * })
     */
    private $client;

    public function getId()
    {
        return $this->id;
    }

    public function getDateReservation(): ?string
    {
        return $this->dateReservation;
    }

    public function setDateReservation(string $dateReservation): self
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    public function getEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(bool $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Set client.
     *
     * @param \App\Entity\Client $client
     *
     * @return Reservation
     */
    public function setClient(\App\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client.
     *
     * @return \App\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Add bien.
     *
     * @param \App\Entity\Bien $bien
     *
     * @return Reservation
     */
    public function addBien(\App\Entity\Bien $bien)
    {
        $this->Bien[] = $bien;

        return $this;
    }

    /**
     * Remove bien.
     *
     * @param \App\Entity\Bien $bien
     */
    public function removeBien(\App\Entity\Bien $bien)
    {
        $this->Bien->removeElement($bien);
    }

    /**
     * Get bien.
     *
     * @return \App\Entity\Bien
     */
    public function getBien()
    {
        return $this->Bien;
    }

    /**
     * Set bien.
     *
     * @param \App\Entity\Bien $bien
     *
     * @return Reservation
     */
    public function setBien(\App\Entity\Bien $bien = null)
    {
        $this->bien = $bien;

        return $this;
    }

    public function setBienI($bien)
    {
        $this->bien = $bien;

        return $this;
    }

    public function __toString()
    {
        return $this->dateReservation;
    }
}
