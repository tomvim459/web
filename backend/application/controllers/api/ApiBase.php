<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiBase extends MY_Controller
{
    protected function authUser()
    {
        $token = $this->input->get_request_header('X-USER-ID');
        if (!$token) {
            $this->json(['message' => 'Unauthorized'], 401);
            exit;
        }
        $user = $this->db->get_where('users', ['id' => (int) $token])->row_array();
        if (!$user) {
            $this->json(['message' => 'Invalid user token'], 401);
            exit;
        }
        return $user;
    }
}
