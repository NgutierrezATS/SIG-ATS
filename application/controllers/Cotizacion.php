<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizacion extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();

        $this->load->model('maquina_model', 'maquina');
        $this->load->model('contacto_model', 'contacto');
    }

	public function sendCotizacion()
    {
        if ($this->input->post()) {
            $cotizacion = array(
                'fecha' => date('Y-m-d H:i:s'),
                'nombre' => $this->input->post('nombre'),
                'empresa' => $this->input->post('empresa'),   
                'correo' => $this->input->post('email'),
                'rut' => $this->input->post('rut'),
                'direccion' => $this->input->post('direccion'),
                'ciudad' => $this->input->post('ciudad'),
                'giro' => $this->input->post('giro'),
                'numero' => $this->input->post('numero'),
                'altura' => $this->input->post('altura'),
                'mensaje' => $this->input->post('mensaje')
            );
            $this->load->library("email");
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_port' => 465,
                'smtp_user' => '',
                'smtp_pass' => '',
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'newline' => "\r\n"
            );
            $this->email->initialize($config);
            $this->email->from('contacto@ats.cl');
            $this->email->to('ngutierrez@ats.cl');
            $this->email->subject('Contacto desde ATS.cl');
            $this->email->message($this->contacto->bodyCotizacion($cotizacion));
            $this->email->send();
        }
        
    }
    public function cotizar(){
        $data['modelos'] = $this->maquina->getAlturas();
        
        $this->load->view('cotizar',$data);
        
    }
}
