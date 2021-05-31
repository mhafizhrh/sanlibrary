<?php

class M_Auth extends CI_Model {

	public function login_admin($post) {

		$query = $this->db->get_where('tb_admin', array('username' => $post['username']));

		if ($query->num_rows() <= 0) {
			
			$this->session->set_flashdata(
				'message',
				'<script>swal("Username/Password salah!", {icon: "error"});</script>'
			);
			redirect(base_url('auth/login_admin'));
		} else {

			if (password_verify($post['password'], $query->row()->password)) {

				$this->session->set_userdata(
					array(
						'id_admin' => $query->row()->id_admin
					)
				);

				redirect(base_url('dashboard'));
				
			} else {

				$this->session->set_flashdata(
					'message',
					'<script>swal("Username/Password salah!", {icon: "error"});</script>'
				);
				redirect(base_url('auth/login_admin'));
			}
		}
	}

	public function login_siswa($post) {

		$query = $this->db->get_where('tb_siswa', array('nis' => $post['username']));

		if ($query->num_rows() <= 0) {
			
			$this->session->set_flashdata(
				'message',
				'<script>swal("Username/Password salah!",  {icon: "error"});</script>'
			);
			redirect(base_url('auth/login_siswa'));
		} else {

			if ($post['password'] == $query->row()->password) {

				$this->session->set_userdata(
					array(
						'id_siswa' => $query->row()->id_siswa
					)
				);

				redirect(base_url('siswa'));
				
			} else {

				$this->session->set_flashdata(
					'message',
					'<script>swal("Username/Password salah!",  {icon: "error"});</script>'
				);
				redirect(base_url('auth/login_siswa'));
			}
		}
	}
}