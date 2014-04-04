<?php

namespace SnareReading\Repository;

use SnareReading\Music\ScoreInterface;
use SnareReading\Entity\Score;
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

    public function save(ScoreInterface $score)
    {
        echo $score->getNotes();
        //check if the score exists
        //insert or update the score
    }

    public function create()
    {
        return new Score($this->database);
    }

}
