<?php return array (
  'dir' =>
  array (
    'neptune' => '/var/www/snarereading/vendor/glynnforrest/neptune/',
    'root' => '/var/www/snarereading/',
    'build' => 'storage/build/'
  ),
  'log' =>
  array (
    'type' =>
    array (
      'fatal' => true,
      'warn' => true,
      'debug' => true,
    ),
    'file' => 'storage/logs/logs.log',
  ),
  'cache' =>
  array (
    'default' =>
    array (
      'host' => 'localhost',
      'driver' => 'debug',
      'prefix' => '-',
    ),
  ),
  'assets' =>
  array (
    'url' => 'assets/',
  ),
  'security' => '',
  'env' => 'development',
  'modules' =>
  array (
    'snarereading' => 'app/SnareReading/',
  ),
      'view' => array(
          'dir' => 'app/SnareReading/views/'
      ),
      'forms' => array(
          'create' => 'SnareReading\Form\CreateForm'
      ),
)?>