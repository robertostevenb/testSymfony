<?php

namespace App\Twig;

use App\Entity\Fizzbuzz;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Tools\FizzBuzzTool;
use Twig\Extension\RuntimeExtensionInterface;

class FizzBuzzRuntime implements RuntimeExtensionInterface
{
    /**
     * @var FizzBuzzTool
     */
    private $formatter;

    /**
     * @param FizzBuzzTool $formatter
     */
    public function __construct(
        FizzBuzzTool $formatter
    )
    {
        $this->formatter = $formatter;
    }

    /**
     * @param int $startNumber
     * @param int $endNumber
     *
     * @return string
     */
    public function fizzBuzzFilter($startNumber, $endNumber = 0)
    {
        return $this->formatter->fizzBuzzString($startNumber, $endNumber);
    }
}