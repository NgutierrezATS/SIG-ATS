<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('maquina_model', 'maquina');
        $this->load->model('tipo_model', 'tipo');
        $this->load->model('contacto_model', 'contacto');
    }

    public function index()
    {
        // die(var_dump($this->maquina->all()));
        $data['tipos'] = $this->tipo->all();
        $data['modelos'] = $this->maquina->getModelos();
        $this->load->view('templates/header');
        $this->load->view('slider');
        $this->load->view('filtro', $data);
        $this->load->view('inicio', $data);
        $this->load->view('templates/footer');
    }
    

    public function empresa()
    {
        $this->load->view('templates/header');
        $this->load->view('empresa/empresa');
        $this->load->view('templates/footer');
    }
   
    
    
}
