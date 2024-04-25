<?php

namespace core;

class controller
{
    public function view($view, $dados = [])
    {
        require_once 'View/template.php';
    }
}
