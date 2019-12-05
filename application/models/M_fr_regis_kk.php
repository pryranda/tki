<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class M_fr_regis_kk extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private $table = 'fr_regis_kk';


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
            $this->table.".nama,".
            "(case when ".$this->table.".status = 1 then 'Ayah' 
                   when ".$this->table.".status = 2 then 'Ibu' 
                   when ".$this->table.".status = 3 then 'Suami' 
                   when ".$this->table.".status = 4 then 'Istri' 
                   when ".$this->table.".status = 5 then 'Anak' 
                   else '' END) as status,".
//            $this->table.".status,".
            $this->table.".umur"
        );
        $this->db->where('user_id', $id);
        $query=$this->db->get($this->table);
        if($query){
            return $query->result();
        }
        return false;
    }

}