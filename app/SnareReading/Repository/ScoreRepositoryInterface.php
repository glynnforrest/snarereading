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

    public function findById($id);

}
