<?php

namespace JWJWTJPTAP\Route;

use Respect\Rest\Routable;
use JWTJWTJPAP\Business\Book as BookBusiness;

class Book implements Routable
{
    protected $bookBusiness;

    public function __construct(BookBusiness $bookBusiness)
    {
        $this->bookBusiness = $bookBusiness;
    }

    public function get()
    {

    }

    public function post()
    {

    }

    public function put()
    {

    }

    public function delete()
    {

    }
}