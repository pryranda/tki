<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Auth_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private $table = 'users';

    function get_data_user_by_username($username){
        $this->db->select(
            $this->table.".id,".
            $this->table.".username,".
            $this->table.".password,".
            $this->table.".email,".
            $this->table.".active,".
            $this->table.".role");
        $this->db->where($this->table.'.username', $username);
        $this->db->where($this->table.'.active', 1);
        $query=$this->db->get($this->table);
        if($query){
            return $query->row();
        }
        return false;
    }

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