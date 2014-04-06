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

    /**
     * Set the lilypond notes of this score.
     *
     * @param string $notes The notes, in lilypond markup
     * @return Score This Score instance
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * Get the notes of this score.
     * @return string The notes of this score
     */
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
