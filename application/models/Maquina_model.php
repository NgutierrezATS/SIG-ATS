<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maquina_model extends CI_Model {

	private $table = 'MAQUINA';
    private $id = 'MODELO';
    private $id_tipo = 'ID_TIPO';
    private $altura_trabajo = 'ALTURA_TRABAJO';
    private $select1 = 'ID_TIPO, ID_FOTO, MODELO, TIPO, ENERGIA, MARCA, ALTURA_TRABAJO, ALTURA_PLATAFORMA, ALTO_BARANDA, LARGO_REPLEGADA, LARGO_PLATAFORMA, ANCHO_PLATAFORMA, CAPACIDAD, PESO, FICHA';

    private $select2 = 'ID_TIPO, ID_FOTO, MODELO, TIPO, ENERGIA, MARCA, CARGA_MAXIMA, ALCANCE_MAXIMO, ALTURA_LEVANTAMIENTO, BRAZO_EXTENDIDO, PESO, FICHA';

    private $select3 = 'ID_TIPO, ID_FOTO, MODELO, TIPO, ENERGIA, MARCA, ALTURA, ANCHO_REPLEGADO, ANCHO_EXTENDIDO, TORRE_REPLEGADA, TOMA_CORRIENTE, LAMPARA_HALOGENA, GENERADOR, PESO, FICHA';

    private $table_tipo = 'TIPO';
    private $join_tipo  = 'TIPO.ID = MAQUINA.ID_TIPO';
    private $table_foto = 'FOTO'; 
    private $join_foto  = 'FOTO.ID = MAQUINA.ID_FOTO';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();	
	}

	public function all($tipo)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->table_foto, $this->join_foto);
        $this->db->join($this->table_tipo, $this->join_tipo);
        $this->db->where($this->id_tipo, $tipo);
        $query = $this->db->get();

        return $query->result();
    }

    public function getModelos()
    {
    	$this->db->select($this->id);
        $this->db->select($this->id_tipo);
    	$this->db->from($this->table);
    	$query = $this->db->get();

        return $query->result();
    }
    public function getAlturas()
    {
        $this->db->select($this->altura_trabajo);
        $this->db->from($this->table);
        $this->db->where("ALTURA_TRABAJO IS NOT NULL");
        $this->db->order_by("ALTURA_TRABAJO","asc");
        $query = $this->db->get();

        return $query->result();
    }

    public function filtroTipo($tipo)
    {
        // die(var_dump($tipo));
        if ($tipo == 1 || $tipo == 2 || $tipo == 3) {
            $this->db->select($this->select1);
        }else if ($tipo == 4) {
            $this->db->select($this->select2);
        }else if ($tipo == 5) {
            $this->db->select($this->select3);
        }
            $this->db->from ($this->table);
            $this->db->join($this->table_tipo, $this->join_tipo);
            $this->db->where($this->id_tipo, $tipo);
            $q = $this->db->get();
            return $q->result();
    }

    public function filtroModelo($modelo,$tipo)
    {
        if ($tipo == 1 || $tipo == 2 || $tipo == 3) {
            $this->db->select($this->select1);
        }else if ($tipo == 4) {
            $this->db->select($this->select2);
        }else if ($tipo == 5) {
            $this->db->select($this->select3);
        }
        $this->db->from($this->table);
        $this->db->join($this->table_tipo, $this->join_tipo);
        $this->db->where($this->id, $modelo);
        $query = $this->db->get();

        return $query->row();
    }

    public function getMaquinas($data)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->table_foto, $this->join_foto);
        $this->db->join($this->table_tipo, $this->join_tipo);
        $this->db->where($this->id_tipo, $data['ID_TIPO']);
        if ($data['ID_TIPO'] == 1 || $data['ID_TIPO'] == 2 || $data['ID_TIPO'] == 3) {
            $this->db->where('ALTURA_TRABAJO >= '.$data['ALTURAMIN'].' AND ALTURA_TRABAJO <= '.$data['ALTURAMAX'].'');
        }else if($data['ID_TIPO'] == 4){
            $this->db->where('ALTURA_LEVANTAMIENTO >= '.$data['ALTURAMIN'].' AND ALTURA_LEVANTAMIENTO <= '.$data['ALTURAMAX'].'');
        }else if($data['ID_TIPO'] == 5){
            $this->db->where('ALTURA >= '.$data['ALTURAMIN'].' AND ALTURA <= '.$data['ALTURAMAX'].'');
        }

        if ($data['MARCA'] != NULL && $data['ENERGIA'] != NULL) {
            $this->db->where('MARCA', $data['MARCA']);
            $this->db->where('ENERGIA', $data['ENERGIA']);   
        }else if($data['ENERGIA'] != NULL){
            $this->db->where('ENERGIA', $data['ENERGIA']);
        }else if ($data['MARCA'] != NULL) {
            $this->db->where('MARCA', $data['MARCA']);
            
        }
            
        $q = $this->db->get();
            return $q->result();
    }

}

/* End of file maquina.php */
/* Location: ./application/models/maquina.php */