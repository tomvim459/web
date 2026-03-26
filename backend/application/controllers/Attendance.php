<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->requireLogin();
        $this->load->model(['Attendance_model', 'Holiday_model']);
    }

    public function index()
    {
        $user = $this->session->userdata('user');
        $records = $this->db->where('user_id', $user['id'])->order_by('date', 'DESC')->get('attendance')->result_array();
        $this->load->view('attendance/index', ['records' => $records]);
    }

    public function checkIn()
    {
        $user = $this->session->userdata('user');
        if (!$this->Attendance_model->findTodayByUser($user['id'])) {
            $this->Attendance_model->create([
                'user_id' => $user['id'],
                'date' => date('Y-m-d'),
                'in_time' => date('H:i:s'),
                'status' => 'present',
            ]);
        }
        redirect('attendance');
    }

    public function checkOut()
    {
        $user = $this->session->userdata('user');
        $today = $this->Attendance_model->findTodayByUser($user['id']);
        if ($today) {
            $this->Attendance_model->updateById($today['id'], ['out_time' => date('H:i:s')]);
        }
        redirect('attendance');
    }

    public function calendar()
    {
        $user = $this->session->userdata('user');
        $month = $this->input->get('month') ?: date('Y-m');
        $this->load->view('attendance/calendar', [
            'records' => $this->Attendance_model->monthData($user['id'], $month),
            'holidays' => $this->Holiday_model->monthData($month),
            'month' => $month,
        ]);
    }
}
