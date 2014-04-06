<?php

namespace SnareReading\Model;

use SnareReading\Repository\ScoreRepositoryInterface;
use SnareReading\Music\Generator\BasicGenerator;
use SnareReading\Music\ScoreCreator;

/**
 * ScoreModel
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class ScoreModel
{

    protected $repository;

    public function __construct(ScoreRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function createRandomAndSave(array $options = array())
    {
        $generator = new BasicGenerator();
        $creator = new ScoreCreator($generator);
        $score = $creator->createRandom();
        $this->repository->save($score);
        return $score;
    }

}
