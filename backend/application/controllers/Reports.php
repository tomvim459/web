<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->requireLogin();
    }

    public function attendance()
    {
        $date = $this->input->get('date') ?: date('Y-m-d');
        $rows = $this->db->where('date', $date)->get('attendance')->result_array();
        $this->load->view('reports/attendance', ['rows' => $rows, 'date' => $date]);
    }

    public function leaves()
    {
        $rows = $this->db->order_by('id', 'DESC')->get('leaves')->result_array();
        $this->load->view('reports/leaves', ['rows' => $rows]);
    }
}
