<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holiday_model extends BaseModel
{
    protected $table = 'holidays';

    public function monthData($month)
    {
        return $this->db->like('holiday_date', $month, 'after')->get($this->table)->result_array();
    }
}
