<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaves extends ApiBase
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Leave_model');
    }

    public function index()
    {
        $user = $this->authUser();
        $this->json(['leaves' => $this->Leave_model->forUser($user)]);
    }

    public function apply()
    {
        $user = $this->authUser();
        $status = $user['role'] === 'department_head' ? 'pending_main_head' : 'pending_department_head';
        $this->Leave_model->create([
            'user_id' => $user['id'],
            'department_id' => $user['department_id'],
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'reason' => $this->input->post('reason'),
            'status' => $status,
        ]);
        $this->json(['message' => 'Leave applied']);
    }
}
