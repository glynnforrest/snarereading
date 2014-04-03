<?php

namespace SnareReading\Tests\Music;

require_once __DIR__ . '/../../../bootstrap.php';

use SnareReading\Entity\Score;

/**
 * ScoreTest
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class ScoreTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->score = new Score($this->getMock('Neptune\Database\Driver\DatabaseDriverInterface'));
    }

    public function testGetAndSetNotes()
    {
        $music = 'sn4 sn sn sn';
        $this->score->setNotes($music);
        $this->assertSame($music, $this->score->getNotes());
    }

}