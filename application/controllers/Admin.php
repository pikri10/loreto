<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }
    public function delete_role($id){
        $this->db->where('id', $id);
        $this->db->delete('user_role');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Role has been deleted!</div>');
        redirect('admin/role');
    }
    public function role_edit($id){
        $data['title'] = 'Edit Roles';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model');
        $data['r'] = $this->Admin_model->getRoleById($id);

        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role_edit', $data);
            $this->load->view('templates/footer');
        }else{
            $this->Admin_model->editRole();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role has been updated!</div>');
            redirect('admin/role');
        }
    }
    public function roleaccess($role_id)
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }
    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if($result->num_rows() < 1){
            $this->db->insert('user_access_menu', $data);
        }else{
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }
    public function item()
    {
        $data['title'] = 'List of Items';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['item'] = $this->db->get('item')->result_array();
        $data['item'] = $this->db->get('item')->result_array();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/item', $data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price')
            ];
            $this->db->insert('item', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Item has been added!</div>');
			redirect('admin/item');
       }
    }
    public function item_delete($id){
        $this->db->where('id', $id);
        $this->db->delete('item');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Item has been deleted!</div>');
        redirect('admin/item');
    }
    public function item_edit($id){
        $data['title'] = 'Edit Items';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Admin_model');
        $data['item'] = $this->Admin_model->getItemById($id);

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/item_edit', $data);
            $this->load->view('templates/footer');
        }else{
            $this->Admin_model->editItem();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Item has been updated!</div>');
            redirect('admin/item');
        }
    }
}