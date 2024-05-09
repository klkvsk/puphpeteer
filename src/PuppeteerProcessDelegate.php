<?php

namespace Nesk\Puphpeteer;

use Nesk\Rialto\Interfaces\ShouldHandleProcessDelegation;
use Nesk\Rialto\Traits\UsesBasicResourceAsDefault;

class PuppeteerProcessDelegate implements ShouldHandleProcessDelegation
{
    use UsesBasicResourceAsDefault;

    public function resourceFromOriginalClassName(string $className): ?string
    {
        $class = "Nesk\\Puphpeteer\\Resources\\$className";

        if (class_exists($class)) {
            return $class;
        }

        $classWithoutCDP = 'Nesk\\Puphpeteer\\Resources\\'.preg_replace('/^CDP/i', '', $className);

        if (class_exists($classWithoutCDP)) {
            return $classWithoutCDP;
        }

        return null;
    }
}
