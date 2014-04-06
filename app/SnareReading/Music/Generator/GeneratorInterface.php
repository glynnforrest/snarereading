<?php

namespace SnareReading\Music\Generator;

use SnareReading\Music\Score;

/**
 * GeneratorInterface
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
interface GeneratorInterface
{

    public function generate(Score $score, array $options = array());

}
