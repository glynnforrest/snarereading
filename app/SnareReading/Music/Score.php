<?php

namespace SnareReading\Music;

/**
 * Score
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class Score
{

    protected $notes;

    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    public function getNotes()
    {
        return $this->notes;
    }

}
