<?php

namespace SnareReading\Controller;

use Neptune\Controller\Controller;
use Neptune\View\View;

use SnareReading\Repository\ScoreRepositoryInterface;
use SnareReading\Music\Generator\BasicGenerator;
use SnareReading\Music\ScoreCreator;

use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{

    protected $repository;

    public function __construct(ScoreRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function indexAction(Request $request)
    {
        $master = View::load('master');
        $master->page = View::load('create');
        $form = $this->form('create');
        $form->handle($request);
        if ($form->isValid()) {
            //refactor this into a model. Just call model->createRandom($options_from_form);
            $generator = new BasicGenerator();
            $creator = new ScoreCreator($generator, $this->repository);
            $score = $creator->createRandom();
            /* return $this->redirect('/view/' . $score->getId()); */
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
