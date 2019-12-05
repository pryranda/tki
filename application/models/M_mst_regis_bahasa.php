<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class M_mst_regis_bahasa extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private $table = 'm_fr_regis_bahasa';
    private $table_fr_regis_bahasa = 'fr_regis_bahasa';


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

    function set_bahasa($data,$user_id){
        $this->db->where('id', $data['bahasa_id']);
        $query=$this->db->get($this->table);
//        echo $this->db->last_query();
//            exit;
        if(!$query->row()){
            return FALSE;
        }
        $array = array(
            'user_id'=>$user_id,
            'bahasa_id'=>$data['bahasa_id'],
            'kemampuan_val'=>$data['kemampuan_val']
        );
        $this->db->where('user_id', $user_id);
        $this->db->where('bahasa_id', $data['bahasa_id']);
        $query=$this->db->get($this->table_fr_regis_bahasa);
//        echo $this->db->last_query();
//        exit;
        if($query->row()){
            $this->db->where('user_id', $user_id);
            $this->db->where('bahasa_id', $data['bahasa_id']);
            $this->db->update($this->table_fr_regis_bahasa, $array);
            return TRUE;
        }
        $this->db->set($array);
        $this->db->insert($this->table_fr_regis_bahasa);
        return TRUE;

    }

    function get_all_by_id($user_id){
        $this->db->select(
            $this->table.".id,".
            $this->table.".bahasa,".
            $this->table_fr_regis_bahasa.".user_id,".
            $this->table_fr_regis_bahasa.".kemampuan_val"
        );
        $this->db->join('(select * from '.$this->table_fr_regis_bahasa.' where '.$this->table_fr_regis_bahasa.".user_id=". $user_id.") as ".$this->table_fr_regis_bahasa, $this->table_fr_regis_bahasa.'.bahasa_id = '.$this->table.'.id', 'left');
        $this->db->order_by($this->table.".id ASC");
        $query=$this->db->get($this->table);
        if($query){
            return $query->result();
        }
        return false;
    }

}