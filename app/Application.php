<?php

use Neptune\Core\Neptune;
use Neptune\Service\SessionService;
use Neptune\Service\MonologService;
use Neptune\Service\SecurityService;
use Neptune\Service\FormService;
use Neptune\Service\DatabaseService;
use Neptune\Security\Resolver\RedirectResolver;

/**
 * Application
 *
 * @author Glynn Forrest <me@glynnforrest.com>
 **/
class Application
{

    public function start(Neptune $neptune)
    {
        $d = $neptune['router'];

        $d->routeModule('snarereading');

        if (!class_exists('Assets')) {
            class_alias('Neptune\Assets\Assets', 'Assets');
        }

        $neptune->addService(new MonologService());
        $neptune->addService(new SessionService());
        /* $neptune->addService(new SecurityService()); */
        $neptune->addService(new FormService());
        $neptune->addService(new DatabaseService());

        /* $neptune['security.resolver']->add( */
        /*     new RedirectResolver('/login', '/restricted') */
        /* ); */

        /* $neptune['security.resolver']->push( */
        /*     new \Neptune\Security\Resolver\LoggerResolver($neptune['logger']) */
        /* ); */

        $neptune['repo.score'] = function($neptune) {
            return new \SnareReading\Repository\ScoreDatabaseRepository($neptune['db']);
        };

        $neptune['pdfstorage'] = function($neptune) {
            $dir = $neptune['config']->getPath('dir.build');
            return new \SnareReading\PdfStorage\FilePdfStorage($dir);
        };

        $neptune['model.score'] = function($neptune) {
            return new \SnareReading\Model\ScoreModel($neptune['repo.score'], $neptune['pdfstorage']);
        };

        $neptune['controller.home'] = function($neptune) {
            return new \SnareReading\Controller\HomeController($neptune['model.score']);
        };
    }

    public function developmentEnv()
    {
        $neptune['mailer'] = function($neptune) {
            return new DebugMailer();
        };
    }

    public function console(Neptune $neptune, $output)
    {
        $neptune['dispatcher']->addSubscriber(new \Neptune\Database\EventListener\ConsoleListener($output));
    }


}
