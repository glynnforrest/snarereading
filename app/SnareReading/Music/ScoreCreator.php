<?php

namespace SnareReading\Music;

use SnareReading\Music\Generator\GeneratorInterface;
use SnareReading\Music\Store\StoreInterface;

/**
 * ScoreCreator
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class ScoreCreator
{

    protected $generator;
    protected $store;

    public function __construct(GeneratorInterface $generator, StoreInterface $store)
    {
        $this->generator = $generator;
        $this->store = $store;
    }

    public function createRandom()
    {
        $this->store->save($this->generator->generate());
    }

}
