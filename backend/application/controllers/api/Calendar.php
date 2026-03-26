<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends ApiBase
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Attendance_model', 'Holiday_model']);
    }

    public function index()
    {
        $user = $this->authUser();
        $month = $this->input->get('month') ?: date('Y-m');
        $this->json([
            'attendance' => $this->Attendance_model->monthData($user['id'], $month),
            'holidays' => $this->Holiday_model->monthData($month),
        ]);
    }
}
