<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata_ajax extends CI_Controller {

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

        $this->load->model('m_fr_bio_sgp');
        $this->form_validation->set_rules('id', "Id User", 'trim|numeric');
        $this->form_validation->set_rules('nationality', "Nationality", 'trim|max_length[50]');
        $this->form_validation->set_rules('airport', "Airport", 'trim|max_length[50]');
        $this->form_validation->set_rules('alergies', "Alergies", 'trim|max_length[50]');
        $this->form_validation->set_rules('physical_dis', "Physical Disabilities", 'trim|max_length[50]');
        $this->form_validation->set_rules('dietary', "Dietary", 'trim|max_length[50]');
        $this->form_validation->set_rules('feedback1', "Employeer 1", 'trim|max_length[250]');
        $this->form_validation->set_rules('feedback2', "Employeer 2", 'trim|max_length[250]');
        $this->form_validation->set_rules('other_remarks', "Other Remarks", 'trim|max_length[250]');

        if ($this->form_validation->run()) {

            $id=$this->form_validation->set_value('id');
            $nationality=$this->form_validation->set_value('nationality');
            $airport=$this->form_validation->set_value('airport');
            $alergies=$this->form_validation->set_value('alergies');
            $physical_dis=$this->form_validation->set_value('physical_dis');
            $dietary=$this->form_validation->set_value('dietary');
            $feedback1=$this->form_validation->set_value('feedback1');
            $feedback2=$this->form_validation->set_value('feedback2');
            $other_remarks=$this->form_validation->set_value('other_remarks');

            $data=array(
                'nationality' => $nationality,
                'airport' => $airport,
                'alergies' => $alergies,
                'physical_dis' => $physical_dis,
                'dietary' => $dietary,
                'feedback1' => $feedback1,
                'feedback2' => $feedback2,
                'other_remarks' => $other_remarks,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            );

            $data=$this->m_fr_bio_sgp->update_value_by_id($id,$data);
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

        $config['upload_path']='./assets/images/';
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

    public function ajax_set_illness(){
        $this->load->model('m_mst_sg_illness');

        $this->form_validation->set_rules('illness', "Illness", 'trim|integer');
        $this->form_validation->set_rules('value', "Value", 'trim|integer');
        $this->form_validation->set_rules('user_id', "Id User", 'trim|numeric');


        if($this->form_validation->run()){

            $illness=$this->form_validation->set_value('illness');
            $value=$this->form_validation->set_value('value');
            $user_id=$this->form_validation->set_value('user_id');
//            $id=$this->get_user_id();
            $data=array(
                'illness_id'=>$illness,
                'value'=>$value
            );
            $data=$this->m_mst_sg_illness->set_illness($data,$user_id);

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

    public function ajax_set_food(){
        $this->load->model('m_mst_sg_illness');

        $this->form_validation->set_rules('food', "Illness", 'trim|integer');
        $this->form_validation->set_rules('value', "Value", 'trim|integer');
        $this->form_validation->set_rules('user_id', "Id User", 'trim|numeric');


        if($this->form_validation->run()){

            $food=$this->form_validation->set_value('food');
            $value=$this->form_validation->set_value('value');
            $user_id=$this->form_validation->set_value('user_id');
//            $id=$this->get_user_id();
            $data=array(
                'food_id'=>$food,
                'value'=>$value
            );
            $data=$this->m_mst_sg_illness->set_food($data,$user_id);

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
