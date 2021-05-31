<?php

class M_Siswa extends CI_Model {

	public function siswa_data() {

		return $this->db->get_where('tb_siswa', array('id_siswa' => $this->session->id_siswa))->row();
	}

	public function get_data_peminjaman($per_page, $start = 0, $keyword = '') {

		$this->db->select('
			tb_peminjaman.id_peminjaman,
			tb_peminjaman.id_buku,
			tb_peminjaman.id_siswa,
			tb_peminjaman.id_admin,
			tb_peminjaman.tgl_pinjam,
			tb_peminjaman.tgl_kembali,
			tb_peminjaman.tgl_kembali_buku,
			tb_peminjaman.jumlah_pinjam,
			tb_peminjaman.status,
			tb_buku.judul,
			tb_siswa.nama_siswa,
			tb_admin.nama_lengkap
		');
		$this->db->from('tb_peminjaman');
		$this->db->join('tb_buku', 'tb_peminjaman.id_buku = tb_buku.id_buku', 'left');
		$this->db->join('tb_siswa', 'tb_peminjaman.id_siswa = tb_siswa.id_siswa', 'left');
		$this->db->join('tb_admin', 'tb_peminjaman.id_admin = tb_admin.id_admin', 'left');
		$this->db->group_start();
		$this->db->like('tb_peminjaman.id_peminjaman', $keyword);
		$this->db->or_like('tb_buku.judul', $keyword);
		$this->db->or_like('tb_siswa.nama_siswa', $keyword);
		$this->db->or_like('tb_peminjaman.tgl_pinjam', $keyword);
		$this->db->or_like('tb_peminjaman.tgl_kembali', $keyword);
		$this->db->or_like('tb_peminjaman.jumlah_pinjam', $keyword);
		$this->db->or_like('tb_admin.nama_lengkap', $keyword);
		$this->db->group_end();
		$this->db->where('tb_peminjaman.id_siswa', $this->session->id_siswa);
		$this->db->order_by('status', 'ASC');
		$this->db->limit($per_page, $start);
		return $this->db->get()->result();
	}

	public function get_jumlah_dipinjam() {

		$this->db->where('id_siswa', $this->session->id_siswa);
		$this->db->where('status', 0);
		return $this->db->get('tb_peminjaman')->num_rows();
	}

	public function get_data_peminjaman_grafik() {

		$now = date('Y');
        $id_siswa = $this->session->id_siswa;
		
		$this->db->trans_start();
		$jan = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-01%' AND id_siswa = '{$id_siswa}'")->num_rows();
		$feb = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-02%' AND id_siswa = '{$id_siswa}'")->num_rows();
		$mar = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-03%' AND id_siswa = '{$id_siswa}'")->num_rows();
		$apr = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-04%' AND id_siswa = '{$id_siswa}'")->num_rows();
		$mei = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-05%' AND id_siswa = '{$id_siswa}'")->num_rows();
		$jun = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-06%' AND id_siswa = '{$id_siswa}'")->num_rows();
		$jul = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-07%' AND id_siswa = '{$id_siswa}'")->num_rows();
		$agu = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-08%' AND id_siswa = '{$id_siswa}'")->num_rows();
		$sep = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-09%' AND id_siswa = '{$id_siswa}'")->num_rows();
		$okt = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-10%' AND id_siswa = '{$id_siswa}'")->num_rows();
		$nov = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-11%' AND id_siswa = '{$id_siswa}'")->num_rows();
		$des = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-12%' AND id_siswa = '{$id_siswa}'")->num_rows();

		$data = array(
			'jan' => $jan,
			'feb' => $feb,
			'mar' => $mar,
			'apr' => $apr,
			'mei' => $mei,
			'jun' => $jun,
			'jul' => $jul,
			'agu' => $agu,
			'sep' => $sep,
			'okt' => $okt,
			'nov' => $nov,
			'des' => $des,
			'thn' => $now
		);

		return $data;
	}

	public function buku_perpustakaan($per_page, $start = 0, $keyword = '') {

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
}