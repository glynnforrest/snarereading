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
        $this->score = $this->getMock('SnareReading\Music\ScoreInterface');
    }

    public function testIsGenerator()
    {
        $this->assertInstanceOf('SnareReading\Music\Generator\GeneratorInterface', $this->gen);
    }

    public function testGenerateStartsWithDrums()
    {
        $this->score->expects($this->once())
                    ->method('setNotes');
        $this->assertSame($this->score, $this->gen->generate($this->score));
    }

}
