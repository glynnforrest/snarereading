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
    protected $repository;
    protected $creator;

    public function setUp()
    {
        $this->generator = $this->getMock('SnareReading\Music\Generator\GeneratorInterface');
        $this->repository = $this->getMock('SnareReading\Repository\ScoreRepositoryInterface');
        $this->creator = new ScoreCreator($this->generator, $this->repository);
    }

    public function testCreateRandom()
    {
        $score = $this->getMock('SnareReading\Music\ScoreInterface');
        $this->generator->expects($this->once())
                        ->method('generate')
                        ->will($this->returnValue($score));
        $this->repository->expects($this->once())
                         ->method('save')
                         ->with($score)
                         ->will($this->returnValue($score));

        $this->assertSame($score, $this->creator->createRandom());
    }

}