<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class M_mst_menu extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private $table = 'menu';
    private $table_users = 'users';
    private $table_users_groups = 'users_groups';
    private $table_groups = 'groups';
    private $table_group_menu = 'group_menu';


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

    function get_all_by_group($group){
        $this->db->select(
            $this->table.".id,".
            $this->table.".menu,".
            $this->table.".controllers,".
            $this->table.".icon,".
            $this->table.".urutan"
        );
        $this->db->join($this->table_users_groups, $this->table_users.'.id = '.$this->table_users_groups.'.user_id', 'left');
        $this->db->join($this->table_groups, $this->table_users_groups.'.group_id = '.$this->table_groups.'.id', 'left');
        $this->db->join($this->table_group_menu, $this->table_groups.'.id = '.$this->table_group_menu.'.group_id', 'left');
        $this->db->join($this->table, $this->table_group_menu.'.menu_id = '.$this->table.'.id', 'left');
        $this->db->where($this->table_users.".id", $group);
        $this->db->order_by($this->table.".urutan ASC");
        $query=$this->db->get($this->table_users);
//        echo $this->db->last_query();exit;
        if($query){
            return $query->result();
        }
        return false;
    }
}