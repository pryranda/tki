<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class M_mst_mly extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private $table_m_recom = 'mly_m_recommended';
    private $table_fr_recom = 'mly_fr_recommended';


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

    function get_all_recom_by_id($user_id){
        $this->db->select(
            $this->table_m_recom.".id,".
            $this->table_m_recom.".recommended,".
            $this->table_fr_recom.".user_id"
        );
        $this->db->join('(select * from '.$this->table_fr_recom.' where '.$this->table_fr_recom.".user_id=". $user_id.") as ".$this->table_fr_recom, $this->table_fr_recom.'.recom_id = '.$this->table_m_recom.'.id', 'left');
        $this->db->order_by($this->table_m_recom.".id ASC");
        $query=$this->db->get($this->table_m_recom);
        if($query){
            return $query->result();
        }
        return false;
    }

    function set_recom($data,$user_id){
        $this->db->where('id', $data['recom_id']);
        $query=$this->db->get($this->table_m_recom);
        if(!$query->row()){
            return FALSE;
        }
        if($data['value']== 1){
            $this->db->where('user_id', $user_id);
            $this->db->where('recom_id', $data['recom_id']);
            $query=$this->db->get($this->table_fr_recom);
            if($query->row()){
                return FALSE;
            }
            $array = array(
                'user_id'=>$user_id,
                'recom_id'=>$data['recom_id']
            );
            $this->db->set($array);
            $this->db->insert($this->table_fr_recom);
            return TRUE;
        }
        $this->db->where('user_id', $user_id);
        $this->db->where('recom_id', $data['recom_id']);
        $this->db->delete($this->table_fr_recom);
        return TRUE;
    }

}