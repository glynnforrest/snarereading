<?php

namespace SnareReading\Tests\Music;

require_once __DIR__ . '/../../../bootstrap.php';

use SnareReading\Music\Score;

/**
 * ScoreTest
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class ScoreTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->score = new Score();
    }

    public function testGetAndSetNotes()
    {
        $music = 'sn4 sn sn sn';
        $this->assertSame($this->score, $this->score->setNotes($music));
        $this->assertSame($music, $this->score->getNotes());
    }

    public function testGetAndSetTitle()
    {
        $this->assertNull($this->score->getTitle());
        $this->assertSame($this->score, $this->score->setTitle('Score 1'));
        $this->assertSame('Score 1', $this->score->getTitle());
    }

    public function testGetAndSetId()
    {
        $this->assertNull($this->score->getId());
        $this->assertSame($this->score, $this->score->setId(1));
        $this->assertSame(1, $this->score->getId());
    }

    public function testHasId()
    {
        $this->assertFalse($this->score->hasId());
        $this->score->setId('a5623ebd');
        $this->assertTrue($this->score->hasId());
    }

    public function testGetMarkup()
    {
        $this->score->setTitle('Foo');
        $this->score->setNotes('sn4 sn8 sn');
        $expected = '\header { title = "Foo" }' . PHP_EOL;
        $expected .= '\drums { sn4 sn8 sn }' . PHP_EOL;
        $this->assertSame($expected, $this->score->getMarkup());
    }

}