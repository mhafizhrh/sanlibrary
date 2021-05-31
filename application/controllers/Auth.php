<?php

class Auth extends CI_Controller {

	public function __construct() {

		parent::__construct();
	}

	public function index() {

		$this->login_siswa();
	}

	public function login_admin() {

		if (isset($this->session->id_admin)) {
			
			redirect(base_url('dashboard'));
		}

		$post = $this->input->post();

		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_message('required', '%s harus diisi!');
		$this->form_validation->set_error_delimiters('<label>', '</label>');

		if ($this->form_validation->run() != false) {
			
			$this->M_Auth->login_admin($post);
		} else {

			$this->load->view('auth/login_admin'); 
		}
	}

	public function login_siswa() {

		if (isset($this->session->id_siswa)) {
			
			redirect(base_url('dashboard'));
		}

		$post = $this->input->post();

		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_message('required', '%s harus diisi!');
		$this->form_validation->set_error_delimiters('<label>', '</label>');

		if ($this->form_validation->run() != false) {
			
			$this->M_Auth->login_siswa($post);
		} else {

			$this->load->view('auth/login_siswa'); 
		}
	}
}