<?php

namespace SnareReading\Music\Generator;

use SnareReading\Music\ScoreInterface;

/**
 * GeneratorInterface
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
interface GeneratorInterface
{

    public function generate(ScoreInterface $score, array $options = array());

}
