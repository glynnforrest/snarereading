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

    /**
     * Create a new Score instance.
     *
     * @return Score A new Score instance.
     */
    public function create()
    {
        return new Score();
    }

    /**
     * Create a new Score instance with random attributes applied.
     */
    public function createRandom()
    {
        $score = $this->create();
        $this->generator->generate($score);
        $this->repository->save($score);

        return $score;
    }

}
