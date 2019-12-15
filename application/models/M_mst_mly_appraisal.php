<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class M_mst_mly_appraisal extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private $table = 'mly_m_fr_appraisal';
    private $table_fr_appraisal = 'mly_fr_appraisal';


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
            $this->table.".appraisal,".
            $this->table_fr_appraisal.".user_id,".
            $this->table_fr_appraisal.".kemampuan_val"
        );
        $this->db->join('(select * from '.$this->table_fr_appraisal.' where '.$this->table_fr_appraisal.".user_id=". $user_id.") as ".$this->table_fr_appraisal, $this->table_fr_appraisal.'.appraisal_id = '.$this->table.'.id', 'left');
        $this->db->order_by($this->table.".id ASC");
        $query=$this->db->get($this->table);
        if($query){
            return $query->result();
        }
        return false;
    }

    function set_appraisal($data,$user_id){
        $this->db->where('id', $data['appraisal_id']);
        $query=$this->db->get($this->table);
        if(!$query->row()){
            return FALSE;
        }
        $array = array(
            'user_id'=>$user_id,
            'appraisal_id'=>$data['appraisal_id'],
            'kemampuan_val'=>$data['kemampuan_val']
        );
        $this->db->where('user_id', $user_id);
        $this->db->where('appraisal_id', $data['appraisal_id']);
        $query=$this->db->get($this->table_fr_appraisal);
        if($query->row()){
            $this->db->where('user_id', $user_id);
            $this->db->where('appraisal_id', $data['appraisal_id']);
            $this->db->update($this->table_fr_appraisal, $array);
            return TRUE;
        }
        $this->db->set($array);
        $this->db->insert($this->table_fr_appraisal);
        return TRUE;

    }

}