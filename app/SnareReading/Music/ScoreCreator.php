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

    public function __construct(GeneratorInterface $generator)
    {
        $this->generator = $generator;
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
        $this->generator->title($score);
        $this->generator->notes($score);

        return $score;
    }

}
