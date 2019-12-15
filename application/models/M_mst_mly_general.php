<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class M_mst_mly_general extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private $table = 'mly_m_general';
    private $table_fr_general = 'mly_fr_general';


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

    function get_all_by_id($user_id){
        $this->db->select(
            $this->table.".id,".
            $this->table.".general,".
            $this->table_fr_general.".user_id,".
            $this->table_fr_general.".kemampuan_val"
        );
        $this->db->join('(select * from '.$this->table_fr_general.' where '.$this->table_fr_general.".user_id=". $user_id.") as ".$this->table_fr_general, $this->table_fr_general.'.general_id = '.$this->table.'.id', 'left');
        $this->db->order_by($this->table.".id ASC");
        $query=$this->db->get($this->table);
        if($query){
            return $query->result();
        }
        return false;
    }

    function set_general($data,$user_id){
        $this->db->where('id', $data['general_id']);
        $query=$this->db->get($this->table);
        if(!$query->row()){
            return FALSE;
        }
        $array = array(
            'user_id'=>$user_id,
            'general_id'=>$data['general_id'],
            'kemampuan_val'=>$data['kemampuan_val']
        );
        $this->db->where('user_id', $user_id);
        $this->db->where('general_id', $data['general_id']);
        $query=$this->db->get($this->table_fr_general);
        if($query->row()){
            $this->db->where('user_id', $user_id);
            $this->db->where('general_id', $data['general_id']);
            $this->db->update($this->table_fr_general, $array);
            return TRUE;
        }
        $this->db->set($array);
        $this->db->insert($this->table_fr_general);
        return TRUE;

    }

}