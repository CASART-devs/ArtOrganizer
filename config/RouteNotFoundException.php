<?php

namespace artorganizer\Exception;
use Exception;
use Throwable;


class RouteNotFoundException extends Exception
{
    function __construct(string $message = "Pagina não encontrada", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}