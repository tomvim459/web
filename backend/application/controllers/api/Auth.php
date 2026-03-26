<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends ApiBase
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->User_model->findByEmail($email);

        if (!$user || !verify_password($password, $user['password'])) {
            return $this->json(['message' => 'Invalid credentials'], 401);
        }
        unset($user['password']);
        $this->json(['user' => $user, 'token' => (string) $user['id']]);
    }
}
