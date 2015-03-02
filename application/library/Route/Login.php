<?php

namespace JWTJP\Route;

use Respect\Rest\Routable;
use JWTJP\Business\Auth as AuthBusiness;

class Login implements Routable
{
    protected $authBusiness;

    public function __construct(AuthBusiness $authBusiness)
    {
        $this->authBusiness = $authBusiness;
    }

    public function post()
    {

    }
}