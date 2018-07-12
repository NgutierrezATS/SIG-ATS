<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller
{

	 public function __construct()
    {
        parent::__construct();
        $this->load->model('tipo_model', 'tipo');
        $this->load->model('contacto_model', 'contacto');
    }

	public function Contacto()
    {
        $this->load->helper('form');
        $data['tipos'] = $this->tipo->all();
        $this->load->view('templates/header');
        $this->load->view('contacto/contacto',$data);
        $this->load->view('templates/footer');
    }

     public function sendContacto(){
        if ($this->input->post()) {
            $tipo = $this->input->post('tipo');
            $rut = $this->input->post('rut');
            $correo = $this->input->post('email');
            $numero = $this->input->post('numero');
            $empresa = $this->input->post('empresa');
            $mensaje = $this->input->post('mensaje');
            
            if ((empty($correo)) || (empty($tipo)) || (empty($numero)) || (empty($empresa))) {
                //$this->contacto();
                redirect('welcome/Contacto', 'refresh ');
                

            } else {
                $now = date('Y-m-d H:i:s');
                $data = array(
                    'RUT' => $rut,
                    'EMPRESA' => $empresa,
                    'CORREO' => $correo,
                    'NUMERO' => $numero,
                    'FECHA_CONTACTO' => $now,
                    'TIPO' => $tipo,
                    'MENSAJE' => $mensaje
                );

                //$this->contacto->insert($data);
                $this->sendEmailUser($data);
                $this->sendEmailClient($data);
                redirect('welcome/contactoSuccess', 'refresh');
            }
        }
        else{
             die(var_dump($this->input->post()));
        }
        //$this->load->view('templates/footer');

    }
    public function contactoSuccess()
    {
        $this->load->view('templates/header');
        $this->load->view('contacto/success');
        $this->load->view('templates/footer');
    }

    public function sendEmailUser($data)
    {
        $this->load->library("email");
        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.ats.cl',
            'smtp_port' => 26,
            'smtp_user' => 'ngutierrez@ats.cl',
            'smtp_pass' => 'Nino.1234',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );
        $this->email->initialize($configGmail);
        $this->email->from('contacto@ats.cl');
        $this->email->to($data['CORREO']);
        $this->email->subject('Contacto desde ATS.cl');
        $this->email->message($this->contacto->bodyUser($data));
        $this->email->send();
    }

    public function sendEmailClient($data)
    {
        
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.ats.cl',
            'smtp_port' => 26,
            'smtp_user' => 'ngutierrez@ats.cl',
            'smtp_pass' => 'Nino.1234',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );
        $this->load->library("email",$config);
        $this->email->from('contacto@ats.cl');
        $this->email->to($data['CORREO']);
        $this->email->subject('Contacto desde ATS.cl');
        $this->email->message($this->contacto->bodyClient($data));

        $this->email->send();
        //die(var_dump($this->email));
    }

}
