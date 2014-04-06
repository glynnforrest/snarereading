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
    protected $title;

    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set the title of this score.
     *
     * @param string $title The title
     * @return Score This Score instance
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get the title of this score.
     * @return string The title
     */
    public function getTitle()
    {
        return $this->title;
    }

}
