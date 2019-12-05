<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class M_mst_sg_illness extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public $table = 'sg_m_fr_illness';
    public $table_fr_illness = 'sg_fr_illness';
    public $table_m_sg_food = 'sg_m_fr_food';
    public $table_fr_food = 'sg_fr_food';


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

    function set_illness1($array){
        $this->db->set($array);
        $this->db->insert($this->table_fr_illness);
        return $this->db->insert_id();
    }

    function set_illness($data,$user_id){
        $this->db->where('id', $data['illness_id']);
        $query=$this->db->get($this->table);
        if(!$query->row()){
            return FALSE;
        }
        if($data['value']== 1){
            $this->db->where('user_id', $user_id);
            $this->db->where('illness_id', $data['illness_id']);
            $query=$this->db->get($this->table_fr_illness);
            if($query->row()){
                return FALSE;
            }
            $array = array(
                'user_id'=>$user_id,
                'illness_id'=>$data['illness_id']
            );
            $this->db->set($array);
            $this->db->insert($this->table_fr_illness);
            return TRUE;
        }
        $this->db->where('user_id', $user_id);
        $this->db->where('illness_id', $data['illness_id']);
        $this->db->delete($this->table_fr_illness);
        return TRUE;
    }

    function get_all_by_id($user_id){
            $this->db->select(
            $this->table.".id,".
            $this->table.".illness,".
            $this->table_fr_illness.".user_id"
        );
        $this->db->join('(select * from '.$this->table_fr_illness.' where '.$this->table_fr_illness.".user_id=". $user_id.") as ".$this->table_fr_illness, $this->table_fr_illness.'.illness_id = '.$this->table.'.id', 'left');
        $this->db->order_by($this->table.".id ASC");
        $query=$this->db->get($this->table);
        if($query){
            return $query->result();
        }
        return false;
    }

    function get_all_food_by_id($user_id){
        $this->db->select(
            $this->table_m_sg_food.".id,".
            $this->table_m_sg_food.".food,".
            $this->table_fr_food.".user_id"
        );
        $this->db->join('(select * from '.$this->table_fr_food.' where '.$this->table_fr_food.".user_id=". $user_id.") as ".$this->table_fr_food, $this->table_fr_food.'.food_id = '.$this->table_m_sg_food.'.id', 'left');
        $this->db->order_by($this->table_m_sg_food.".id ASC");
        $query=$this->db->get($this->table_m_sg_food);
        if($query){
            return $query->result();
        }
        return false;
    }

    function set_food($data,$user_id){
        $this->db->where('id', $data['food_id']);
        $query=$this->db->get($this->table_m_sg_food);
        if(!$query->row()){
            return FALSE;
        }
        if($data['value']== 1){
            $this->db->where('user_id', $user_id);
            $this->db->where('food_id', $data['food_id']);
            $query=$this->db->get($this->table_fr_food);
            if($query->row()){
                return FALSE;
            }
            $array = array(
                'user_id'=>$user_id,
                'food_id'=>$data['food_id']
            );
            $this->db->set($array);
            $this->db->insert($this->table_fr_food);
            return TRUE;
        }
        $this->db->where('user_id', $user_id);
        $this->db->where('food_id', $data['food_id']);
        $this->db->delete($this->table_fr_food);
        return TRUE;
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