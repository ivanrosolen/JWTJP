<?php

namespace JWTJP\Business;

use JWTJP\Business\User as UserBusiness;

class Auth
{
    protected $userBusiness;

    public function __construct(UserBusiness $userBusiness)
    {
        $this->userBusiness = $userBusiness;
    }

    public function authenticate($jwthash)
    {

    }
}
