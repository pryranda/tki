<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('auth_m');
    }

    public function login()
    {

        if($this->session->userdata('user_id')){
            redirect('dashboard');
            exit;
        }
        $this->load->view('login');
    }

    public function ajax_login(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]|max_length[200]');
        if ($this->form_validation->run()) {
            $username = $this->form_validation->set_value('username');
            $password = $this->form_validation->set_value('password');
            $user = $this->auth_m->get_data_user_by_username($username);
            if ($user) {
                if (password_verify($password, $user->password)) {
                    $set_session = array(
                        'user_id' => $user->id,
                        'username' => $user->username,
                        'status' => 'login',
                    );
                    $this->session->set_userdata($set_session);
                    echo json_encode(array(
                        'is_error' => false,
                    ));
                    return;
                } else {
                    echo json_encode(array(
                        'is_error' => true,
                        'error_message' => "Username atau Password salah"
                    ));
                    return;
                }
            }
            echo json_encode(array(
                'is_error' => true,
                'error_message' => "Username tidak terdaftar"
            ));
            return;
        }
        echo json_encode(array(
            'is_error' => true,
            'error_message' => "Minimal Panjang Karakter Password (5)"
        ));
        return;
    }

    public function logout()
    {
        $this->session->sess_destroy();

        $this->session->set_userdata(array(
            'user_id'	=> "",
            'username'	=> "",
            'status'	=> ""
        ));
        redirect('login');
    }

}