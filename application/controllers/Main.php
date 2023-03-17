<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    // public function __construct()
    // {
    //     parent::__construct();
        
    //     $this->load->model('M_kategori');
    // }
	
	public function index()
	{
		//$this->load->view('main/header');
		$this->load->view('main/main');
		//$this->load->view('main/footer');
	}

    public function catalog()
	{
        $data['item'] = $this->db->get('item')->result_array();
        $data['item'] = $this->db->get('item')->result_array();
        $this->load->model('Shop_model', 'shop');
        $data['get_price'] = $this->shop->get_price();

        $this->form_validation->set_rules('quantity', 'Quantity', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('main/catalog', $data);
		}else{
        $data = [
            'name' => $this->input->post('data1', true),
            'quantity' => $this->input->post('quantity', true),
            'price' => $this->input->post('price', true)
        ];

        $this->db->insert('order_list', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Order success!<br>Go to cashier to finish your payment</div>');
		redirect('main/catalog');
	}
}

	public function tambah_feedback()
    {
        $data = [
            'nama_pengirim' => $this->input->post('nama', true),
            'hp' => $this->input->post('hp', true),
            'email' => $this->input->post('email', true),
            'uraian_feedback' => $this->input->post('uraian', true)
        ];

        if ($this->M_feedback->insert($data)) {
            $this->notifikasi->suksesAdd();
            redirect('main/about', 'refresh');
        } else {
            $this->notifikasi->gagalAdd();
            redirect('main/about', 'refresh');
        }
    }

    public function monitoring()
	{
        $data['pemilik'] = $this->M_pemilik->show($this->M_input->ta_aktif('1')->tahun);
        $data['kategori'] = $this->M_kategori->all();
		$this->load->view('main/header');
		$this->load->view('main/monitoring', $data);
		$this->load->view('main/footer');
	}
    public function detail($id)
	{
        $data['pemilik'] = $this->M_pemilik->get_by_owner($id);
        $data['detail'] = $this->M_detail->monitoring($id);
		$this->load->view('main/header');
		$this->load->view('main/detail', $data);
		$this->load->view('main/footer');
	}
}
