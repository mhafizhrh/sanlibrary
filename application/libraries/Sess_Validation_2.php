<?php

class Sess_Validation_2 extends CI_Model {

	public function __construct() {

		if (!isset($this->session->id_siswa)) {
			
			redirect(base_url('auth/login_siswa'));
		}
	}
}