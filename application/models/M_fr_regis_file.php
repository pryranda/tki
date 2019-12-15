<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class M_fr_regis_file extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private $table = 'fr_regis_file';
    

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

    function get_all_by_id($id,$group){
        $this->db->select(
            $this->table.".id,".
            $this->table.".user_id,".
            $this->table.".name,".
            $this->table.".file,".
            "(case when ".$this->table.".group = 1 then 'KTP' 
                   when ".$this->table.".group = 2 then 'KK' 
                   when ".$this->table.".group = 3 then 'IJASAH' 
                   when ".$this->table.".group = 4 then 'AKTE' 
                   when ".$this->table.".group = 5 then 'SURAT IZIN' 
                   when ".$this->table.".group = 6 then 'BUKU NIKAH' 
                   when ".$this->table.".group = 7 then 'MEDICAL' 
                   when ".$this->table.".group = 8 then 'PASPOR' 
                   when ".$this->table.".group = 9 then 'SERTIFIKAT BLK' 
                   when ".$this->table.".group = 10 then 'ASURANSI PURNA' 
                   when ".$this->table.".group = 11 then 'JO' 
                   when ".$this->table.".group = 12 then 'VISA'
                   else '' END) as 'group'"
        );
        $this->db->where('user_id', $id);
        $this->db->where_in('group', $group);
        $query=$this->db->get($this->table);
//        echo $this->db->last_query();exit;
        if($query){
            return $query->result();
        }
        return false;
    }

    function get_file_by_id_group($id,$group){
        $this->db->where('user_id', $id);
        $this->db->where('group', $group);
        $query=$this->db->get($this->table);
        if($query){
            return $query->result();
        }
        return array();
    }

    function delete_by_id($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    function delete_by_file($file){
        $this->db->where('file', $file);
        $this->db->delete($this->table);
    }

}