<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->requireLogin();
        $this->requireRole(['main_head']);
        $this->load->model(['User_model', 'Department_model']);
    }

    public function index()
    {
        $this->load->view('users/index', ['users' => $this->User_model->all()]);
    }

    public function create()
    {
        if ($this->input->method() === 'post') {
            $this->User_model->create([
                'name' => $this->input->post('name', TRUE),
                'email' => $this->input->post('email', TRUE),
                'password' => hash_password($this->input->post('password')),
                'role' => $this->input->post('role', TRUE),
                'department_id' => (int) $this->input->post('department_id'),
            ]);
            redirect('users');
        }
        $this->load->view('users/form', ['departments' => $this->Department_model->all()]);
    }

    public function edit($id)
    {
        if ($this->input->method() === 'post') {
            $payload = [
                'name' => $this->input->post('name', TRUE),
                'email' => $this->input->post('email', TRUE),
                'role' => $this->input->post('role', TRUE),
                'department_id' => (int) $this->input->post('department_id'),
            ];
            if ($this->input->post('password')) {
                $payload['password'] = hash_password($this->input->post('password'));
            }
            $this->User_model->updateById($id, $payload);
            redirect('users');
        }
        $this->load->view('users/form', [
            'user' => $this->User_model->find($id),
            'departments' => $this->Department_model->all(),
        ]);
    }

    public function delete($id)
    {
        $this->User_model->deleteById($id);
        redirect('users');
    }
}
