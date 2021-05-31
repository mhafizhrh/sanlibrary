<?php

class M_Laporan extends CI_Model {

	public function get_kategori() {

		$this->db->select('id_kategori, kategori');
		$this->db->group_by('kategori');
		return $this->db->get('tb_kategori')->result();
	}

	public function get_kelas() {

		$this->db->select('DISTINCT(kelas)');
		// $this->db->group_by('kelas');
		return $this->db->get('tb_siswa')->result();
	}

	public function cetak_peminjaman($post) {

		if (count($post) >= 1 || count($post) != 0) {

			$date1 = date_create($post['date1'])->format('Y-m-d');
			$date2 = date_create($post['date2'])->format('Y-m-d');	
		} else {

			$date1 = date_create()->format('Y-m-d');
			$date2 = date_create()->format('Y-m-d');
		}

		$this->db->select('tb_peminjaman.id_peminjaman,
			tb_siswa.nama_siswa,
			tb_buku.judul,
			tb_peminjaman.tgl_pinjam,
			tb_peminjaman.tgl_kembali,
			tb_peminjaman.tgl_kembali_buku,
			tb_peminjaman.jumlah_pinjam,
			tb_peminjaman.status');
		$this->db->from('tb_peminjaman');
		$this->db->join('tb_siswa', 'tb_peminjaman.id_siswa = tb_siswa.id_siswa', 'left');
		$this->db->join('tb_buku', 'tb_peminjaman.id_buku = tb_buku.id_buku', 'left');
		$this->db->where('tb_peminjaman.tgl_pinjam >=', $date1);
		$this->db->where('tb_peminjaman.tgl_pinjam <=', $date2);
		$this->db->order_by('tb_peminjaman.id_peminjaman', 'ASC');

		return $this->db->get()->result();
	}

	public function cetak_siswa($post) {

		$cetak_siswa = array();

		if ($post['kelas'] == 'all') {
			
			$this->db->select(
				'tb_siswa.id_siswa,
				tb_siswa.nis,
				tb_siswa.nama_siswa,
				tb_siswa.tempat_lahir,
				tb_siswa.tgl_lahir,
				tb_siswa.jk,
				tb_siswa.kelas'
			);
			$this->db->from('tb_siswa');
			$this->db->order_by('nis');
			$result = $this->db->get()->result();

			for ($i = 0; $i < count($result); $i++) { 
				
				$jumlahPinjam = $this->db->query("SELECT id_siswa FROM tb_peminjaman WHERE id_siswa = '{$result[$i]->id_siswa}'")->num_rows();

				array_push($cetak_siswa,
					(object) array(
						'nis' => $result[$i]->nis,
						'nama_siswa' => $result[$i]->nama_siswa,
						'tempat_lahir' => $result[$i]->tempat_lahir,
						'tgl_lahir' => $result[$i]->tgl_lahir,
						'jk' => $result[$i]->jk,
						'kelas' => $result[$i]->kelas,
						'jumlahPinjam' => $jumlahPinjam
					)
				);
			}
		} else {

			$this->db->select(
				'tb_siswa.id_siswa,
				tb_siswa.nis,
				tb_siswa.nama_siswa,
				tb_siswa.tempat_lahir,
				tb_siswa.tgl_lahir,
				tb_siswa.jk,
				tb_siswa.kelas'
			);
			$this->db->from('tb_siswa');
			$this->db->where('tb_siswa.kelas', $post['kelas']);
			$this->db->order_by('nis');
			$result = $this->db->get()->result();

			for ($i = 0; $i < count($result); $i++) { 
				
				$jumlahPinjam = $this->db->query("SELECT id_siswa FROM tb_peminjaman WHERE id_siswa = '{$result[$i]->id_siswa}'")->num_rows();

				array_push($cetak_siswa,
					(object) array(
						'nis' => $result[$i]->nis,
						'nama_siswa' => $result[$i]->nama_siswa,
						'tempat_lahir' => $result[$i]->tempat_lahir,
						'tgl_lahir' => $result[$i]->tgl_lahir,
						'jk' => $result[$i]->jk,
						'kelas' => $result[$i]->kelas,
						'jumlahPinjam' => $jumlahPinjam
					)
				);
			}
		}

		return $cetak_siswa;
	}

	public function cetak_buku($post) {

		$cetak_siswa = array();

		if ($post['kategori'] == 'all') {
			
			// $this->db->select(
			// 	'tb_buku.no_isbn,
			// 	tb_buku.judul,
			// 	tb_buku.pengarang,
			// 	tb_buku.penerbit,
			// 	tb_buku.tahun_terbit,
			// 	tb_buku.tgl_lahir,
			// 	tb_buku.jk,
			// 	tb_kategori.kategori'
			// );
			$this->db->select('*');
			$this->db->from('tb_buku');
			$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_buku.id_kategori', 'left');
			$this->db->order_by('tb_buku.judul');
			$result = $this->db->get()->result();
		} else {

			// $this->db->select(
			// 	'tb_buku.no_isbn,
			// 	tb_buku.judul,
			// 	tb_buku.pengarang,
			// 	tb_buku.penerbit,
			// 	tb_buku.tahun_terbit,
			// 	tb_buku.tgl_lahir,
			// 	tb_buku.jk,
			// 	tb_kategori.kategori'
			// );
			$this->db->select('*');
			$this->db->from('tb_buku');
			$this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_buku.id_kategori', 'left');
			$this->db->where('tb_buku.id_kategori', $post['kategori']);
			$this->db->order_by('tb_buku.judul');
			$result = $this->db->get()->result();
		}

		return $result;
	}

	public function cetak_data_peminjaman($keyword = '') {

		$this->db->select('
			tb_peminjaman.id_peminjaman,
			tb_peminjaman.id_buku,
			tb_peminjaman.id_siswa,
			tb_peminjaman.id_admin,
			tb_peminjaman.tgl_pinjam,
			tb_peminjaman.tgl_kembali,
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
		$this->db->where('tb_peminjaman.status', 0);
		return $this->db->get()->result();
	}
}