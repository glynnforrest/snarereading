<?php

namespace SnareReading\Controller;

use Neptune\Controller\Controller;
use Neptune\View\View;

use SnareReading\Model\ScoreModel;

use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{

    protected $score_model;

    public function __construct(ScoreModel $model)
    {
        $this->score_model = $model;
    }

    public function indexAction(Request $request)
    {
        $master = View::load('master');
        $master->page = View::load('create');
        $form = $this->form('create');
        $form->handle($request);
        if ($form->isValid()) {
            $score = $this->score_model->createRandomAndSave();

            return $this->redirect('/view/' . $score->getId());
        }
        $master->page->form = $form;

        return $master;
    }

    public function viewAction(Request $request, $id)
    {
        $master = View::load('master');
        $master->page = View::load('view');
        $master->page->score = $this->score_model->findById($id);
        return $master;
    }

    public function downloadAction(Request $request, $id)
    {
        $response = $this->score_model->getDownloadById($id);
        $response->prepare($request);
        return $response;
    }

    public function notFoundAction(Request $request)
    {
        return 'Not found';
    }

}
