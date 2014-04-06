<?php

namespace SnareReading\Model;

use SnareReading\Repository\ScoreRepositoryInterface;
use SnareReading\Music\Generator\BasicGenerator;
use SnareReading\Music\ScoreCreator;
use SnareReading\PdfStorage\PdfStorageInterface;

/**
 * ScoreModel
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class ScoreModel
{

    protected $repository;
    protected $pdf_store;

    public function __construct(ScoreRepositoryInterface $repository, PdfStorageInterface $pdf_store)
    {
        $this->repository = $repository;
        $this->pdf_store = $pdf_store;
    }

    public function getGenerator($type = null)
    {
        return new BasicGenerator();
    }

    public function createRandomAndSave(array $options = array())
    {
        $generator = $this->getGenerator();
        $creator = new ScoreCreator($generator);
        $score = $creator->createRandom();
        $this->repository->save($score);
        $this->pdf_store->createPdf($score);

        return $score;
    }

    public function findById($id)
    {
        return $this->repository->findById($id);
    }

    public function getDownloadById($id)
    {
        $score = $this->repository->findById($id);
        return $this->pdf_store->getDownload($score);
    }

}
