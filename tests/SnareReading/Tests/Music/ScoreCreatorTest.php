<?php

namespace SnareReading\Tests\Music;

require_once __DIR__ . '/../../../bootstrap.php';

use SnareReading\Music\ScoreCreator;

/**
 * ScoreCreatorTest
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class ScoreCreatorTest extends \PHPUnit_Framework_TestCase
{

    protected $generator;
    protected $creator;

    public function setUp()
    {
        $this->generator = $this->getMock('SnareReading\Music\Generator\GeneratorInterface');
        $this->creator = new ScoreCreator($this->generator);
    }

    public function testCreate()
    {
        $this->assertInstanceOf('SnareReading\Music\Score', $this->creator->create());
    }

    public function testCreateRandom()
    {
        $creator = $this->getMockBuilder('SnareReading\Music\ScoreCreator')
                        ->setConstructorArgs(array($this->generator))
                        ->setMethods(array('create'))
                        ->getMock();
        $score = $this->getMock('SnareReading\Music\Score');

        $creator->expects($this->once())
                         ->method('create')
                         ->will($this->returnValue($score));
        $this->generator->expects($this->once())
                        ->method('generate')
                        ->with($score);

        $this->assertSame($score, $creator->createRandom());
    }

}
