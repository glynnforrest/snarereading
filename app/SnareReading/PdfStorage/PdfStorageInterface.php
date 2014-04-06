<?php

namespace SnareReading\PdfStorage;

use SnareReading\Music\Score;

/**
 * PdfStorageInterface
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
interface PdfStorageInterface
{

    public function createPdf(Score $score);

    public function getDownload(Score $score);

}
