<?php
/**
 * This file is part of Lembatu
 */
namespace Lembatu\Test;

/**
 * Example test class
 */
class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->client->request('GET', '/login');

        $this->assertTrue($this->client->getResponse()->isOk());
    }
}
