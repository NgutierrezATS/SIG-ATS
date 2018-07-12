<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maquina extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();

        $this->load->model('maquina_model', 'maquina');
    }

	public function maquinaria()
    {
        $data['tipos'] = $this->tipo->all();
        $data['modelos'] = $this->maquina->getModelos();
        $this->load->view('templates/header');
        $this->load->view('filtro', $data);
        $this->load->view('templates/footer');
    }
     public function ejemplo(){
        $this->load->view('templates/header');
        $this->load->view('maquinas/maquinas');
        $this->load->view('templates/footer');
    }
}
