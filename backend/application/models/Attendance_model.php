<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_model extends BaseModel
{
    protected $table = 'attendance';

    public function todayStats()
    {
        $today = date('Y-m-d');
        $present = (int) $this->db->where('date', $today)->count_all_results($this->table);
        $absent = max(0, (int) $this->db->where('role', 'employee')->count_all_results('users') - $present);
        return ['present' => $present, 'absent' => $absent];
    }

    public function findTodayByUser($userId)
    {
        return $this->db->get_where($this->table, ['user_id' => $userId, 'date' => date('Y-m-d')])->row_array();
    }

    public function monthData($userId, $month)
    {
        return $this->db
            ->where('user_id', $userId)
            ->like('date', $month, 'after')
            ->get($this->table)
            ->result_array();
    }
}
