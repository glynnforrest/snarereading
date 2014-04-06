<?php

namespace SnareReading\PdfStorage;

use SnareReading\Music\Score;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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
        $log = passthru("cd $this->dir && lilypond $filename.ly");

        return $log;
    }

    public function getDownload(Score $score)
    {
        $filename = $this->dir . md5($score->getId()) . '.pdf';
        if (!file_exists($filename)) {
            throw new \Exception("Score not found: $filename");
        }

        $response = new BinaryFileResponse($filename);
        $response->headers->set('Content-Type', 'application/pdf');

        return $response;
    }

}
