<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class M_mst_regis_keterampilan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public $table = 'm_fr_regis_keterampilan';
    public $table_fr_regis_keterampilan = 'fr_regis_keterampilan';


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

    function set_keterampilan1($array){
        $this->db->set($array);
        $this->db->insert($this->table_fr_regis_keterampilan);
        return $this->db->insert_id();
    }

    function set_keterampilan($data,$user_id){
        $this->db->where('id', $data['keterampilan_id']);
        $query=$this->db->get($this->table);
        if(!$query->row()){
            return FALSE;
        }
        if($data['value']== 1){
            $this->db->where('user_id', $user_id);
            $this->db->where('keterampilan_id', $data['keterampilan_id']);
            $query=$this->db->get($this->table_fr_regis_keterampilan);
//            echo $this->db->last_query();
//            exit;
            if($query->row()){
                return FALSE;
            }
            $array = array(
                'user_id'=>$user_id,
                'keterampilan_id'=>$data['keterampilan_id']
            );
            $this->db->set($array);
            $this->db->insert($this->table_fr_regis_keterampilan);
            return TRUE;
        }
        $this->db->where('user_id', $user_id);
        $this->db->where('keterampilan_id', $data['keterampilan_id']);
        $this->db->delete($this->table_fr_regis_keterampilan);
        return TRUE;
    }

    function get_all_by_id($user_id){
            $this->db->select(
            $this->table.".id,".
            $this->table.".keterampilan,".
            $this->table_fr_regis_keterampilan.".user_id"
        );
        $this->db->join('(select * from '.$this->table_fr_regis_keterampilan.' where '.$this->table_fr_regis_keterampilan.".user_id=". $user_id.") as ".$this->table_fr_regis_keterampilan, $this->table_fr_regis_keterampilan.'.keterampilan_id = '.$this->table.'.id', 'left');
        $this->db->order_by($this->table.".id ASC");
        $query=$this->db->get($this->table);
        if($query){
            return $query->result();
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

}