<?php

use core\Controller;

class Home extends Controller
{

    public function index()
    {
        $this->view('pages/principal');
    }

    public function erro()
    {
        $this->view('pages/erro404');
    }

    public function logar()
    {
        $this->view('pages/logar');
    }

    public function excluir_dados_profissional()
    {
        $this->view('pages/excluir_dados_profissional');
    }
}
