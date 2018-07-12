<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filtro extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('maquina_model', 'maquina');
        $this->load->model('tipo_model', 'tipo');
	}

	public function index($tipo)
	{
        $this->session->set_userdata('tipo', $tipo);
       
        $m = $this->maquina->all($tipo);

        $this->session->set_userdata('maquinas',$m);
        $this->load->view('templates/header');
        $this->load->view('maquinas/maquinas');
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

	public function filtrar()
    {
    	$min = explode('Metros', $this->input->post('alturamin'));
        $max = explode('Metros', $this->input->post('alturamax'));
   		$filtros = array('ALTURAMIN' => $min[0],
   					     'ALTURAMAX' => $max[0],
   					     'MARCA'     => $this->input->post('marca'),
   					     'ENERGIA'   => $this->input->post('energia'),
   					     'ID_TIPO'   => $this->session->userdata('tipo'));
   		$maquinas = $this->maquina->getMaquinas($filtros);
        $this->session->unset_userdata('maquinas');
        $this->session->set_userdata('maquinas', $maquinas);
        if ($maquinas) {
           $this->flashData($filtros); 
        }

        $html = $this->load->view('maquinas/maquinasv', $maquinas, TRUE);

   		// die(var_dump($maquinas));
        // redirect('maquinas/maquinas','refresh');
        // redirect(site_url().'/filtro/filtrada');
   		echo json_encode($html);

    }

    public function flashData($data)
    {

        $flash_msg = array('callout_class'  => 'alert alert-success alert-dismissible',
                                            'callout_title'  => '<h4>Resultados encontrados para: </h4>',
                                            'callout_text'   => '<p> Altura entre '. $data['ALTURAMIN'] .' metros y '. $data['ALTURAMAX'] .' Metros. </p>');
                        $this->session->set_flashdata($flash_msg);
    }


}

/* End of file Filtro.php */
/* Location: ./application/controllers/Filtro.php */