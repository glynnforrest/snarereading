<?php

namespace SnareReading\Generator;

/**
 * ScoreGenerator
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class ScoreGenerator
{

    public function newScore()
    {
        return (int) rand(0, 99);
    }

}
