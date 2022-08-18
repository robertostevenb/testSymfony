<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            // the logic of this filter is now implemented in a different class
            new TwigFilter('fizzBuzz', [FizzBuzzRuntime::class, 'fizzBuzzFilter']),
        ];
    }

}