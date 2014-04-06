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
        $this->score->setNotes($music);
        $this->assertSame($music, $this->score->getNotes());
    }

    public function testGetAndSetTitle()
    {
        $this->assertNull($this->score->getTitle());
        $this->assertSame($this->score, $this->score->setTitle('Score 1'));
        $this->assertSame('Score 1', $this->score->getTitle());
    }

}