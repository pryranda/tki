<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata_mly_ajax extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        if(!$this->session->userdata('username')){
            redirect('login');
            exit;
        }
    }

    public function bio_get($id="")
    {

        $this->load->model('m_fr_regis');
        if($id==""){
            //get all
            $data=$this->m_fr_regis->get_all_tki_bio();
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

    public function bio_update()
    {

        $this->load->model('m_fr_bio_mly');
        $this->form_validation->set_rules('id', "Id User", 'trim|numeric');
        $this->form_validation->set_rules('nationality', "Nationality", 'trim|max_length[50]');
        $this->form_validation->set_rules('airport', "Airport", 'trim|max_length[50]');

        if ($this->form_validation->run()) {

            $id=$this->form_validation->set_value('id');
            $nationality=$this->form_validation->set_value('nationality');
            $airport=$this->form_validation->set_value('airport');

            $data=array(
                'nationality' => $nationality,
                'airport' => $airport,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            );

            $data=$this->m_fr_bio_mly->update_value_by_id($id,$data);
            echo json_encode(array(
                'is_error'=>false,
                'id'=>$data
            ));
            return false;
        }
    }

    function do_upload($id=""){
        $this->load->model('m_fr_regis');
        $this->load->helper(array('form', 'url'));

        $config['upload_path']='./assets/images/photo/';
        $config['allowed_types']='jpg|png|jpeg|jpg2';
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

            $data = array('photo' => $filename,
                'file_photo' => $image,
            );

            $result = $this->m_fr_regis->update_value_by_id($id,$data);
            echo json_encode(array(
                'is_error'=>false,
                'id'=>$result,
            ));
        }

    }

    public function ajax_set_recom(){
        $this->load->model('m_mst_mly');

        $this->form_validation->set_rules('recom', "Recom", 'trim|integer');
        $this->form_validation->set_rules('value', "Value", 'trim|integer');
        $this->form_validation->set_rules('user_id', "Id User", 'trim|numeric');


        if($this->form_validation->run()){

            $recom=$this->form_validation->set_value('recom');
            $value=$this->form_validation->set_value('value');
            $user_id=$this->form_validation->set_value('user_id');
//            $id=$this->get_user_id();
            $data=array(
                'recom_id'=>$recom,
                'value'=>$value
            );
            $data=$this->m_mst_mly->set_recom($data,$user_id);

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

    public function ajax_set_appraisal(){
        $this->load->model('m_mst_mly_appraisal');

        $this->form_validation->set_rules('appraisal_val', "appraisal val", 'trim|integer');
        $this->form_validation->set_rules('appr_id', "appraisal id", 'trim|integer');
        $this->form_validation->set_rules('user_id', "Id User", 'trim|numeric');


        if($this->form_validation->run()){

            $appraisal_val=$this->form_validation->set_value('appraisal_val');
            $appraisal_id=$this->form_validation->set_value('appr_id');
            $user_id=$this->form_validation->set_value('user_id');
//            $id=$this->get_user_id();
            $data=array(
                'appraisal_id'=>$appraisal_id,
                'kemampuan_val'=>$appraisal_val
            );
            $data=$this->m_mst_mly_appraisal->set_appraisal($data,$user_id);

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

    public function ajax_set_willing(){
        $this->load->model('m_mst_mly_willing');

        $this->form_validation->set_rules('willing_val', "willing val", 'trim|integer');
        $this->form_validation->set_rules('wil_id', "willing id", 'trim|integer');
        $this->form_validation->set_rules('user_id', "Id User", 'trim|numeric');


        if($this->form_validation->run()){

            $willing_val=$this->form_validation->set_value('willing_val');
            $willing_id=$this->form_validation->set_value('wil_id');
            $user_id=$this->form_validation->set_value('user_id');
            $data=array(
                'willing_id'=>$willing_id,
                'kemampuan_val'=>$willing_val
            );
            $data=$this->m_mst_mly_willing->set_willing($data,$user_id);

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

    public function ajax_set_general(){
        $this->load->model('m_mst_mly_general');

        $this->form_validation->set_rules('general_val', "general val", 'trim|integer');
        $this->form_validation->set_rules('gen_id', "general id", 'trim|integer');
        $this->form_validation->set_rules('user_id', "Id User", 'trim|numeric');


        if($this->form_validation->run()){

            $general_val=$this->form_validation->set_value('general_val');
            $general_id=$this->form_validation->set_value('gen_id');
            $user_id=$this->form_validation->set_value('user_id');
            $data=array(
                'general_id'=>$general_id,
                'kemampuan_val'=>$general_val
            );
            $data=$this->m_mst_mly_general->set_general($data,$user_id);

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

}
