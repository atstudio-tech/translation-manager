<?php

namespace ATStudio\TranslationManager\Tests;

use ATStudio\TranslationManager\TranslationManagerServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            TranslationManagerServiceProvider::class,
        ];
    }
}
