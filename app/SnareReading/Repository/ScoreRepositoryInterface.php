<?php

namespace SnareReading\Repository;

use SnareReading\Music\Score;

/**
 * ScoreRepositoryInterface
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
interface ScoreRepositoryInterface
{

    public function save(Score $score);

    /**
     * Create a new score instance with any optional configuration
     * required for this repository storage.
     */
    public function create();

}
