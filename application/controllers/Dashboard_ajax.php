<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_ajax extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        if(!$this->session->userdata('username')){
            redirect('login');
            exit;
        }
    }

    public function register_get($id="")
    {

        $this->load->model('m_fr_regis');
        if($id==""){
            //get all
            $data=$this->m_fr_regis->get_all_tki();
            echo json_encode(array(
                'is_error'=>false,
                'data'=> $data
            ));
            return;
        }

        $this->form_validation->set_data(array(
            'id'    =>  $id
        ));
        $this->form_validation->set_rules('id', 'id user', 'trim|required|numeric');

        if ($this->form_validation->run()) {
            $id=$this->form_validation->set_value('id');
            $data=$this->m_fr_regis->get_by_id_tki($id);
            echo json_encode(array(
                'is_error'=>false,
                'data'=> $data
            ));
            return;
        }
    }

    public function register_insert()
    {
        $this->load->model(array(
            'm_fr_regis',
            'm_fr_bio_sgp'));
        header('Content-Type: application/json');
        // Create no_kode
        $get_row = $this->m_fr_regis->get_last_row();
        if ($get_row){
            $cek_id = $get_row->id;
            $no_urut = $cek_id + 1;
        }else{
            $no_urut = 1;
        }
        $no_kode = date("Y")."/".date("m")."/".date("d")."/".$no_urut;

        $this->form_validation->set_rules('negara', "Negara Tujuan", 'trim|max_length[50]');
        $this->form_validation->set_rules('nama', "Nama", 'trim|max_length[250]');
        $this->form_validation->set_rules('no_ktp', "No KTP", 'trim|integer|max_length[25]');

        if ($this->form_validation->run()) {
            $negara=$this->form_validation->set_value('negara');
            $nama=$this->form_validation->set_value('nama');
            $no_ktp=$this->form_validation->set_value('no_ktp');

            $data=array('negara_id' => $negara,
                        'no_kode' => $no_kode,
                        'nama_lengkap' => $nama,
                        'no_ktp' => $no_ktp,
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s")
            );
            $data=$this->m_fr_regis->set($data);
            $data2=array('user_id' => $this->db->insert_id(),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            );
            $this->m_fr_bio_sgp->set($data2);
            echo json_encode(array(
                'is_error'=>false,
                'id'=>$data
            ));
            return;
        }

        $this->form_validation->set_message('max_length', '%s: Maksimal karakter yang digunakan adalah %s');

        return print(json_encode(array(
            'is_error'=>true,
            'error_message'=>  validation_errors()
        )));
    }

    public function register_update()
    {

        $this->load->model('m_fr_regis');
        $this->form_validation->set_rules('id', "Id User", 'trim|numeric');
        $this->form_validation->set_rules('negara', "Negara Tujuan", 'trim|max_length[50]');
        $this->form_validation->set_rules('no_kode', "No kode", 'trim|max_length[50]');
        $this->form_validation->set_rules('tgl_msk', "Tanggal Masuk", 'trim|max_length[50]');
        $this->form_validation->set_rules('sponsor', "Sponsor", 'trim|max_length[50]');
        $this->form_validation->set_rules('np', "Numpang Proses", 'trim|max_length[50]');
        $this->form_validation->set_rules('nama', "Nama", 'trim|max_length[250]');
        $this->form_validation->set_rules('tmp_lahir', "Tempat Lahir", 'trim|max_length[250]');
        $this->form_validation->set_rules('tgl_lahir', "Tanggal Lahir", 'trim|max_length[250]');
        $this->form_validation->set_rules('jk', "Jenis Kelamin", 'trim|max_length[250]');
        $this->form_validation->set_rules('alamat', "Alamat", 'trim|max_length[250]');
        $this->form_validation->set_rules('no_ktp', "No KTP", 'trim|integer|max_length[50]');
        $this->form_validation->set_rules('no_kk', "No KK", 'trim|integer|max_length[50]');
        $this->form_validation->set_rules('kakak', "Jumlah Kakak", 'trim|max_length[250]');
        $this->form_validation->set_rules('adik', "Jumlah Adik", 'trim|max_length[250]');
        $this->form_validation->set_rules('pendidikan', "Pendidikan", 'trim|max_length[250]');
        $this->form_validation->set_rules('ijasah', "Ijasah", 'trim|max_length[50]');
        $this->form_validation->set_rules('status', "Status", 'trim|max_length[25]');
        $this->form_validation->set_rules('agama', "Agama", 'trim|max_length[15]');
        $this->form_validation->set_rules('no_tlp', "No Telp", 'trim|max_length[25]');
        $this->form_validation->set_rules('tinggi', "Tinggi", 'trim|integer|max_length[10]');
        $this->form_validation->set_rules('berat', "Berat", 'trim|integer|max_length[10]');
        $this->form_validation->set_rules('hasil_medical', "Hasil Medical", 'trim|integer|max_length[10]');
        $this->form_validation->set_rules('tgl_medical', "Tanggal Medical", 'trim|max_length[250]');

        if ($this->form_validation->run()) {

            $id=$this->form_validation->set_value('id');
            $no_kode=$this->form_validation->set_value('no_kode');
            $negara=$this->form_validation->set_value('negara');
            $tgl_msk=$this->form_validation->set_value('tgl_msk');
            $sponsor=$this->form_validation->set_value('sponsor');
            $np=$this->form_validation->set_value('np');
            $nama=$this->form_validation->set_value('nama');
            $tmp_lahir=$this->form_validation->set_value('tmp_lahir');
            $tgl_lahir=$this->form_validation->set_value('tgl_lahir');
            $jk=$this->form_validation->set_value('jk');
            $alamat=$this->form_validation->set_value('alamat');
            $no_ktp=$this->form_validation->set_value('no_ktp');
            $no_kk=$this->form_validation->set_value('no_kk');
            $kakak=$this->form_validation->set_value('kakak');
            $adik=$this->form_validation->set_value('adik');
            $pendidikan=$this->form_validation->set_value('pendidikan');
            $ijasah=$this->form_validation->set_value('ijasah');
            $status=$this->form_validation->set_value('status');
            $agama=$this->form_validation->set_value('agama');
            $no_tlp=$this->form_validation->set_value('no_tlp');
            $tinggi=$this->form_validation->set_value('tinggi');
            $berat=$this->form_validation->set_value('berat');
            $hasil_medical=$this->form_validation->set_value('hasil_medical');
            $tgl_medical=$this->form_validation->set_value('tgl_medical');

            $data=array(
                        'negara_id' => $negara,
                        'no_kode' => $no_kode,
                        'tgl_masuk' => $tgl_msk,
                        'sponsor' => $sponsor,
                        'np_id' => $np,
                        'nama_lengkap' => $nama,
                        'tempat_lahir' => $tmp_lahir,
                        'tgl_lahir' => $tgl_lahir,
                        'jenis_kelamin' => $jk,
                        'alamat' => $alamat,
                        'no_ktp' => $no_ktp,
                        'no_kk' => $no_kk,
                        'jml_kakak' => $kakak,
                        'jml_adik' => $adik,
                        'pendidikan' => $pendidikan,
                        'no_ijasah' => $ijasah,
                        'status' => $status,
                        'agama' => $agama,
                        'no_telp' => $no_tlp,
                        'tinggi' => $tinggi,
                        'berat' => $berat,
                        'medical_status' => $hasil_medical,
                        'tgl_finger_medical' => $tgl_medical,
                        'updated_at' => date("Y-m-d H:i:s"));

            $data=$this->m_fr_regis->update_value_by_id($id,$data);
            echo json_encode(array(
                'is_error'=>false,
                'id'=>$data
            ));
            return false;
        }
    }

    public function ajax_set_keterampilan(){
        $this->load->model('m_mst_regis_keterampilan');

        $this->form_validation->set_rules('keterampilan', "Keterampilan", 'trim|integer');
        $this->form_validation->set_rules('value', "Value", 'trim|integer');
        $this->form_validation->set_rules('user_id', "Id User", 'trim|numeric');


        if($this->form_validation->run()){

            $keterampilan=$this->form_validation->set_value('keterampilan');
            $value=$this->form_validation->set_value('value');
            $user_id=$this->form_validation->set_value('user_id');
//            $id=$this->get_user_id();
            $data=array(
                'keterampilan_id'=>$keterampilan,
                'value'=>$value
            );
            $data=$this->m_mst_regis_keterampilan->set_keterampilan($data,$user_id);

            return print(json_encode(array(
                'is_error'=>false,
                'data'=>$data
            )));

        }

        return print(json_encode(array(
            'is_error'=>true,
            'error_message'=>  validation_errors()
        )));
    }

    public function ajax_set_bahasa(){
        $this->load->model('m_mst_regis_bahasa');

        $this->form_validation->set_rules('bahasa1_val', "bahasa1_val", 'trim|integer');
        $this->form_validation->set_rules('bahasa_id', "bahasa_id", 'trim|integer');
        $this->form_validation->set_rules('user_id', "Id User", 'trim|numeric');


        if($this->form_validation->run()){

            $bahasa1_val=$this->form_validation->set_value('bahasa1_val');
            $bahasa_id=$this->form_validation->set_value('bahasa_id');
            $user_id=$this->form_validation->set_value('user_id');
//            $id=$this->get_user_id();
            $data=array(
                'bahasa_id'=>$bahasa_id,
                'kemampuan_val'=>$bahasa1_val
            );
            $data=$this->m_mst_regis_bahasa->set_bahasa($data,$user_id);

            return print(json_encode(array(
                'is_error'=>false,
                'data'=>$data
            )));

        }

        return print(json_encode(array(
            'is_error'=>true,
            'error_message'=>  validation_errors()
        )));
    }

    public function ajax_addkk()
    {
        $this->load->model('m_fr_regis_kk');
        header('Content-Type: application/json');

        $this->form_validation->set_rules('status', "Status", 'trim|max_length[50]');
        $this->form_validation->set_rules('nama', "Nama", 'trim|max_length[250]');
        $this->form_validation->set_rules('umur', "Umur", 'trim|integer|max_length[25]');
        $this->form_validation->set_rules('user_id', "Id User", 'trim|numeric');

        if ($this->form_validation->run()) {
            $status=$this->form_validation->set_value('status');
            $nama=$this->form_validation->set_value('nama');
            $umur=$this->form_validation->set_value('umur');
            $user_id=$this->form_validation->set_value('user_id');

            $data=array('status' => $status,
                'nama' => $nama,
                'umur' => $umur,
                'user_id' => $user_id,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            );
            $data=$this->m_fr_regis_kk->set($data);
            echo json_encode(array(
                'is_error'=>false,
                'id'=>$data
            ));
            return;
        }

        $this->form_validation->set_message('max_length', '%s: Maksimal karakter yang digunakan adalah %s');

        return print(json_encode(array(
            'is_error'=>true,
            'error_message'=>  validation_errors()
        )));
    }

    public function kk_get($id="")
    {
        $this->load->model('m_fr_regis_kk');

        $this->form_validation->set_data(array(
            'id'    =>  $id
        ));
        $this->form_validation->set_rules('id', 'id user', 'trim|required|numeric');

        if ($this->form_validation->run()) {
            $id=$this->form_validation->set_value('id');
            $data=$this->m_fr_regis_kk->get_all_by_id($id);
            echo json_encode(array(
                'is_error'=>false,
                'data'=> $data
            ));
            return;
        }
    }

    public function kk_delete($id="")
    {
        $this->load->model('m_fr_regis_kk');
        $id=$this->input->post('id');
        $data=$this->m_fr_regis_kk->delete_by_id($id);
        echo json_encode(array(
            'is_error'=>false,
            'id'=>$data
        ));
        return;
    }

    public function ajax_addker()
    {
        $this->load->model('m_fr_regis_kerja');
        header('Content-Type: application/json');

        $this->form_validation->set_rules('negara', "Negara", 'trim|numeric');
        $this->form_validation->set_rules('dari', "Dari", 'trim|numeric');
        $this->form_validation->set_rules('sampai', "Sampai", 'trim|numeric');
        $this->form_validation->set_rules('kota', "Kota", 'trim|max_length[50]');
        $this->form_validation->set_rules('user_id', "User ID", 'trim|numeric');

        if ($this->form_validation->run()) {
            $negara=$this->form_validation->set_value('negara');
            $dari=$this->form_validation->set_value('dari');
            $sampai=$this->form_validation->set_value('sampai');
            $kota=$this->form_validation->set_value('kota');
            $user_id=$this->form_validation->set_value('user_id');

            $data=array('peng_negara_id' => $negara,
                'dari' => $dari,
                'sampai' => $sampai,
                'kota' => $kota,
                'user_id' => $user_id,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            );
            $data=$this->m_fr_regis_kerja->set($data);
            echo json_encode(array(
                'is_error'=>false,
                'id'=>$data
            ));
            return;
        }

        $this->form_validation->set_message('max_length', '%s: Maksimal karakter yang digunakan adalah %s');

        return print(json_encode(array(
            'is_error'=>true,
            'error_message'=>  validation_errors()
        )));
    }

    public function ker_get($id="")
    {
        $this->load->model('m_fr_regis_kerja');

        $this->form_validation->set_data(array(
            'id'    =>  $id
        ));
        $this->form_validation->set_rules('id', 'id user', 'trim|required|numeric');

        if ($this->form_validation->run()) {
            $id=$this->form_validation->set_value('id');
            $data=$this->m_fr_regis_kerja->get_all_by_id($id);
            echo json_encode(array(
                'is_error'=>false,
                'data'=> $data
            ));
            return;
        }
    }

    public function ker_delete($id="")
    {
        $this->load->model('m_fr_regis_kerja');

        $id=$this->input->post('id');
        $data=$this->m_fr_regis_kerja->delete_by_id($id);
        echo json_encode(array(
            'is_error'=>false,
            'id'=>$data
        ));
        return;
    }

    function do_upload(){
        $this->load->model('m_fr_regis_file');

        $config['upload_path']='./assets/images/';
//        $config['upload_path']=APPPATH . 'assets/images/';
//        $config['upload_path']='/Applications/XAMPP/xamppfiles/htdocs/TKI/assets/images/';
        $config['allowed_types']='gif|jpg|png|psd|jpeg|jpg2|jpe|j2k|jpf|jpm|pdf|svg';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 5000;

        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('file'))
        {
//            $error = array('error' => $this->upload->display_errors());
            echo $this->upload->display_errors();
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $jenis_file = $this->input->post('jenis_file');
            $image = $data['upload_data']['file_name'];
            $id = $this->input->post('user_id');
            $filename = $this->input->post('filename');

            $data_db = array('name' => $filename,
                'group' => $jenis_file,
                'user_id' => $id,
                'file' => $image,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),

            );

            $result = $this->m_fr_regis_file->set($data_db);
//                echo json_decode($result);
            echo json_encode(array(
                'is_error'=>false,
                'id'=>$result,
            ));
        }

    }

    function do_upload2(){
        $this->load->model('m_fr_regis_file');

        $config['upload_path']='./assets/images/';
        $config['allowed_types']='gif|jpg|png|psd|jpeg|jpg2|jpe|j2k|jpf|jpm|pdf|svg';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 5000;

        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('file'))
        {
            echo $this->upload->display_errors();
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $jenis_file = $this->input->post('jenis_file');
            $image = $data['upload_data']['file_name'];
            $id = $this->input->post('user_id');
            $filename = $this->input->post('filename');

            $data_db = array('name' => $filename,
                'group' => $jenis_file,
                'user_id' => $id,
                'file' => $image,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),

            );

            $result = $this->m_fr_regis_file->set($data_db);
            echo json_encode(array(
                'is_error'=>false,
                'id'=>$result,
            ));
        }

    }

    public function upload_get($id="")
    {
        $this->load->model('m_fr_regis_file');

        $this->form_validation->set_data(array(
            'id'    =>  $id
        ));
        $this->form_validation->set_rules('id', 'id user', 'trim|required|numeric');

        if ($this->form_validation->run()) {
            $id=$this->form_validation->set_value('id');
            $data=$this->m_fr_regis_file->get_all_by_id($id);
            echo json_encode(array(
                'is_error'=>false,
                'data'=> $data
            ));
            return;
        }
    }

    public function upload_delete($id="")
    {
        $this->load->model('m_fr_regis_file');

        $id=$this->input->post('id');
        $data=$this->m_fr_regis_file->delete_by_id($id);
        echo json_encode(array(
            'is_error'=>false,
            'id'=>$data
        ));
        return;
    }

}
