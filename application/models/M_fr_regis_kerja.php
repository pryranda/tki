<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class M_fr_regis_kerja extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private $table = 'fr_regis_kerja';
    private $table_m_kerja = 'm_fr_regis_kerja';


	function set($array){
        $this->db->set($array);
        $this->db->insert($this->table);
		return $this->db->insert_id();
    }
    
	function update_value_by_id($id,$value){
		$data = $value;
        $this->db->where('id', $id);
        $data = $this->db->update($this->table, $data); 
		return $data;
    }

    function get_by_id($id){
        $this->db->where('id', $id);
        $query=$this->db->get($this->table);
        if($query){
            return $query->row();
        }
        return false;
    }
    
    function get_all(){
        $query=$this->db->get($this->table);
        if($query){
            return $query->result();
        }
        return false;
    }

    function delete_by_id($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    function get_all_by_id($id){
        $this->db->select(
            $this->table.".id,".
            $this->table.".user_id,".
            $this->table.".peng_negara_id,".
            $this->table.".tahun,".
            $this->table.".dari,".
            $this->table.".sampai,".
            $this->table.".kota,".
            $this->table_m_kerja.".peng_negara"
        );
        $this->db->join($this->table_m_kerja, $this->table_m_kerja.'.id = '.$this->table.'.peng_negara_id', 'left');
        $this->db->where('user_id', $id);
        $query=$this->db->get($this->table);
        if($query){
            return $query->result();
        }
        return false;
    }

}