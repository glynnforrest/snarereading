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

    public function notes(Score $score, array $options = array());

    public function title(Score $score);

}
