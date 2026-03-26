<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function requireLogin()
    {
        if (!$this->session->userdata('user')) {
            redirect('login');
        }
    }

    protected function requireRole(array $roles)
    {
        $user = $this->session->userdata('user');
        if (!$user || !in_array($user['role'], $roles, true)) {
            show_error('Unauthorized', 403);
        }
    }

    protected function json($payload, int $statusCode = 200)
    {
        $this->output
            ->set_status_header($statusCode)
            ->set_content_type('application/json')
            ->set_output(json_encode($payload));
    }
}
