<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class M_fr_regis extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private $table = 'fr_regis';
    private $table_negara = 'm_tujuan_negara';
    private $table_np = 'm_np';


	function set($array){
        $this->db->set($array);
        $this->db->insert($this->table);
		return $this->db->insert_id();
    }
    
	function update_value_by_id($id,$value){
		$data = $value;
        $this->db->where('id', $id);
        $data = $this->db->update($this->table, $data);
//        echo $this->db->last_query();exit;
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

    function get_by_id_tki($id){
        $this->db->select(
            $this->table.".id,".
            $this->table.".negara_id,".
            "(case when ".$this->table.".negara_id = 1 then 'Singapura'
                   when ".$this->table.".negara_id = 2 then 'Malaysia'
                   when ".$this->table.".negara_id = 3 then 'Hongkong'
                   else '' END) as negara,".
            $this->table.".np_id,".
            $this->table.".no_kode,".
            $this->table.".tgl_masuk,".
            $this->table.".sponsor,".
            $this->table.".nama_lengkap,".
            $this->table.".no_ktp,".
            $this->table.".no_kk,".
            $this->table.".no_ijasah,".
            $this->table.".jml_kakak,".
            $this->table.".jml_adik,".
            $this->table.".pendidikan,".
            $this->table.".jenis_kelamin,".
            $this->table.".status,".
            $this->table.".agama,".
            $this->table.".no_telp,".
            $this->table.".alamat,".
            $this->table.".tempat_lahir,".
            $this->table.".tgl_lahir,".
            $this->table.".tinggi,".
            $this->table.".berat,".
            $this->table.".medical_status,".
            $this->table.".tgl_finger_medical,".
            $this->table.".photo,".
            $this->table.".file_photo,".
            $this->table.".id_rekom,".
            $this->table.".tgl_rekom,".
            $this->table.".tgl_paspor,".
            $this->table.".tgl_exp_paspor,".
            $this->table.".no_paspor,".
            $this->table.".daerah_paspor,".
            $this->table.".pl,".
            $this->table.".tgl_jo,".
            $this->table.".tgl_visa,".
            $this->table.".tgl_terbang,".
            $this->table.".no_pesawat,".
            $this->table.".jam_terbang,".
            $this->table.".masalah,".
            $this->table_negara.".negara,".
            $this->table_negara.".negara_code,".
            $this->table_np.".nama as nama_np"
        );
        $this->db->join($this->table_negara,$this->table_negara.".id=".$this->table.".negara_id","left");
        $this->db->join($this->table_np,$this->table_np.".id=".$this->table.".np_id","left");
        $this->db->where($this->table.".id", $id);
        $query=$this->db->get($this->table);
        if($query){
            return $query->row();
        }
        return false;
    }
    
    function get_all_tki(){
        $this->db->select(
            $this->table.".id,".
            $this->table.".negara_id,".
            "(case when ".$this->table.".negara_id = 1 then 'Singapura'
                   when ".$this->table.".negara_id = 2 then 'Malaysia'
                   when ".$this->table.".negara_id = 3 then 'Hongkong'
                   else '' END) as negara,".
            $this->table.".np_id,".
            $this->table.".no_kode,".
            $this->table.".tgl_masuk,".
            $this->table.".sponsor,".
            $this->table.".nama_lengkap,".
            $this->table.".no_ktp,".
            $this->table.".no_kk,".
            $this->table.".no_ijasah,".
            $this->table.".jml_kakak,".
            "(case when ".$this->table.".jenis_kelamin = 1 then 'Laki-laki' 
                   when ".$this->table.".jenis_kelamin = 2 then 'Perempuan' 
                   else '' END) as jenis_kelamin,".
            $this->table.".jml_adik,".
            $this->table.".pendidikan,".
            "(case when ".$this->table.".status = 1 then 'Belum Menikah'
                   when ".$this->table.".status = 2 then 'Menikah'
                   else '' END) as status,".
            "(case when ".$this->table.".agama = 1 then 'Islam' 
                    when ".$this->table.".agama = 2 then 'Kristen' 
                    when ".$this->table.".agama = 3 then 'Khatolik' 
                    when ".$this->table.".agama = 4 then 'Hindu' 
                    when ".$this->table.".agama = 5 then 'Budha' 
                    else  '' END) as agama,".
            $this->table.".no_telp,".
            $this->table.".alamat,".
            $this->table.".tempat_lahir,".
            $this->table.".tgl_lahir,".
            $this->table.".tinggi,".
            $this->table.".berat,".
            $this->table.".medical_status,".
            $this->table.".tgl_finger_medical,".
            $this->table.".pl,".
            $this->table.".tgl_jo,".
            $this->table.".tgl_visa,".
            $this->table.".tgl_terbang,".
            $this->table.".no_pesawat,".
            $this->table.".jam_terbang,".
            $this->table.".masalah,".
            $this->table_negara.".negara,".
            $this->table_negara.".negara_code,".
            $this->table_np.".nama as nama_np"
        );
        $this->db->join($this->table_negara,$this->table_negara.".id=".$this->table.".negara_id","left");
        $this->db->join($this->table_np,$this->table_np.".id=".$this->table.".np_id","left");
        $query=$this->db->get($this->table);
        if($query){
            return $query->result();
        }
        return array();
    }

    function get_all_tki_bio(){
        $this->db->select(
            $this->table.".id,".
            $this->table.".negara_id,".
            "(case when ".$this->table.".negara_id = 1 then 'Singapura'
                   when ".$this->table.".negara_id = 2 then 'Malaysia'
                   when ".$this->table.".negara_id = 3 then 'Hongkong'
                   else '' END) as negara,".
            $this->table.".np_id,".
            $this->table.".no_kode,".
            $this->table.".tgl_masuk,".
            $this->table.".sponsor,".
            $this->table.".nama_lengkap,".
            $this->table.".no_ktp,".
            $this->table.".no_kk,".
            $this->table.".no_ijasah,".
            $this->table.".jml_kakak,".
            "(case when ".$this->table.".jenis_kelamin = 1 then 'Laki-laki' 
                   when ".$this->table.".jenis_kelamin = 2 then 'Perempuan' 
                   else '' END) as jenis_kelamin,".
            $this->table.".jml_adik,".
            $this->table.".pendidikan,".
            "(case when ".$this->table.".status = 1 then 'Belum Menikah'
                   when ".$this->table.".status = 2 then 'Menikah'
                   else '' END) as status,".
            "(case when ".$this->table.".agama = 1 then 'Islam' 
                    when ".$this->table.".agama = 2 then 'Kristen' 
                    when ".$this->table.".agama = 3 then 'Khatolik' 
                    when ".$this->table.".agama = 4 then 'Hindu' 
                    when ".$this->table.".agama = 5 then 'Budha' 
                    else  '' END) as agama,".
            $this->table.".no_telp,".
            $this->table.".alamat,".
            $this->table.".tempat_lahir,".
            $this->table.".tgl_lahir,".
            $this->table.".tinggi,".
            $this->table.".berat,".
            $this->table.".medical_status,".
            $this->table.".tgl_finger_medical,".
            $this->table.".pl,".
            $this->table.".tgl_jo,".
            $this->table.".tgl_visa,".
            $this->table.".tgl_terbang,".
            $this->table.".no_pesawat,".
            $this->table.".jam_terbang,".
            $this->table.".masalah,".
            $this->table_negara.".negara,".
            $this->table_negara.".negara_code,".
            $this->table_np.".nama as nama_np"
        );
        $this->db->join($this->table_negara,$this->table_negara.".id=".$this->table.".negara_id","left");
        $this->db->join($this->table_np,$this->table_np.".id=".$this->table.".np_id","left");
//        $this->db->where($this->table.".negara_id",1);
        $this->db->where($this->table.".medical_status",1);
        $query=$this->db->get($this->table);
        if($query){
            return $query->result();
        }
        return array();
    }

    function get_all(){
        $query=$this->db->get($this->table);
        if($query){
            return $query->result();
        }
        return false;
    }

    function get_last_row(){
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query=$this->db->get($this->table);
        if($query){
            return $query->row();
        }
        return false;
    }

    function delete_by_id($id){
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

}