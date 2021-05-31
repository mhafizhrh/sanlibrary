<?php

class M_Katalog_buku extends CI_Model {

	public function get_data_buku($id_buku = null, $stok = null) {

		$this->db->select('*');
		$this->db->from('tb_buku');
		$this->db->join('tb_kategori', 'tb_buku.id_kategori = tb_kategori.id_kategori', 'left');
		if ($id_buku != null) {
			
			$this->db->where('tb_buku.id_buku', $id_buku);
		} else if ($stok != null) {

			$this->db->where('tb_buku.jumlah >=', 1);
		}
		$this->db->where('tb_buku.deleted', '0');
		return $this->db->get()->result();
	}

	public function get_data_buku_pag($per_page, $start = 0, $keyword = '') {

		$this->db->select('
			tb_kategori.id_kategori,
			tb_kategori.kategori,
			tb_buku.id_buku,
			tb_buku.judul,
			tb_buku.pengarang,
			tb_buku.penerbit,
			tb_buku.tahun_terbit,
			tb_buku.no_isbn,
			tb_buku.jumlah
		');
		$this->db->from('tb_buku');
		$this->db->join('tb_kategori', 'tb_buku.id_kategori = tb_kategori.id_kategori', 'left');
		$this->db->group_start();
		$this->db->like('tb_kategori.kategori', $keyword);
		$this->db->or_like('tb_buku.judul', $keyword);
		$this->db->or_like('tb_buku.pengarang', $keyword);
		$this->db->or_like('tb_buku.penerbit', $keyword);
		$this->db->or_like('tb_buku.tahun_terbit', $keyword);
		$this->db->or_like('tb_buku.no_isbn', $keyword);
		$this->db->or_like('tb_buku.jumlah', $keyword);
		$this->db->group_end();
		$this->db->where('tb_buku.deleted', '0');
		$this->db->limit($per_page, $start);
		return $this->db->get()->result();
	}

	public function get_data_kategori() {

		$this->db->select('id_kategori, kategori');
		$this->db->where('deleted', 0);
		return $this->db->get('tb_kategori')->result();
	}

	public function get_data_kategori_pag($per_page, $start = 0, $keyword = '') {

		$this->db->select('id_kategori, kategori');
		$this->db->like('kategori', $keyword);
		$this->db->where('deleted', 0);
		$this->db->limit($per_page, $start);
		return $this->db->get('tb_kategori')->result();
	}

	public function tambah_buku($post) {

		$this->db->select_max('id_buku');
		$id_buku = $this->db->get('tb_buku')->row()->id_buku + 1;

		$data = array(
			'id_buku' => html_escape($id_buku),
			'id_kategori' => html_escape($post['kategori']),
			'judul' => html_escape($post['judul']),
			'pengarang' => html_escape($post['pengarang']),
			'penerbit' => html_escape($post['penerbit']),
			'tahun_terbit' => html_escape($post['tahun_terbit']),
			'no_isbn' => html_escape($post['no_isbn']),
			'jumlah' => html_escape($post['jumlah']),
			'deleted' => 0
		);
		$this->db->insert('tb_buku', $data);
	}

	public function tambah_kategori($post) {

		return $this->db->insert('tb_kategori', array('kategori' => html_escape($post['kategori']), 'deleted' => 0));
	}

	public function edit_buku($post, $id_buku) {


		$data = array(
			'id_kategori' => html_escape($post['kategori']),
			'judul' => html_escape($post['judul']),
			'pengarang' => html_escape($post['pengarang']),
			'penerbit' => html_escape($post['penerbit']),
			'tahun_terbit' => html_escape($post['tahun_terbit']),
			'no_isbn' => html_escape($post['no_isbn']),
			'jumlah' => html_escape($post['jumlah'])
		);

		$this->db->where('id_buku', $id_buku);
		$this->db->update('tb_buku', $data);
	}

	public function delete_buku($id_buku) {

		$this->db->where('id_buku', $id_buku);
		return $this->db->update('tb_buku', array('deleted' => 1));
	}

	public function edit_kategori($post, $id_kategori) {

		$this->db->where('id_kategori', $id_kategori);
		$this->db->update('tb_kategori', array('kategori' => html_escape($post['kategori'])));
	}

	public function delete_kategori($id_kategori) {

		$this->db->where('id_kategori', $id_kategori);
		return $this->db->update('tb_kategori', array('deleted' => 1));
	}
}