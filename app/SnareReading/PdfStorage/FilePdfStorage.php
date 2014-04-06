<?php

namespace SnareReading\PdfStorage;

use SnareReading\Music\Score;

/**
 * FilePdfStorage
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class FilePdfStorage implements PdfStorageInterface
{

    protected $dir;

    public function __construct($storage_directory)
    {
        $this->dir = $storage_directory;
    }

    public function createPdf(Score $score)
    {
        $filename = md5($score->getId());
        $file = new \SplFileObject($this->dir . $filename . '.ly', 'w+');
        $file->fwrite($score->getMarkup());
        echo "cd $this->dir && lilypond $filename.ly";
        $log = passthru("cd $this->dir && lilypond $filename.ly");
        return $log;
    }

}
