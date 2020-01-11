<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class M_chart extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private $table = 'fr_regis';
    private $table_admin = 'users';


    function get_all_total_tki(){
        $this->db->select('*');
        $query=$this->db->get($this->table);
        if($query){
            return $query->result();
        }
        return false;
    }

    function get_all_total_tki_pria(){
        $this->db->select('*');
        $this->db->where($this->table.".jenis_kelamin", 1);
        $query=$this->db->get($this->table);
        if($query){
            return $query->result();
        }
        return false;
    }

    function get_all_total_tki_wanita(){
        $this->db->select('*');
        $this->db->where($this->table.".jenis_kelamin", 2);
        $query=$this->db->get($this->table);
        if($query){
            return $query->result();
        }
        return false;
    }

    function get_all_admin(){
        $this->db->select('*');
        $query=$this->db->get($this->table_admin);
        if($query){
            return $query->result();
        }
        return false;
    }

}