<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaves extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->requireLogin();
        $this->load->model(['Leave_model', 'Notification_model']);
    }

    public function index()
    {
        $user = $this->session->userdata('user');
        $this->load->view('leaves/index', ['leaves' => $this->Leave_model->forUser($user), 'user' => $user]);
    }

    public function apply()
    {
        $user = $this->session->userdata('user');
        if ($this->input->method() === 'post') {
            $status = $user['role'] === 'department_head' ? 'pending_main_head' : 'pending_department_head';
            $leaveId = $this->Leave_model->create([
                'user_id' => $user['id'],
                'department_id' => $user['department_id'],
                'start_date' => $this->input->post('start_date', TRUE),
                'end_date' => $this->input->post('end_date', TRUE),
                'reason' => $this->input->post('reason', TRUE),
                'status' => $status,
            ]);

            $this->Notification_model->create([
                'user_id' => 0,
                'message' => 'New leave request #' . $leaveId,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            redirect('leaves');
        }
        $this->load->view('leaves/form');
    }

    public function approve($id)
    {
        $user = $this->session->userdata('user');
        $leave = $this->Leave_model->find($id);
        if (!$leave) {
            show_404();
        }

        if ($user['role'] === 'department_head' && $leave['status'] === 'pending_department_head') {
            $this->Leave_model->updateById($id, ['status' => 'pending_main_head']);
        } elseif ($user['role'] === 'main_head' && $leave['status'] === 'pending_main_head') {
            $this->Leave_model->updateById($id, ['status' => 'approved']);
        }
        redirect('leaves');
    }

    public function reject($id)
    {
        $this->Leave_model->updateById($id, ['status' => 'rejected']);
        redirect('leaves');
    }
}
