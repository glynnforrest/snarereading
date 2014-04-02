<?php

namespace SnareReading\Controller;

use Neptune\Controller\Controller;
use Neptune\View\View;

use SnareReading\Generator\ScoreGenerator;

use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{

    protected $generator;

    public function __construct(ScoreGenerator $generator)
    {
        $this->generator = $generator;
    }

    public function indexAction(Request $request)
    {
        $master = View::load('master');
        $master->page = View::load('create');
        $form = $this->form('create');
        $form->handle($request);
        if ($form->isValid()) {
            $id = $this->generator->newScore();
            return $this->redirect('/view/' . $id);
        }
        $master->page->form = $form;
        return $master;
    }

    public function viewAction(Request $request, $id)
    {
        return $id;
    }


    public function notFoundAction(Request $request)
    {
        return 'Not found';
    }

}
