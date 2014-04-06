<?php

namespace SnareReading\Tests\Repository;

require_once __DIR__ . '/../../../bootstrap.php';

use SnareReading\Repository\ScoreDatabaseRepository;

/**
 * ScoreDatabaseRepositoryTest
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class ScoreDatabaseRepositoryTest extends \PHPUnit_Framework_TestCase
{

    protected $database;
    protected $repo;

    public function setUp()
    {
        $this->database = $this->getMock('Neptune\Database\Driver\DatabaseDriverInterface');
        $this->repo = new ScoreDatabaseRepository($this->database);
    }

    public function testCreate()
    {
        $this->assertInstanceOf('\SnareReading\Music\Score', $this->repo->create());
    }

}