<?php

use Symfony\Component\DependencyInjection;
use Symfony\Component\DependencyInjection\Reference;

$sc = new DependencyInjection\ContainerBuilder();
$sc->register('context', 'Symfony\Component\Routing\RequestContext');
$sc->setParameter('routes', include __DIR__ . '/../src/app.php');
$sc->register('matcher', 'Symfony\Component\Routing\Matcher\UrlMatcher')
    ->setArguments(['%routes%', new Reference('context')]);
$sc->register('resolver', 'Symfony\Component\HttpKernel\Controller\ControllerResolver');
$sc->register('listener.router', 'Symfony\Component\HttpKernel\EventListener\RouterListener')
    ->setArguments([new Reference('matcher')]);
$sc->setParameter('charset', 'UTF-8');
$sc->register('listener.response', 'Symfony\Component\HttpKernel\EventListener\ResponseListener')
    ->setArguments(['%charset%']);
$sc->register('listener.exception', 'Symfony\Component\HttpKernel\EventListener\ExceptionListener')
    ->setArguments(['Calendar\\Controller\\ErrorController::exceptionAction']);
$sc->register('dispatcher', 'Symfony\Component\EventDispatcher\EventDispatcher')
    ->addMethodCall('addSubscriber', [new Reference('listener.router')])
    ->addMethodCall('addSubscriber', [new Reference('listener.response')])
    ->addMethodCall('addSubscriber', [new Reference('listener.exception')]);
$sc->register('framework', 'Simplex\Framework')
    ->setArguments([new Reference('dispatcher'), new Reference('resolver')]);

return $sc;
