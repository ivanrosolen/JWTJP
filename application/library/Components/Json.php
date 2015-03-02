<?php

namespace JWTJP\Components;

class Json
{
    public function __invoke(Array $data)
    {
        if (!headers_sent()) {
            header('Content-type: application/json');
        }
        return json_encode($data);
    }
}