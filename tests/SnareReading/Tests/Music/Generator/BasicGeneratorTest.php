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
        $this->score = $this->getMock('SnareReading\Music\Score');
    }

    public function testIsGenerator()
    {
        $this->assertInstanceOf('SnareReading\Music\Generator\GeneratorInterface', $this->gen);
    }

    public function testNotes()
    {
        $this->score->expects($this->once())
                    ->method('setNotes');
        $this->assertSame($this->score, $this->gen->notes($this->score));
    }

    public function testTitle()
    {
        $this->score->expects($this->once())
                    ->method('setTitle');
        $this->assertSame($this->score, $this->gen->title($this->score));
    }

}
