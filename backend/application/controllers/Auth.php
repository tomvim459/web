<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function login()
    {
        if ($this->input->method() === 'post') {
            $user = $this->User_model->findByEmail($this->input->post('email', TRUE));
            if ($user && verify_password($this->input->post('password'), $user['password'])) {
                unset($user['password']);
                $this->session->set_userdata('user', $user);
                redirect('dashboard');
            }
            $data['error'] = 'Invalid credentials';
            return $this->load->view('auth/login', $data);
        }
        $this->load->view('auth/login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
