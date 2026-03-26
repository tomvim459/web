<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holidays extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->requireLogin();
        $this->requireRole(['main_head', 'department_head']);
        $this->load->model('Holiday_model');
    }

    public function index()
    {
        $this->load->view('holidays/index', ['holidays' => $this->Holiday_model->all()]);
    }

    public function create()
    {
        if ($this->input->method() === 'post') {
            $this->Holiday_model->create([
                'name' => $this->input->post('name', TRUE),
                'holiday_date' => $this->input->post('holiday_date', TRUE),
            ]);
            redirect('holidays');
        }
        $this->load->view('holidays/form');
    }

    public function edit($id)
    {
        if ($this->input->method() === 'post') {
            $this->Holiday_model->updateById($id, [
                'name' => $this->input->post('name', TRUE),
                'holiday_date' => $this->input->post('holiday_date', TRUE),
            ]);
            redirect('holidays');
        }
        $this->load->view('holidays/form', ['holiday' => $this->Holiday_model->find($id)]);
    }

    public function delete($id)
    {
        $this->Holiday_model->deleteById($id);
        redirect('holidays');
    }
}
