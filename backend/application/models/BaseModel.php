<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaseModel extends CI_Model
{
    protected $table;

    public function all()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function find($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    public function create(array $data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function updateById($id, array $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function deleteById($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}
