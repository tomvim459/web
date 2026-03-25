<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave_model extends BaseModel
{
    protected $table = 'leaves';

    public function pendingCountForRole(array $user)
    {
        if ($user['role'] === 'main_head') {
            return (int) $this->db->where('status', 'pending_main_head')->count_all_results($this->table);
        }
        if ($user['role'] === 'department_head') {
            return (int) $this->db->where('status', 'pending_department_head')->where('department_id', $user['department_id'])->count_all_results($this->table);
        }
        return (int) $this->db->where('status', 'pending_department_head')->where('user_id', $user['id'])->count_all_results($this->table);
    }

    public function forUser(array $user)
    {
        if ($user['role'] === 'main_head') {
            return $this->all();
        }
        if ($user['role'] === 'department_head') {
            return $this->db->where('department_id', $user['department_id'])->get($this->table)->result_array();
        }
        return $this->db->where('user_id', $user['id'])->get($this->table)->result_array();
    }
}
