<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getItemById($id)
    {
        return $this->db->get_where('item', ['id' => $id])->row_array();
    }
    public function editItem(){
        $data = [
            "name" => $this->input->post('name', true),
            "price" => $this->input->post('price', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('item', $data);
    }
    public function getRoleById($id)
    {
        return $this->db->get_where('user_role', ['id' => $id])->row_array();
    }
    public function editRole(){
        $data = [
            "role" => $this->input->post('role', true),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_role', $data);
    }
}