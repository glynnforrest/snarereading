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
    protected $store;
    protected $creator;

    public function setUp()
    {
        $this->generator = $this->getMock('\SnareReading\Music\Generator\GeneratorInterface');
        $this->store = $this->getMock('\SnareReading\Music\Store\StoreInterface');
        $this->creator = new ScoreCreator($this->generator, $this->store);
    }

    public function testCreateRandom()
    {
        $score = 'score';
        $this->generator->expects($this->once())
                        ->method('generate')
                        ->will($this->returnValue($score));
        $this->store->expects($this->once())
                    ->method('save')
                    ->with($score);

        $this->creator->createRandom();
    }

}