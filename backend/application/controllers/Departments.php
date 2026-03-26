<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departments extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->requireLogin();
        $this->requireRole(['main_head']);
        $this->load->model(['Department_model', 'User_model']);
    }

    public function index()
    {
        $this->load->view('departments/index', ['departments' => $this->Department_model->all()]);
    }

    public function create()
    {
        if ($this->input->method() === 'post') {
            $this->Department_model->create([
                'name' => $this->input->post('name', TRUE),
                'head_user_id' => (int) $this->input->post('head_user_id'),
            ]);
            redirect('departments');
        }
        $heads = $this->db->where('role', 'department_head')->get('users')->result_array();
        $this->load->view('departments/form', ['heads' => $heads]);
    }

    public function edit($id)
    {
        if ($this->input->method() === 'post') {
            $this->Department_model->updateById($id, [
                'name' => $this->input->post('name', TRUE),
                'head_user_id' => (int) $this->input->post('head_user_id'),
            ]);
            redirect('departments');
        }
        $heads = $this->db->where('role', 'department_head')->get('users')->result_array();
        $this->load->view('departments/form', ['department' => $this->Department_model->find($id), 'heads' => $heads]);
    }

    public function delete($id)
    {
        $this->Department_model->deleteById($id);
        redirect('departments');
    }
}
