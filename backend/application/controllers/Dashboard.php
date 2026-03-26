<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->requireLogin();
        $this->load->model(['User_model', 'Attendance_model', 'Leave_model']);
    }

    public function index()
    {
        $user = $this->session->userdata('user');
        $stats = $this->Attendance_model->todayStats();
        $data = [
            'user' => $user,
            'total_employees' => $this->User_model->employeesCount(),
            'present' => $stats['present'],
            'absent' => $stats['absent'],
            'pending_leave' => $this->Leave_model->pendingCountForRole($user),
        ];
        $this->load->view('dashboard/index', $data);
    }
}
