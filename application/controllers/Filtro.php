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
		$data['maquinas'] = $this->maquina->all($tipo);
        $this->load->view('templates/header');
        $this->load->view('maquinas/maquinas', $data);
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
        die(var_dump($this->input->post()));
    }

}

/* End of file Filtro.php */
/* Location: ./application/controllers/Filtro.php */