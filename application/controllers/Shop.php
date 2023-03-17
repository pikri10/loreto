<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'List of Items';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['item'] = $this->db->get('item')->result_array();
        $data['item'] = $this->db->get('item')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('shop/index', $data);
        $this->load->view('templates/footer');
    }
    public function cart()
    {
        $data['title'] = 'Cart';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['item'] = $this->db->get('item')->result_array();
        $this->load->model('Shop_model', 'shop');
        $data['get_price'] = $this->shop->get_price();

        $this->form_validation->set_rules('quantity', 'Quantity', 'required|trim');

        if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('shop/cart', $data);
            $this->load->view('templates/footer');
		}else{
        $data = [
            'name' => $this->input->post('data1', true),
            'quantity' => $this->input->post('quantity', true),
            'price' => $this->input->post('price', true)
        ];

        $this->db->insert('order_list', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Order success!<br>Go to cashier to finish your payment</div>');
		redirect('shop/cart');
    }
    }
    
    public function order()
    {
        $data['title'] = 'Order List';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['order'] = $this->db->get('order_list')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('shop/order', $data);
        $this->load->view('templates/footer');
    }
    public function delete_order($id){
        $this->db->where('id', $id);
        $this->db->delete('order_list');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Order marked as done!</div>');
        redirect('shop/order');
    }
}