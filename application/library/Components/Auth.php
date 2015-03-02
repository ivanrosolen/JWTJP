<?php
namespace JWTJP\Components;

class Auth
{

    public function check()
    {
        // validate JWT
        return true;

        header('HTTP/1.1 403 You must be authenticated to access that URL');
        header('Location: /login');

        return false;
    }
}