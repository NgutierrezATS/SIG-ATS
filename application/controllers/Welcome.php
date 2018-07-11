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

    public function buscartipo()
    {
        $data['tipos'] = $this->tipo->all();
        $data['modelos'] = $this->maquina->getModelos();
        if ($this->input->post()) {
            $id = $this->input->post('id_tipo');
            $this->session->set_userdata('id_tipo', $id);
        } else {
            $id = $this->session->userdata('id_tipo');
        }
        $data['tipo'] = (object)$this->tipo->getTipo($id);
        $data['maquinas'] = $this->maquina->filtroTipo($id);
        // die(var_dump($data));
        $this->load->view('templates/header');
        $this->load->view('filtro', $data);
        $this->load->view('maquinas/tipomaquina', $data);
        $this->load->view('templates/footer');
    }

    public function buscarmodelo()
    {
        $data['tipos'] = $this->tipo->all();
        $data['modelos'] = $this->maquina->getModelos();
        if ($this->input->post()) {
            $result = $this->input->post('modelo');
            $this->session->set_userdata('result', $result);
            $result_explode = explode('|', $result);
            $modelo = $result_explode[0];
            $id_tipo = $result_explode[1];
        } else {
            $result = $this->session->userdata('result');
            $result_explode = explode('|', $result);
            $modelo = $result_explode[0];
            $id_tipo = $result_explode[1];
            // die(var_dump($result));
        }

        $data['maquina'] = $this->maquina->filtroModelo($modelo, $id_tipo);
        $this->session->set_userdata('modelo', $data['maquina']->MODELO);
        // die(var_dump($data));

        $this->load->view('templates/header');
        $this->load->view('filtro', $data);
        $this->load->view('maquinas/modelomaquina', $data);
        $this->load->view('templates/footer');

    }

    public function maquinaria()
    {
        $data['tipos'] = $this->tipo->all();
        $data['modelos'] = $this->maquina->getModelos();
        $this->load->view('templates/header');
        $this->load->view('filtro', $data);
        $this->load->view('templates/footer');
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
       
        
        
        //$this->load->view('templates/header');
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
                //$this->sendEmailUser($data);
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
            'smtp_host' => 'ssl://mail.ats.cl',
            'smtp_port' => 465,
            'smtp_user' => 'ngutierrez',
            'smtp_pass' => 'Nino.1234',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );
        $this->email->initialize($configGmail);
        $this->email->from('contacto@ats.cl');
        $this->email->to($data['CORREO']);
        //$this->email->to($data['CORREO']);
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
        //$this->email->initialize($config);
        $this->email->from('contacto@ats.cl');
        $this->email->to('ngutierrez@ats.cl');
        $this->email->subject('Contacto desde ATS.cl');
        $this->email->message($this->contacto->bodyClient($data));

        $this->email->send();
        die(var_dump($this->email));
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

    public function empresa()
    {
        $this->load->view('templates/header');
        $this->load->view('empresa/empresa');
        $this->load->view('templates/footer');
    }
    public function ejemplo(){
        $this->load->view('templates/header');
        $this->load->view('maquinas/maquinas');
        $this->load->view('templates/footer');
    }
    public function cotizar(){
        $data['modelos'] = $this->maquina->getAlturas();
        
        $this->load->view('cotizar',$data);
        
    }
    public function filtrar()
    {
        die(var_dump($this->input->post()));
    }

    public function buscarmaquina($tipo)
    {
        $data['maquinas'] = $this->maquina->all($tipo);
        $this->load->view('templates/header');
        $this->load->view('maquinas/maquinas', $data);
        $this->load->view('templates/footer');

    }
}
