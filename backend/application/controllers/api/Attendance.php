<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends ApiBase
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Attendance_model');
    }

    public function checkIn()
    {
        $user = $this->authUser();
        $today = $this->Attendance_model->findTodayByUser($user['id']);
        if (!$today) {
            $this->Attendance_model->create([
                'user_id' => $user['id'],
                'date' => date('Y-m-d'),
                'in_time' => date('H:i:s'),
                'status' => 'present',
            ]);
        }
        $this->json(['message' => 'Checked in']);
    }

    public function checkOut()
    {
        $user = $this->authUser();
        $today = $this->Attendance_model->findTodayByUser($user['id']);
        if ($today) {
            $this->Attendance_model->updateById($today['id'], ['out_time' => date('H:i:s')]);
        }
        $this->json(['message' => 'Checked out']);
    }
}
