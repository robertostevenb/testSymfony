<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Fizzbuzz
 *
 * @ORM\Table(name="FizzBuzz")
 * @ORM\Entity(repositoryClass="App\Repository\FizzBuzzRepository")
 */
class Fizzbuzz
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
     * @var int
     *
     * @ORM\Column(name="startNumber", type="integer", nullable=false)
     */
    private $startnumber;

    /**
     * @var int
     *
     * @ORM\Column(name="finalNumber", type="integer", nullable=false)
     */
    private $finalnumber;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateHour", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $datehour = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="fizzBuzzText", type="string", length=10000, nullable=false)
     */
    private $fizzbuzztext;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartnumber(): ?int
    {
        return $this->startnumber;
    }

    public function setStartnumber(int $startnumber): self
    {
        $this->startnumber = $startnumber;

        return $this;
    }

    public function getFinalnumber(): ?int
    {
        return $this->finalnumber;
    }

    public function setFinalnumber(int $finalnumber): self
    {
        $this->finalnumber = $finalnumber;

        return $this;
    }

    public function getDatehour(): ?\DateTimeInterface
    {
        return $this->datehour;
    }

    public function setDatehour(\DateTimeInterface $datehour): self
    {
        $this->datehour = $datehour;

        return $this;
    }

    public function getFizzbuzztext(): ?string
    {
        return $this->fizzbuzztext;
    }

    public function setFizzbuzztext(string $fizzbuzztext): self
    {
        $this->fizzbuzztext = $fizzbuzztext;

        return $this;
    }


}
