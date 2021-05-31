<?php

class Keluar extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->session->sess_destroy();
	}

	public function index() {

		redirect(base_url('auth'));
	}
}