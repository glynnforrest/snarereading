<?php

namespace SnareReading\Entity;

use Neptune\Database\Entity\Entity;

class Score extends Entity
{
    protected static $table = 'scores';
    protected static $fields = array(
        'id',
        'title',
        'notes'
    );

}
