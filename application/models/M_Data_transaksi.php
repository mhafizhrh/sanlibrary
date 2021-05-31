<?php

class M_Data_transaksi extends CI_Model {

	public $message = null;

	public function tambah_hari($hari = null, $date_start = null) {

		$date_start = date_create($date_start);
        date_add($date_start, date_interval_create_from_date_string($hari));
        $tambah_hari = date_format($date_start, 'Y-m-d');
        return $tambah_hari;
	}

	public function get_id_peminjaman() {

		$this->db->select_max('id_peminjaman');
		$row = $this->db->get('tb_peminjaman')->row();
		return ($row->id_peminjaman + 1);
	}

	public function data_peminjaman_rows() {

		$this->db->select('status');
		$this->db->from('tb_peminjaman');
		$this->db->where('status <=', 0);
		return $this->db->get()->num_rows();
	}

	public function get_data_peminjaman_pag($per_page, $start = 0, $keyword = '') {

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
		$this->db->limit($per_page, $start);
		return $this->db->get()->result();
	}

	public function data_pengembalian_rows() {

		$this->db->select('status');
		$this->db->from('tb_peminjaman');
		$this->db->where('status >=', 1);
		return $this->db->get()->num_rows();
	}

	public function get_data_pengembalian_pag($per_page, $start = 0, $keyword = '') {

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
		$this->db->where('tb_peminjaman.status', 1);
		$this->db->limit($per_page, $start);
		return $this->db->get()->result();
	}

	public function get_data_pengembalian() {

		$this->db->select('*');
		$this->db->from('tb_peminjaman');
		$this->db->join('tb_buku', 'tb_peminjaman.id_buku = tb_buku.id_buku', 'left');
		$this->db->join('tb_siswa', 'tb_peminjaman.id_siswa = tb_siswa.id_siswa', 'left');
		$this->db->where('tb_peminjaman.status', 1);
		return $this->db->get()->result();
	}

	public function peminjaman($post) {

		$jumlah_buku = $this->db->get_where('tb_buku', array('id_buku' => $post['id_buku']))->row()->jumlah;

		if ($jumlah_buku <= 0) {
			
			$this->session->set_flashdata(
				'message',
				'<script>swal("Stok buku sudah habis!'.$jumlah_buku.'", {icon: "error"});</script>'
			);

			redirect(base_url('data_transaksi/peminjaman'));
		} else if ($jumlah_buku < $post['jumlah']) {
			
			$this->session->set_flashdata(
				'message',
				'<script>swal("Stok buku tidak mencukupi jumlah pinjam.", {icon: "error"});</script>'
			);

			redirect(base_url('data_transaksi/peminjaman'));
		} else {

			$data = array(
				'id_admin' => $this->session->id_admin,
				'id_siswa' => $post['id_siswa'],
				'id_buku' => $post['id_buku'],
				'jumlah_pinjam' => html_escape($post['jumlah']),
				'tgl_pinjam' => date('Y-m-d'),
				'tgl_kembali' => $this->tambah_hari('7 days', date('Y-m-d'))
			);

			$this->db->insert('tb_peminjaman', $data);

			$this->db->query('UPDATE tb_buku SET jumlah = jumlah-'.$post['jumlah'] . ' WHERE id_buku = ' . $post['id_buku']);
		}
	}

	public function kembali($id_peminjaman) {

		$data_peminjaman = $this->db->get_where('tb_peminjaman', array('id_peminjaman' => $id_peminjaman))->row();

		$this->db->where('id_peminjaman', $id_peminjaman);
		$this->db->update('tb_peminjaman', array('tgl_kembali_buku' => date('Y-m-d'), 'status' => 1));
		$this->db->query('UPDATE tb_buku SET jumlah = jumlah + ' . $data_peminjaman->jumlah_pinjam . ' WHERE id_buku = ' . $data_peminjaman->id_buku);
	}

	public function perpanjang($id_peminjaman) {

		$get_data = $this->db->get_where('tb_peminjaman', array('id_peminjaman' => $id_peminjaman))->row();

		$this->db->where('id_peminjaman', $id_peminjaman);
		$this->db->update('tb_peminjaman', array('tgl_kembali' => $this->tambah_hari('7 days', $get_data->tgl_kembali)));
	}
}