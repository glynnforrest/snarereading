<?php

namespace Clients;

use Neptune\Core\Config;
use Neptune\Core\Neptune;

use Symfony\Component\HttpFoundation\Request;

define('ROOT', __DIR__ . '/../');

require(ROOT . 'vendor/autoload.php');
//include Application
require(ROOT . 'app/Application.php');

//Load application config
$config = Config::load('neptune', ROOT . 'config/neptune.php');
$neptune = new Neptune($config);
$neptune->loadEnv();

$app = new \Application();
$app->start($neptune);


$request = Request::createFromGlobals();
$response = $neptune->handle($request);
$response->send();
