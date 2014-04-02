<?php

namespace SnareReading\Form;

use Reform\Form\Form;

/**
 * CreateForm
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class CreateForm extends Form
{

    protected function init()
    {
        parent::init();
        $this->submit('Generate');
    }

}
