<?php
return function(\Neptune\Routing\Router $router, $module, $prefix) {
    $router->route('/', '::controller.home', 'index');
    $router->route('/view/:id', '::controller.home', 'view');
    $router->route('/download/:id', '::controller.home', 'download');
    $router->routeAssets();
    $router->catchAll('::controller.home', 'notFound');
};