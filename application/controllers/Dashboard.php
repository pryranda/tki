<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('username')){
            redirect('login');
            exit;
        }
        $this->load->model(array(
            'admin/m_mst_menu'));
    }

	public function index($id=0)
	{
        $data['menu']="dashboard";
        $data['group_menu'] =$this->m_mst_menu->get_all_by_group($this->session->userdata('user_id'));
        $this->load->view('dashboard',$data);
	}

    public function pendaftaran($id=0)
    {
        $this->load->model(array(
            'm_negara_tujuan',
            'm_fr_regis',
            'm_np',
            'm_mst_regis_kerja',
            'm_mst_regis_bahasa',
            'm_mst_regis_keterampilan'));
        $data['menu']="pendaftaran";
        $data['negara'] =$this->m_negara_tujuan->get_all();
        $data['negara_ker'] =$this->m_mst_regis_kerja->get_all();
        $data['np'] =$this->m_np->get_all();
        $data['keterampilan'] =$this->m_mst_regis_keterampilan->get_all_by_id($id);
        $data['bahasa_val'] =$this->m_mst_regis_bahasa->get_all_by_id($id);
        $data['values']=$this->m_fr_regis->get_by_id_tki($id);
        $data['group_menu'] =$this->m_mst_menu->get_all_by_group($this->session->userdata('user_id'));
        $this->load->view('pendaftaran',$data);
    }

    public function data_tki()
    {
        $data['menu']="pendaftaran";
        $data['group_menu'] =$this->m_mst_menu->get_all_by_group($this->session->userdata('user_id'));
        $this->load->view('data_tki',$data);
    }

    public function biodata($id=0)
    {
        $this->load->model(array(
            'm_negara_tujuan',
            'm_fr_regis',
            'm_fr_bio_sgp',
            'm_mst_sg_illness',
            'm_np',
            'm_mst_regis_bahasa',
            'm_mst_regis_keterampilan'));
        $data['menu']="biodata";
        $data['group_menu'] =$this->m_mst_menu->get_all_by_group($this->session->userdata('user_id'));
        $data['negara'] =$this->m_negara_tujuan->get_all();
//        $data['negara_by'] =$this->m_negara_tujuan->get_by_id($id);
        $data['np'] =$this->m_np->get_all();
        $data['values']=$this->m_fr_regis->get_by_id_tki($id);
        $data['bio_sgp']=$this->m_fr_bio_sgp->get_by_id_tki($id);
        $data['illness']=$this->m_mst_sg_illness->get_all_by_id($id);
        $data['food']=$this->m_mst_sg_illness->get_all_food_by_id($id);
        $data['keterampilan'] =$this->m_mst_regis_keterampilan->get_all_by_id($id);
        $data['bahasa_val'] =$this->m_mst_regis_bahasa->get_all_by_id($id);
        $this->load->view('biodata',$data);
    }

    public function biodata_mly($id=0)
    {
        $this->load->model(array(
            'm_negara_tujuan',
            'm_fr_regis',
            'm_fr_bio_mly',
            'm_np',
            'm_mst_regis_bahasa',
            'm_mst_regis_keterampilan',
            'm_mst_mly',
            'm_mst_mly_appraisal',
            'm_mst_mly_willing',
            'm_mst_mly_general'
            ));
        $data['menu']="biodata";
        $data['group_menu'] =$this->m_mst_menu->get_all_by_group($this->session->userdata('user_id'));
        $data['negara'] =$this->m_negara_tujuan->get_all();
        $data['negara_by'] =$this->m_negara_tujuan->get_by_id($id);
        $data['np'] =$this->m_np->get_all();
        $data['values']=$this->m_fr_regis->get_by_id_tki($id);
        $data['bio_mly']=$this->m_fr_bio_mly->get_by_id_tki($id);
        $data['recom']=$this->m_mst_mly->get_all_recom_by_id($id);
        $data['keterampilan'] =$this->m_mst_regis_keterampilan->get_all_by_id($id);
        $data['bahasa_val'] =$this->m_mst_regis_bahasa->get_all_by_id($id);
        $data['appraisal'] =$this->m_mst_mly_appraisal->get_all_by_id($id);
        $data['willing'] =$this->m_mst_mly_willing->get_all_by_id($id);
        $data['general'] =$this->m_mst_mly_general->get_all_by_id($id);
        $this->load->view('biodata_mly',$data);
    }

    public function biodata_hkg($id=0)
    {
        $this->load->model(array(
            'm_negara_tujuan',
            'm_fr_regis',
//            'm_fr_bio_sgp',
            'm_fr_bio_hkg',
            'm_np',
            'm_mst_regis_bahasa',
            'm_mst_regis_keterampilan'));
        $data['menu']="biodata";
        $data['group_menu'] =$this->m_mst_menu->get_all_by_group($this->session->userdata('user_id'));
        $data['negara'] =$this->m_negara_tujuan->get_all();
        $data['np'] =$this->m_np->get_all();
        $data['values']=$this->m_fr_regis->get_by_id_tki($id);
        $data['bio_hkg']=$this->m_fr_bio_hkg->get_by_id_tki($id);
        $data['keterampilan'] =$this->m_mst_regis_keterampilan->get_all_by_id($id);
        $data['bahasa_val'] =$this->m_mst_regis_bahasa->get_all_by_id($id);
        $this->load->view('biodata_hkg',$data);
    }

    public function data_tki_bio()
    {
        $data['menu']="biodata";
        $data['group_menu'] =$this->m_mst_menu->get_all_by_group($this->session->userdata('user_id'));
        $this->load->view('data_tki_bio',$data);
    }

    public function data_rekom()
    {
        $data['menu']="rekom";
        $data['group_menu'] =$this->m_mst_menu->get_all_by_group($this->session->userdata('user_id'));
        $this->load->view('data_rekom',$data);
    }

    public function rekom($id=0)
    {
        $this->load->model(array(
            'm_negara_tujuan',
            'm_fr_regis',
            'm_fr_bio_sgp',
            'm_mst_sg_illness',
            'm_np',
            'm_mst_regis_bahasa',
            'm_mst_regis_keterampilan'));
        $data['menu']="rekom";
        $data['group_menu'] =$this->m_mst_menu->get_all_by_group($this->session->userdata('user_id'));
        $data['negara'] =$this->m_negara_tujuan->get_all();
        $data['negara_by'] =$this->m_negara_tujuan->get_by_id($id);
        $data['np'] =$this->m_np->get_all();
        $data['values']=$this->m_fr_regis->get_by_id_tki($id);
        $this->load->view('rekom',$data);
    }

    public function data_lanjut()
    {
        $data['menu']="lanjut";
        $data['group_menu'] =$this->m_mst_menu->get_all_by_group($this->session->userdata('user_id'));
        $this->load->view('data_lanjut',$data);
    }

    public function lanjut($id=0)
    {
        $this->load->model(array(
            'm_negara_tujuan',
            'm_fr_regis',
            'm_fr_bio_sgp',
            'm_mst_sg_illness',
            'm_np',
            'm_mst_regis_bahasa',
            'm_mst_regis_keterampilan'));
        $data['menu']="lanjut";
        $data['group_menu'] =$this->m_mst_menu->get_all_by_group($this->session->userdata('user_id'));
        $data['negara'] =$this->m_negara_tujuan->get_all();
        $data['negara_by'] =$this->m_negara_tujuan->get_by_id($id);
        $data['np'] =$this->m_np->get_all();
        $data['values']=$this->m_fr_regis->get_by_id_tki($id);
        $data['bio_sgp']=$this->m_fr_bio_sgp->get_by_id_tki($id);
        $this->load->view('lanjut',$data);
    }

    public function lanjut_mly($id=0)
    {
        $this->load->model(array(
            'm_negara_tujuan',
            'm_fr_regis',
            'm_fr_bio_mly',
            'm_mst_sg_illness',
            'm_np',
            'm_mst_regis_bahasa',
            'm_mst_regis_keterampilan'));
        $data['menu']="lanjut";
        $data['group_menu'] =$this->m_mst_menu->get_all_by_group($this->session->userdata('user_id'));
        $data['negara'] =$this->m_negara_tujuan->get_all();
        $data['negara_by'] =$this->m_negara_tujuan->get_by_id($id);
        $data['np'] =$this->m_np->get_all();
        $data['values']=$this->m_fr_regis->get_by_id_tki($id);
//        $data['bio_sgp']=$this->m_fr_bio_sgp->get_by_id_tki($id);
        $data['bio_mly']=$this->m_fr_bio_mly->get_by_id_tki($id);
        $this->load->view('lanjut_mly',$data);
    }

    public function lanjut_hkg($id=0)
    {
        $this->load->model(array(
            'm_negara_tujuan',
            'm_fr_regis',
//            'm_fr_bio_sgp',
            'm_fr_bio_hkg',
            'm_mst_sg_illness',
            'm_np',
            'm_mst_regis_bahasa',
            'm_mst_regis_keterampilan'));
        $data['menu']="lanjut";
        $data['group_menu'] =$this->m_mst_menu->get_all_by_group($this->session->userdata('user_id'));
        $data['negara'] =$this->m_negara_tujuan->get_all();
        $data['negara_by'] =$this->m_negara_tujuan->get_by_id($id);
        $data['np'] =$this->m_np->get_all();
        $data['values']=$this->m_fr_regis->get_by_id_tki($id);
//        $data['bio_sgp']=$this->m_fr_bio_sgp->get_by_id_tki($id);
        $data['bio_hkg']=$this->m_fr_bio_hkg->get_by_id_tki($id);
        $this->load->view('lanjut_hkg',$data);
    }

    public function data_market()
    {
        $data['menu']="market";
        $data['group_menu'] =$this->m_mst_menu->get_all_by_group($this->session->userdata('user_id'));
        $this->load->view('data_market',$data);
    }

    public function market($id=0)
    {
        $this->load->model(array(
            'm_negara_tujuan',
            'm_fr_regis',
            'm_fr_bio_sgp',
            'm_mst_sg_illness',
            'm_np',
            'm_mst_regis_bahasa',
            'm_mst_regis_keterampilan'));
        $data['menu']="market";
        $data['group_menu'] =$this->m_mst_menu->get_all_by_group($this->session->userdata('user_id'));
        $data['negara'] =$this->m_negara_tujuan->get_all();
        $data['negara_by'] =$this->m_negara_tujuan->get_by_id($id);
        $data['np'] =$this->m_np->get_all();
        $data['values']=$this->m_fr_regis->get_by_id_tki($id);
        $this->load->view('market',$data);
    }

    public function data_kug()
    {
        $data['menu']="kug";
        $data['group_menu'] =$this->m_mst_menu->get_all_by_group($this->session->userdata('user_id'));
        $this->load->view('data_kug',$data);
    }

    public function selesai()
    {
        $data['menu']="selesai";
        $data['group_menu'] =$this->m_mst_menu->get_all_by_group($this->session->userdata('user_id'));
        $this->load->view('data_selesai',$data);
    }

    public function selesai_view()
    {
        $data['menu']="selesai";
        $data['group_menu'] =$this->m_mst_menu->get_all_by_group($this->session->userdata('user_id'));
        $this->load->view('selesai',$data);
    }

    public function login()
    {
        $this->load->view('login');
    }

}
