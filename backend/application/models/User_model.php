<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends BaseModel
{
    protected $table = 'users';

    public function __construct()
    {
        parent::__construct();
    }

    public function findByEmail($email)
    {
        return $this->db->get_where($this->table, ['email' => $email])->row_array();
    }

    public function employeesCount()
    {
        return (int) $this->db->where('role', 'employee')->count_all_results($this->table);
    }
}
