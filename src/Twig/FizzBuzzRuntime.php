<?php

namespace App\Twig;

use App\Entity\Fizzbuzz;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Twig\Extension\RuntimeExtensionInterface;

class FizzBuzzRuntime implements RuntimeExtensionInterface
{
    /**
     * @param int $startNumber
     * @param int $endNumber
     *
     * @return string
     */
    public function fizzBuzzFilter($startNumber, $endNumber = 0)
    {
        if ($endNumber == 0) {
            $endNumber = $startNumber + 30;
        }

        $fizzBuzzSeries = "";

        for ($i = $startNumber; $i <= $endNumber; $i++) {
            $isFizz = (0 === $i % 3);
            $isBuzz = (0 === $i % 5);

            if (!$isFizz && !$isBuzz) {
                $fizzBuzzSeries .= $i.", ";
                continue;
            }

            if ($isFizz) {
                $fizzBuzzSeries .= "Fizz";
            }

            if ($isBuzz) {
                $fizzBuzzSeries .= "Buzz";
            }

            $fizzBuzzSeries .= ", ";
        }

        return $fizzBuzzSeries;
    }
}