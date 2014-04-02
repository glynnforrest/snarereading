<?php

namespace SnareReading\Tests\Music\Generator;

require_once __DIR__ . '/../../../../bootstrap.php';

use SnareReading\Music\Generator\BasicGenerator;

/**
 * BasicGeneratorTest
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class BasicGeneratorTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->gen = new BasicGenerator();
    }

    public function testIsGenerator()
    {
        $this->assertInstanceOf('\SnareReading\Music\Generator\GeneratorInterface', $this->gen);
    }

    public function testGenerateStartsWithDrums()
    {
        $music = $this->gen->generate();
        $this->assertSame('\drums {', substr($music, 0, 8));
    }

}
