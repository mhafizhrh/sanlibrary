<?php

class M_Master_data extends CI_Model {

	public function __construct() {

		parent::__construct();

		// $this->load->library('excel_reader2');
	}

	public function get_data_siswa() {

		$this->db->order_by("nis", "ASC");
		return $this->db->get("tb_siswa")->result();
	}

	public function get_data_siswa2($per_page, $start = 0, $keyword = 'null') {

		$this->db->like('password', $keyword);
		$this->db->or_like('nis', $keyword);
		$this->db->or_like('nama_siswa', $keyword);
		$this->db->or_like('tempat_lahir', $keyword);
		$this->db->or_like('tgl_lahir', $keyword);

		$word_L = (stripos("Laki-Laki", $keyword) !== false) ? 1 : $keyword;
		$word_P = (stripos("Perempuan", $keyword) !== false) ? 0 : $keyword;

		$this->db->or_like('jk', $word_L);
		$this->db->or_like('jk', $word_P);
		$this->db->order_by("nis", "ASC");

		$this->db->limit($per_page, $start);
		$this->db->or_like('kelas', $keyword);

		return $this->db->get('tb_siswa')->result();
	}

	public function importData($data) {

		$result = $this->db->insert_batch('tb_siswa', $data);

		if ($result) {

			return true;
		} else {

			return false;
		}
	}

	public function tambah_siswa($post) {

		$data = array(
			'password' => rand(11111111,99999999),
			'nis' => $post['nis'],
			'nama_siswa' => $post['nama_siswa'],
			'tempat_lahir' => $post['tempat_lahir'],
			'tgl_lahir' => $post['tgl_lahir'],
			'jk' => $post['jk'],
			'kelas' => $post['kelas']
		);
		$this->db->insert('tb_siswa', $data);
	}

	public function get_data_admin() {

		$this->db->order_by("id_admin", "ASC");
		return $this->db->get("tb_admin")->result();
	}

	public function get_data_admin_pag($per_page, $start = 0, $keyword = '') {

		$this->db->select('nama_lengkap, alamat, telp, jk');
		$this->db->like('nama_lengkap', $keyword);
		$this->db->or_like('alamat', $keyword);
		$this->db->or_like('telp', $keyword);

		$word_L = (stripos("Laki-Laki", $keyword) !== false) ? 1 : $keyword;
		$word_P = (stripos("Perempuan", $keyword) !== false) ? 2 : $keyword;

		$this->db->or_like('jk', $word_L);
		$this->db->or_like('jk', $word_P);

		$this->db->limit($per_page, $start);
		return $this->db->get('tb_admin')->result();
	}

	public function tambah_administrator($post) {

		$data['nama_lengkap'] = $post['nama_lengkap'];
		$data['username'] = $post['username'];
		$data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
		$data['alamat'] = $post['alamat'];
		$data['telp'] = $post['telp'];
		$data['jk'] = $post['jk'];

		$this->db->insert('tb_admin', $data);
	}
}