<?php

namespace SnareReading\Repository;

use SnareReading\Music\Score;
use SnareReading\Entity\Score as ScoreEntity;
use Neptune\Database\Driver\DatabaseDriverInterface;

/**
 * ScoreDatabaseRepository
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class ScoreDatabaseRepository implements ScoreRepositoryInterface
{

    protected $database;

    public function __construct(DatabaseDriverInterface $database)
    {
        $this->database = $database;
    }

    public function create()
    {
        return new Score();
    }

    public function save(Score $score)
    {
        return true;
        //check if the score has an id
        //insert or update the score
    }

}
