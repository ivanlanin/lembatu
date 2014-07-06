<?php
/**
 * This file is part of Lembatu
 */
namespace Lembatu\Test;

/**
 * Example test class
 */
class TestCase extends \Illuminate\Foundation\Testing\TestCase
{
    /**
     * Creates the application.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        // $unitTesting = true;
        // $testEnvironment = 'testing';

        return require __DIR__.'/../../bootstrap/start.php';
    }
}
