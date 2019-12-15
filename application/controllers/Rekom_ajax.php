<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekom_ajax extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        if(!$this->session->userdata('username')){
            redirect('login');
            exit;
        }
    }

    public function rekom_update()
    {

        $this->load->model('m_fr_regis');
        $this->form_validation->set_rules('id', "Id User", 'trim|numeric');
        $this->form_validation->set_rules('rekom_id', "ID Rekom", 'trim|max_length[50]');
        $this->form_validation->set_rules('tgl_rekom', "Tanggal Rekom", 'trim|max_length[50]');
        $this->form_validation->set_rules('tgl_paspor', "Tanggal Paspor", 'trim|max_length[50]');
        $this->form_validation->set_rules('exp_paspor', "Expired Paspor", 'trim|max_length[50]');
        $this->form_validation->set_rules('no_paspor', "No Paspor", 'trim|max_length[50]');
        $this->form_validation->set_rules('daerah_paspor', "Daerah Paspor", 'trim|max_length[250]');

        if ($this->form_validation->run()) {

            $id=$this->form_validation->set_value('id');
            $rekom_id=$this->form_validation->set_value('rekom_id');
            $tgl_rekom=$this->form_validation->set_value('tgl_rekom');
            $tgl_paspor=$this->form_validation->set_value('tgl_paspor');
            $exp_paspor=$this->form_validation->set_value('exp_paspor');
            $no_paspor=$this->form_validation->set_value('no_paspor');
            $daerah_paspor=$this->form_validation->set_value('daerah_paspor');

            $data=array(
                'id_rekom' => $rekom_id,
                'tgl_rekom' => $tgl_rekom,
                'tgl_paspor' => $tgl_paspor,
                'tgl_exp_paspor' => $exp_paspor,
                'no_paspor' => $no_paspor,
                'daerah_paspor' => $daerah_paspor,
                'updated_at' => date("Y-m-d H:i:s"),
            );

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

        $config['upload_path']='./assets/images/rekom/';
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

            $data = array('name' => $filename,
                'group' => 8,
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

    public function rekom_get($id="")
    {
        $this->load->model('m_fr_regis_file');

        $this->form_validation->set_data(array(
            'id'    =>  $id
        ));
        $this->form_validation->set_rules('id', 'id user', 'trim|required|numeric');

        if ($this->form_validation->run()) {
            $id=$this->form_validation->set_value('id');
            $group= array(8);
            $data=$this->m_fr_regis_file->get_all_by_id($id,$group);
            echo json_encode(array(
                'is_error'=>false,
                'data'=> $data
            ));
            return;
        }
    }

}
