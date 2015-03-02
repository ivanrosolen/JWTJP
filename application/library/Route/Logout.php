<?php

namespace JWTJP\Route;

use Respect\Rest\Routable;

class Logout implements Routable
{
    public function get()
    {
        // expire jwt token

        header('Location: /');
    }
}