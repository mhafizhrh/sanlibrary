<?php

class Profil extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library('Sess_Validation');
	}

	public function index() {

		$post = $this->input->post();

		$data['judul'] = "Profil";
		$data['nama_lengkap'] = $this->M_Profil->admin_data()->nama_lengkap;
		$data['data_admin'] = $this->M_Profil->admin_data();

		if (isset($post['simpan'])) {
			
			$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			$this->form_validation->set_rules('telp', 'No Telepon', 'required');
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');

			$this->form_validation->set_message('required', '%s harus diisi.');
			$this->form_validation->set_message('is_unique', '%s sudah terpakai.');
			$this->form_validation->set_message('numeric', '%s hanya boleh berupa angka.');
			$this->form_validation->set_error_delimiters('<label>', '</label>');

			if ($this->form_validation->run() != false) {

				$this->M_Profil->edit_profil($post);
				
				if ($this->db->affected_rows() >= 1) {
					
					$this->session->set_flashdata(
						'message',
						'<script>swal("Berhasil!", "Profil berhasil disimpan.", "success")</script>'
					);
					redirect(base_url('profil'));
				} else {

					$this->session->set_flashdata(
						'message',
						'<script>swal("Informasi", "Tidak ada perubahan.", "info")</script>'
					);
					redirect(base_url('profil'));
				}
			}
		} else if (isset($post['ubah'])) {

			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('passwordconf', 'Konfirmasi Password', 'required|matches[password]');
			$this->form_validation->set_message('required', '%s harus diisi.');
			$this->form_validation->set_message('matches', '%s tidak sesuai.');
			$this->form_validation->set_error_delimiters('<label>', '</label>');

			if ($this->form_validation->run() != false) {

				$this->M_Profil->ubah_password($post);

				if ($this->db->affected_rows() >= 1) {
					
					$this->session->set_flashdata(
						'message',
						'<script>swal("Berhasil!", "Password diubah. Silahkan login kembali", "success");</script>'
					);
					// redirect(base_url('keluar'));
				} else {

					$this->session->set_flashdata(
						'message',
						'<script>swal("Informasi", "Tidak ada perubahan.", "info")</script>'
					);
					redirect(base_url('profil'));
				}
			}
		}

		$this->load->view('header', $data);
		$this->load->view('profil/profil', $data);
		$this->load->view('footer', $data);
	}
}