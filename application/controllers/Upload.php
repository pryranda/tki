<?php

class Upload extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->helper(array('form', 'url'));
        }

        public function do_upload_file2()
        {
                $this->load->helper('custom_upload');
                $this->load->model('m_fr_regis_file');
                $data=upload_file();
                echo json_encode($data);
        }

//        public function __construct()
//        {
//            parent::__construct();
//            $this->load->helper(array('form', 'url'));
//        }
//
//        public function do_upload()
//        {
//                $this->load->helper('custom_upload');
//                echo json_encode(upload_image());
//        }
//
//
//        public function do_upload_file()
//        {
//                $this->form_validation->set_rules('img_address', "IMG Address", 'trim|required|xss_clean|callback__check_group');
//                $this->form_validation->set_rules('user_id', "Failed", 'trim|required|xss_clean|callback__check_user');
//                if (!$this->form_validation->run()) {
//                        echo json_encode(array("is_error"=>"1","error"=>"Terjadi kesalahan pada file yang di upload segera hubungi Admin.","img_address"));
//                        return;
//                }
//
//                $img_address=$this->form_validation->set_value('img_address');
//                $user_id=$this->form_validation->set_value('user_id');
//                $this->load->helper('custom_upload');
//                $this->load->model('user/advokat_file');
//                $data=upload_file();
//                $array['group']=$img_address;
//                $array['user_id']=$user_id;
//                $array['name']=$data['raw_name'];
//                $array['file']=$data['filename'];
//                if($data["is_error"]){
//                        echo json_encode($data);
//                        return;
//                }
//                $this->advokat_file->set($array);
//                echo json_encode($data);
//        }
//
//
//        public function do_upload_file2()
//        {
//                $this->load->helper('custom_upload');
//                $this->load->model('user/advokat_file');
//                $data=upload_file();
//                echo json_encode($data);
//        }
//
//
//        public function client_upload_file()
//        {
//                $this->form_validation->set_rules('img_address', "IMG Address", 'trim|required|xss_clean|callback__check_group_user');
//                $this->form_validation->set_rules('kasus_id', "Failed", 'trim|required|xss_clean|callback__check_user');
//                if (!$this->form_validation->run()) {
//                        echo json_encode(array("is_error"=>"1","error"=>"Terjadi kesalahan pada file yang di upload segera hubungi Admin.","img_address"));
//                        return;
//                }
//
//                $img_address=$this->form_validation->set_value('img_address');
//                $kasus_id=$this->form_validation->set_value('kasus_id');
//                $this->load->helper('custom_upload');
//                $this->load->model('client/client_file');
//                $data=upload_file();
//                $array['group']=$img_address;
//                $array['kasus_id']=$kasus_id;
//                $array['user_id']=intval($this->session->userdata('user_id'));
//                $array['name']=$data['raw_name'];
//                $array['file']=$data['filename'];
//                $this->client_file->set($array);
//                echo json_encode($data);
//        }
//
//
//        public function delete_file()
//        {
//                $this->form_validation->set_rules('filename', "IMG Address", 'trim|required|xss_clean');
//                if (!$this->form_validation->run()) {
//                        echo json_encode(array("is_error"=>"1","error"=>"Terjadi kesalahan pada file yang di upload segera hubungi Admin."));
//                        return;
//                }
//
//                $filename=$this->form_validation->set_value('filename');
//                $this->load->model('user/advokat_file');
//                $this->advokat_file->delete_by_file($filename);
//                echo json_encode(array("is_error"=>"0","tes"=>$filename));
//        }
//
//
//        public function delete_file_client()
//        {
//                $this->form_validation->set_rules('filename', "IMG Address", 'trim|required|xss_clean');
//                if (!$this->form_validation->run()) {
//                        echo json_encode(array("is_error"=>"1","error"=>"Terjadi kesalahan pada file yang di upload segera hubungi Admin."));
//                        return;
//                }
//
//                $filename=$this->form_validation->set_value('filename');
//                $this->load->model('client/client_file');
//                $this->client_file->delete_by_file($filename);
//                echo json_encode(array("is_error"=>"0","tes"=>$filename));
//        }
//
//        function _check_group($val){
//                $daftar_group = array("advokat_biography", "advokat_education");
//		if(in_array($val,$daftar_group)){
//                        return TRUE;
//		}
//                $this->form_validation->set_message('_check_group', "Silahkan terima Persyaratan dan ketentuan.");
//                return FALSE;
//        }
//        function _check_group_user($val){
//                $daftar_group = array("kronologi_masalah_file");
//		if(in_array($val,$daftar_group)){
//                        return TRUE;
//		}
//                $this->form_validation->set_message('_check_group_user', "Silahkan terima Persyaratan dan ketentuan.");
//                return FALSE;
//        }
//
//        function _check_user($val){
//                return TRUE;
//                $daftar_group = array("advokat_biography", "advokat_education","surat_tidak_mampu");
//		if(in_array($val,$daftar_group)){
//                        return TRUE;
//		}
//                $this->form_validation->set_message('_check_user', "Silahkan terima Persyaratan dan ketentuan.");
//                return FALSE;
//        }


}
?>