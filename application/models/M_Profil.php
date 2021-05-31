<?php

class M_Profil extends CI_Model {

	public function admin_data() {

		return $this->db->get_where('tb_admin', array('id_admin' => $this->session->id_admin))->row();
	}

	public function edit_profil($post) {

		$data['nama_lengkap'] = $post['nama_lengkap'];
		$data['alamat'] = $post['alamat'];
		$data['telp'] = $post['telp'];
		$data['jk'] = $post['jk'];

		$this->db->where('id_admin', $this->session->id_admin);
		$this->db->update('tb_admin', $data);
	}

	public function ubah_password($post) {

		if (password_verify($post['password'], $this->admin_data()->password) == FALSE) {

			$data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);

			$this->db->where('id_admin', $this->session->id_admin);
			$this->db->update('tb_admin', $data);
		}
	}
}