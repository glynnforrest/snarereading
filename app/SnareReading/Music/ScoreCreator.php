<?php

namespace SnareReading\Music;

use SnareReading\Music\Generator\GeneratorInterface;
use SnareReading\Repository\ScoreRepositoryInterface;

/**
 * ScoreCreator
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class ScoreCreator
{

    protected $generator;
    protected $repository;

    public function __construct(GeneratorInterface $generator, ScoreRepositoryInterface $repository)
    {
        $this->generator = $generator;
        $this->repository = $repository;
    }

    public function createRandom()
    {
        return $this->repository->save($this->generator->generate());
    }

}
