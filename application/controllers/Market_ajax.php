<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Market_ajax extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        if(!$this->session->userdata('username')){
            redirect('login');
            exit;
        }
    }

    public function market_update()
    {

        $this->load->model('m_fr_regis');
        $this->form_validation->set_rules('id', "Id User", 'trim|numeric');
        $this->form_validation->set_rules('tgl_jo', "Tanggal JO", 'trim|max_length[50]');
        $this->form_validation->set_rules('tgl_visa', "Tanggal Visa", 'trim|max_length[50]');
        $this->form_validation->set_rules('tgl_terbang', "Tanggal Terbang", 'trim|max_length[50]');
        $this->form_validation->set_rules('no_pesawat', "No Pesawat", 'trim|max_length[50]');
        $this->form_validation->set_rules('jam_terbang', "Jam terbang", 'trim|max_length[50]');
        $this->form_validation->set_rules('masalah', "Masalah", 'trim|max_length[250]');

        if ($this->form_validation->run()) {

            $id=$this->form_validation->set_value('id');
            $tgl_jo=$this->form_validation->set_value('tgl_jo');
            $tgl_visa=$this->form_validation->set_value('tgl_visa');
            $tgl_terbang=$this->form_validation->set_value('tgl_terbang');
            $no_pesawat=$this->form_validation->set_value('no_pesawat');
            $jam_terbang=$this->form_validation->set_value('jam_terbang');
            $masalah=$this->form_validation->set_value('masalah');

            $data=array(
                'tgl_jo' => $tgl_jo,
                'tgl_visa' => $tgl_visa,
                'tgl_terbang' => $tgl_terbang,
                'no_pesawat' => $no_pesawat,
                'jam_terbang' => $jam_terbang,
                'masalah' => $masalah,
                'updated_at' => date("Y-m-d H:i:s"));

            $data=$this->m_fr_regis->update_value_by_id($id,$data);
            echo json_encode(array(
                'is_error'=>false,
                'id'=>$data
            ));
            return false;
        }
    }

    function do_upload(){
        $this->load->model('m_fr_regis_file');
        $this->load->helper(array('form', 'url'));

        $config['upload_path']='./assets/images/lanjut/';
        $config['allowed_types']='gif|jpg|png|psd|jpeg|jpg2|jpe|j2k|jpf|jpm|pdf|svg';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = 10000000;

        $this->load->library('upload',$config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('file'))
        {
            echo $this->upload->display_errors();exit;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $image = $data['upload_data']['file_name'];
            $id = $this->input->post('user_id');
            $filename = $this->input->post('filename');
            $group = $this->input->post('group');

            $data = array('name' => $filename,
                'group' => $group,
                'user_id' => $id,
                'file' => $image,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),

            );

            $result = $this->m_fr_regis_file->set($data);
            echo json_encode(array(
                'is_error'=>false,
                'id'=>$result,
            ));
        }

    }

    public function jo_get($id="")
    {
        $this->load->model('m_fr_regis_file');

        $this->form_validation->set_data(array(
            'id'    =>  $id
        ));
        $this->form_validation->set_rules('id', 'id user', 'trim|required|numeric');

        if ($this->form_validation->run()) {
            $id=$this->form_validation->set_value('id');
            $group= 11;
            $data=$this->m_fr_regis_file->get_all_by_id($id,$group);
            echo json_encode(array(
                'is_error'=>false,
                'data'=> $data
            ));
            return;
        }
    }

    public function visa_get($id="")
    {
        $this->load->model('m_fr_regis_file');

        $this->form_validation->set_data(array(
            'id'    =>  $id
        ));
        $this->form_validation->set_rules('id', 'id user', 'trim|required|numeric');

        if ($this->form_validation->run()) {
            $id=$this->form_validation->set_value('id');
            $group= 12;
            $data=$this->m_fr_regis_file->get_all_by_id($id,$group);
            echo json_encode(array(
                'is_error'=>false,
                'data'=> $data
            ));
            return;
        }
    }

    public function tiket_get($id="")
    {
        $this->load->model('m_fr_regis_file');

        $this->form_validation->set_data(array(
            'id'    =>  $id
        ));
        $this->form_validation->set_rules('id', 'id user', 'trim|required|numeric');

        if ($this->form_validation->run()) {
            $id=$this->form_validation->set_value('id');
            $group= 13;
            $data=$this->m_fr_regis_file->get_all_by_id($id,$group);
            echo json_encode(array(
                'is_error'=>false,
                'data'=> $data
            ));
            return;
        }
    }

}
