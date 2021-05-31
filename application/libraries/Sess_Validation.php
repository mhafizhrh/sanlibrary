<?php

class Sess_Validation extends CI_Model {

	public function __construct() {

		if (!isset($this->session->id_admin)) {
			
			redirect(base_url('auth/login_admin'));
		}
	}
}