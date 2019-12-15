<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class M_fr_bio_hkg extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private $table = 'hkg_form';

	function set($array){
        $this->db->set($array);
        $this->db->insert($this->table);
		return $this->db->insert_id();
    }
    
	function update_value_by_id($id,$value){
		$data = $value;
        $this->db->where('user_id', $id);
        $data = $this->db->update($this->table, $data);
//        echo $this->db->last_query();exit;
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

    function get_by_id_tki($id){
        $this->db->select(
            "*"
        );
        $this->db->where($this->table.".user_id", $id);
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

    function get_last_row(){
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query=$this->db->get($this->table);
        if($query){
            return $query->row();
        }
        return false;
    }

    function delete_by_id($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

}