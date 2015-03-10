<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpFoundation\Request;

$sc = include __DIR__ . '/../src/container.php';

$request = Request::createFromGlobals();

$sc->register('listener.string_response', 'Simplex\StringResponseListener');
$sc->getDefinition('dispatcher')
    ->addMethodCall('addSubscriber', [new Reference('listener.string_response')]);

$response = $sc->get('framework')->handle($request);

$response->send();
