<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lanjut_ajax extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        if(!$this->session->userdata('username')){
            redirect('login');
            exit;
        }
    }

    public function lanjut_update()
    {

        $this->load->model('m_fr_bio_sgp');
        $this->form_validation->set_rules('id', "Id User", 'trim|numeric');
        $this->form_validation->set_rules('no_asuransi', "ID Rekom", 'trim|max_length[50]');
        $this->form_validation->set_rules('tgl_asuransi', "Tanggal Rekom", 'trim|max_length[50]');
        $this->form_validation->set_rules('tgl_buka_finger', "Tanggal Paspor", 'trim|max_length[50]');
        $this->form_validation->set_rules('tgl_tutup_finger', "Expired Paspor", 'trim|max_length[50]');
        $this->form_validation->set_rules('tempat_blk', "No Paspor", 'trim|max_length[50]');
        $this->form_validation->set_rules('tgl_ujian', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('tgl_kur', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('tempat_fin', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('tgl_pencairan', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('nominal', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('tgl_pur', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('no_asuransi_pur', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('tgl_pap', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('tempat_pap', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('hsl_pap', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('tgl_leges', "Daerah Paspor", 'trim|max_length[250]');

        if ($this->form_validation->run()) {

            $id=$this->form_validation->set_value('id');
            $no_asuransi=$this->form_validation->set_value('no_asuransi');
            $tgl_asuransi=$this->form_validation->set_value('tgl_asuransi');
            $tgl_buka_finger=$this->form_validation->set_value('tgl_buka_finger');
            $tgl_tutup_finger=$this->form_validation->set_value('tgl_tutup_finger');
            $tempat_blk=$this->form_validation->set_value('tempat_blk');
            $tgl_ujian=$this->form_validation->set_value('tgl_ujian');
            $tgl_kur=$this->form_validation->set_value('tgl_kur');
            $tempat_fin=$this->form_validation->set_value('tempat_fin');
            $tgl_pencairan=$this->form_validation->set_value('tgl_pencairan');
            $nominal=$this->form_validation->set_value('nominal');
            $tgl_pur=$this->form_validation->set_value('tgl_pur');
            $no_asuransi_pur=$this->form_validation->set_value('no_asuransi_pur');
            $tgl_pap=$this->form_validation->set_value('tgl_pap');
            $tempat_pap=$this->form_validation->set_value('tempat_pap');
            $hsl_pap=$this->form_validation->set_value('hsl_pap');
            $tgl_leges=$this->form_validation->set_value('tgl_leges');

            $data=array(
                'pra_no_asur' => $no_asuransi,
                'pra_tgl_asur' => $tgl_asuransi,
                'finger_tgl_buka' => $tgl_buka_finger,
                'finger_tgl_tutup' => $tgl_tutup_finger,
                'finger_tempat' => $tempat_blk,
                'ujian_tgl' => $tgl_ujian,
                'kur_tgl' => $tgl_kur,
                'kur_tempat' => $tempat_fin,
                'kur_tgl_pencairan' => $tgl_pencairan,
                'kur_nominal' => $nominal,
                'purna_tgl_asur' => $tgl_pur,
                'purna_no_asur' => $no_asuransi_pur,
                'pap_tgl' => $tgl_pap,
                'pap_tempat' => $tempat_pap,
                'pap_hasil' => $hsl_pap,
                'leges_tgl' => $tgl_leges,
                'updated_at' => date("Y-m-d H:i:s"),
            );

            $data=$this->m_fr_bio_sgp->update_value_by_id($id,$data);
            echo json_encode(array(
                'is_error'=>false,
                'id'=>$data
            ));
            return false;
        }
    }

    public function lanjut_mly_update()
    {

        $this->load->model('m_fr_bio_mly');
        $this->form_validation->set_rules('id', "Id User", 'trim|numeric');
        $this->form_validation->set_rules('no_asuransi', "ID Rekom", 'trim|max_length[50]');
        $this->form_validation->set_rules('tgl_asuransi', "Tanggal Rekom", 'trim|max_length[50]');
        $this->form_validation->set_rules('tgl_isc', "Tanggal ISC", 'trim|max_length[50]');
        $this->form_validation->set_rules('tgl_isc_exp', "Tanggal ISC", 'trim|max_length[50]');
        $this->form_validation->set_rules('tgl_buka_finger', "Tanggal Paspor", 'trim|max_length[50]');
        $this->form_validation->set_rules('tgl_tutup_finger', "Expired Paspor", 'trim|max_length[50]');
        $this->form_validation->set_rules('tempat_blk', "No Paspor", 'trim|max_length[50]');
        $this->form_validation->set_rules('tgl_ujian', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('tgl_bestinet', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('tgl_bestinet_exp', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('tgl_chop_visa', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('tgl_pur', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('no_asuransi_pur', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('tgl_pap', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('tempat_pap', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('hsl_pap', "Daerah Paspor", 'trim|max_length[250]');

        if ($this->form_validation->run()) {

            $id=$this->form_validation->set_value('id');
            $no_asuransi=$this->form_validation->set_value('no_asuransi');
            $tgl_asuransi=$this->form_validation->set_value('tgl_asuransi');
            $tgl_isc=$this->form_validation->set_value('tgl_isc');
            $tgl_isc_exp=$this->form_validation->set_value('tgl_isc_exp');
            $tgl_buka_finger=$this->form_validation->set_value('tgl_buka_finger');
            $tgl_tutup_finger=$this->form_validation->set_value('tgl_tutup_finger');
            $tempat_blk=$this->form_validation->set_value('tempat_blk');
            $tgl_ujian=$this->form_validation->set_value('tgl_ujian');
            $tgl_bestinet=$this->form_validation->set_value('tgl_bestinet');
            $tgl_bestinet_exp=$this->form_validation->set_value('tgl_bestinet_exp');
            $tgl_chop_visa=$this->form_validation->set_value('tgl_chop_visa');
            $tgl_pur=$this->form_validation->set_value('tgl_pur');
            $no_asuransi_pur=$this->form_validation->set_value('no_asuransi_pur');
            $tgl_pap=$this->form_validation->set_value('tgl_pap');
            $tempat_pap=$this->form_validation->set_value('tempat_pap');
            $hsl_pap=$this->form_validation->set_value('hsl_pap');

            $data=array(
                'pra_no_asur' => $no_asuransi,
                'pra_tgl_asur' => $tgl_asuransi,
                'isc_tgl' => $tgl_isc,
                'isc_tgl_exp' => $tgl_isc_exp,
                'finger_tgl_buka' => $tgl_buka_finger,
                'finger_tgl_tutup' => $tgl_tutup_finger,
                'finger_tempat' => $tempat_blk,
                'ujian_tgl' => $tgl_ujian,
                'bestinet_tgl' => $tgl_bestinet,
                'bestinet_tgl_exp' => $tgl_bestinet_exp,
                'chop_visa_tgl' => $tgl_chop_visa,
                'purna_tgl_asur' => $tgl_pur,
                'purna_no_asur' => $no_asuransi_pur,
                'pap_tgl' => $tgl_pap,
                'pap_tempat' => $tempat_pap,
                'pap_hasil' => $hsl_pap,
                'updated_at' => date("Y-m-d H:i:s"),
            );

            $data=$this->m_fr_bio_mly->update_value_by_id($id,$data);
            echo json_encode(array(
                'is_error'=>false,
                'id'=>$data
            ));
            return false;
        }
    }

    public function lanjut_hkg_update()
    {

        $this->load->model('m_fr_bio_hkg');
        $this->form_validation->set_rules('id', "Id User", 'trim|numeric');
        $this->form_validation->set_rules('no_asuransi', "ID Rekom", 'trim|max_length[50]');
        $this->form_validation->set_rules('tgl_asuransi', "Tanggal Rekom", 'trim|max_length[50]');
        $this->form_validation->set_rules('tgl_buka_finger', "Tanggal Paspor", 'trim|max_length[50]');
        $this->form_validation->set_rules('tgl_tutup_finger', "Expired Paspor", 'trim|max_length[50]');
        $this->form_validation->set_rules('tempat_blk', "No Paspor", 'trim|max_length[50]');
        $this->form_validation->set_rules('tgl_ujian', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('tgl_kur', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('tempat_fin', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('tgl_pencairan', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('nominal', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('tgl_pur', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('no_asuransi_pur', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('tgl_pap', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('tempat_pap', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('hsl_pap', "Daerah Paspor", 'trim|max_length[250]');
        $this->form_validation->set_rules('tgl_leges', "Daerah Paspor", 'trim|max_length[250]');

        if ($this->form_validation->run()) {

            $id=$this->form_validation->set_value('id');
            $no_asuransi=$this->form_validation->set_value('no_asuransi');
            $tgl_asuransi=$this->form_validation->set_value('tgl_asuransi');
            $tgl_buka_finger=$this->form_validation->set_value('tgl_buka_finger');
            $tgl_tutup_finger=$this->form_validation->set_value('tgl_tutup_finger');
            $tempat_blk=$this->form_validation->set_value('tempat_blk');
            $tgl_ujian=$this->form_validation->set_value('tgl_ujian');
            $tgl_kur=$this->form_validation->set_value('tgl_kur');
            $tempat_fin=$this->form_validation->set_value('tempat_fin');
            $tgl_pencairan=$this->form_validation->set_value('tgl_pencairan');
            $nominal=$this->form_validation->set_value('nominal');
            $tgl_pur=$this->form_validation->set_value('tgl_pur');
            $no_asuransi_pur=$this->form_validation->set_value('no_asuransi_pur');
            $tgl_pap=$this->form_validation->set_value('tgl_pap');
            $tempat_pap=$this->form_validation->set_value('tempat_pap');
            $hsl_pap=$this->form_validation->set_value('hsl_pap');
            $tgl_leges=$this->form_validation->set_value('tgl_leges');

            $data=array(
                'pra_no_asur' => $no_asuransi,
                'pra_tgl_asur' => $tgl_asuransi,
                'finger_tgl_buka' => $tgl_buka_finger,
                'finger_tgl_tutup' => $tgl_tutup_finger,
                'finger_tempat' => $tempat_blk,
                'ujian_tgl' => $tgl_ujian,
                'kur_tgl' => $tgl_kur,
                'kur_tempat' => $tempat_fin,
                'kur_tgl_pencairan' => $tgl_pencairan,
                'kur_nominal' => $nominal,
                'purna_tgl_asur' => $tgl_pur,
                'purna_no_asur' => $no_asuransi_pur,
                'pap_tgl' => $tgl_pap,
                'pap_tempat' => $tempat_pap,
                'pap_hasil' => $hsl_pap,
                'leges_tgl' => $tgl_leges,
                'updated_at' => date("Y-m-d H:i:s"),
            );

            $data=$this->m_fr_bio_hkg->update_value_by_id($id,$data);
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

    public function sertifikat_get($id="")
    {
        $this->load->model('m_fr_regis_file');

        $this->form_validation->set_data(array(
            'id'    =>  $id
        ));
        $this->form_validation->set_rules('id', 'id user', 'trim|required|numeric');

        if ($this->form_validation->run()) {
            $id=$this->form_validation->set_value('id');
            $group= 9;
            $data=$this->m_fr_regis_file->get_all_by_id($id,$group);
            echo json_encode(array(
                'is_error'=>false,
                'data'=> $data
            ));
            return;
        }
    }

    public function asurpra_get($id="")
    {
        $this->load->model('m_fr_regis_file');

        $this->form_validation->set_data(array(
            'id'    =>  $id
        ));
        $this->form_validation->set_rules('id', 'id user', 'trim|required|numeric');

        if ($this->form_validation->run()) {
            $id=$this->form_validation->set_value('id');
            $group=10;
            $data=$this->m_fr_regis_file->get_all_by_id($id,$group);
            echo json_encode(array(
                'is_error'=>false,
                'data'=> $data
            ));
            return;
        }
    }

    public function isc_get($id="")
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

    public function bestinet_get($id="")
    {
        $this->load->model('m_fr_regis_file');

        $this->form_validation->set_data(array(
            'id'    =>  $id
        ));
        $this->form_validation->set_rules('id', 'id user', 'trim|required|numeric');

        if ($this->form_validation->run()) {
            $id=$this->form_validation->set_value('id');
            $group= 14;
            $data=$this->m_fr_regis_file->get_all_by_id($id,$group);
            echo json_encode(array(
                'is_error'=>false,
                'data'=> $data
            ));
            return;
        }
    }

    public function chopvisa_get($id="")
    {
        $this->load->model('m_fr_regis_file');

        $this->form_validation->set_data(array(
            'id'    =>  $id
        ));
        $this->form_validation->set_rules('id', 'id user', 'trim|required|numeric');

        if ($this->form_validation->run()) {
            $id=$this->form_validation->set_value('id');
            $group= 15;
            $data=$this->m_fr_regis_file->get_all_by_id($id,$group);
            echo json_encode(array(
                'is_error'=>false,
                'data'=> $data
            ));
            return;
        }
    }

}
