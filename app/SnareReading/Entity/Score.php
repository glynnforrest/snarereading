<?php

namespace SnareReading\Entity;

use SnareReading\Music\ScoreInterface;
use Neptune\Database\Entity\Entity;

/**
 * Score
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class Score extends Entity implements ScoreInterface
{

    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    public function getNotes()
    {
        return $this->notes;
    }

}
