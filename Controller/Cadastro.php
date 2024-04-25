<?php

use core\Controller;

class Cadastro extends Controller
{

    public function cadastrar_cliente()
    {
        $this->view('pages/cadastrar_cliente');
    }

    public function cadastrar_pessoa()
    {
        $this->view('pages/cadastrar_pessoa');
    }

    public function cadastrar_profissional()
    {
        $this->view('pages/cadastrar_profissional');
    }

    public function logout()
    {
        $this->view('pages/logout');
    }
}
