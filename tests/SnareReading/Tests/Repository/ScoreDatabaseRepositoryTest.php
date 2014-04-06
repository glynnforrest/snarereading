<?php

namespace SnareReading\Tests\Repository;

require_once __DIR__ . '/../../../bootstrap.php';

use SnareReading\Repository\ScoreDatabaseRepository;
use SnareReading\Music\Score;

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
        $this->assertInstanceOf('SnareReading\Music\Score', $this->repo->create());
    }

    public function testCreateEntity()
    {
        $this->assertInstanceOf('SnareReading\Entity\Score', $this->repo->createEntity());
    }

    public function testSaveInsert()
    {
        $score = new Score();
        $score->setTitle('title');
        $score->setNotes('sn4 sn sn sn');

        $repo = $this->getMockBuilder('SnareReading\Repository\ScoreDatabaseRepository')
                     ->setMethods(array('createEntity'))
                     ->disableOriginalConstructor()
                     ->getMock();
        $entity = $this->getMockBuilder('SnareReading\Entity\Score')
                       ->setMethods(array('save', 'getRaw'))
                       ->disableOriginalConstructor()
                       ->getMock();

        $repo->expects($this->once())
             ->method('createEntity')
             ->will($this->returnValue($entity));
        $entity->expects($this->once())
               ->method('save');
        //the score will be assigned the newly inserted id of the
        //entity
        $entity->expects($this->once())
               ->method('getRaw')
               ->with('id')
               ->will($this->returnValue(42));

        $this->assertSame($score, $repo->save($score));

        $expected = array('title' => 'title', 'notes' => 'sn4 sn sn sn');
        $this->assertSame($expected, $entity->getValuesRaw());
        $this->assertSame(42, $score->getId());
    }

    public function testSaveUpdate()
    {
        $score = new Score();
        $score->setTitle('title');
        $score->setNotes('sn4 sn sn sn');
        $score->setId(42);

        $repo = $this->getMockBuilder('SnareReading\Repository\ScoreDatabaseRepository')
                     ->setMethods(array('createEntity'))
                     ->disableOriginalConstructor()
                     ->getMock();
        $entity = $this->getMockBuilder('SnareReading\Entity\Score')
                       ->setMethods(array('save', 'setStored'))
                       ->disableOriginalConstructor()
                       ->getMock();

        $repo->expects($this->once())
             ->method('createEntity')
             ->will($this->returnValue($entity));
        $entity->expects($this->once())
               ->method('setStored');
        $entity->expects($this->once())
               ->method('save');

        $this->assertSame($score, $repo->save($score));

        $expected = array('title' => 'title', 'notes' => 'sn4 sn sn sn', 'id' => 42);
        $this->assertSame($expected, $entity->getValuesRaw());
        $this->assertSame(42, $score->getId());
    }

}