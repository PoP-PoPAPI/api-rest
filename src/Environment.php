<?php

declare(strict_types=1);

namespace PoP\RESTAPI;

class Environment
{
    public static function disableRESTAPI(): bool
    {
        return isset($_ENV['DISABLE_REST_API']) ? strtolower($_ENV['DISABLE_REST_API']) == "true" : false;
    }
}
