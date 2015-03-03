<?php

namespace Calendar\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\FlattenException;

class ErrorController
{
    /**
     * @param FlattenException $exception
     * @return Response
     */
    public function exceptionAction(FlattenException $exception)
    {
        $msg = 'Something went wrong! (' . $exception->getMessage() . ')';

        return new Response($msg, $exception->getStatusCode());
    }
}
