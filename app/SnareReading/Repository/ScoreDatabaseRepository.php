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

    public function createEntity()
    {
        return new ScoreEntity($this->database);
    }

    public function save(Score $score)
    {
        $entity = $this->createEntity();
        $entity->title = $score->getTitle();
        $entity->notes = $score->getNotes();

        //The score has an id if it has been stored before. Tell
        //the entity to update instead of insert.
        if ($score->hasId()) {
            $entity->id = $score->getId();
            $entity->setStored();
        }

        $entity->save();

        //Set the id of the score to the id of the entity.
        $score->setId($entity->getRaw('id'));
        return $score;
    }

}
