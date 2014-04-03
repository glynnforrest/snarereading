<?php

namespace SnareReading\Repository;

use SnareReading\Music\ScoreInterface;

/**
 * ScoreRepositoryInterface
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
interface ScoreRepositoryInterface
{

    public function save(ScoreInterface $score);

}
