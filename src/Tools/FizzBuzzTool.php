<?php

namespace App\Tools;

use App\Entity\Fizzbuzz;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class FizzBuzzTool
{
    public function __construct()
    {
    }

    public function fizzBuzzString($startNumber, $endNumber = 0)
    {
        if ($endNumber == 0) {
            $endNumber = $startNumber + 29;
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

        return rtrim($fizzBuzzSeries, ", ");
    }
}