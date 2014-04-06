<?php

namespace SnareReading\Tests\Model;

require_once __DIR__ . '/../../../bootstrap.php';

use SnareReading\Model\ScoreModel;

/**
 * ScoreModelTest
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class ScoreModelTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->repository = $this->getMock('SnareReading\Repository\ScoreRepositoryInterface');
        $this->pdf_storage = $this->getMock('SnareReading\PdfStorage\PdfStorageInterface');
        $this->model = new ScoreModel($this->repository, $this->pdf_storage);
    }

    public function testGetGenerator()
    {
        $this->assertInstanceOf('SnareReading\Music\Generator\BasicGenerator', $this->model->getGenerator());
        $this->assertInstanceOf('SnareReading\Music\Generator\BasicGenerator', $this->model->getGenerator('basic'));
    }

    public function testCreateRandomAndSave()
    {
        $this->repository->expects($this->once())
                         ->method('save');
        $this->pdf_storage->expects($this->once())
                          ->method('createPdf');
        $score = $this->model->createRandomAndSave();
        $this->assertInstanceOf('SnareReading\Music\Score', $score);
    }

}