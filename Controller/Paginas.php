<?php

use core\controller;

class Paginas extends controller
{

    public function index()
    {
        $this->view('pages/principal');
    }

    public function cadastro_profissional()
    {
        $this->view('pages/cadastro_profissional');
    }

    public function cadastro_pessoa()
    {
        $this->view('pages/cadastro_pessoa');
    }

    public function profissionais()
    {
        $this->view('pages/profissionais');
    }

    public function perfil_profissional()
    {
        $this->view('pages/perfil_profissional');
    }

    public function editar_perfil_cliente()
    {
        $this->view('pages/editar_perfil_cliente');
    }

    public function editar_perfil_profissional()
    {
        $this->view('pages/editar_perfil_profissional');
    }
}
