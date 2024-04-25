<?php

use core\Controller;

class Login extends Controller
{

    public function logar()
    {
        $this->view('pages/logar');
    }

    public function login()
    {
        $this->view('pages/login');
    }
}
