<?php

class Dashboard extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library('Sess_Validation');
	}

	public function index()
	{

		$data['judul'] = "Dashboard";
		$data['nama_lengkap'] = $this->M_Profil->admin_data()->nama_lengkap;
		$data['jumlah_admin'] = count($this->M_Master_data->get_data_admin());
		$data['total_siswa'] = count($this->M_Master_data->get_data_siswa());
		$data['total_buku'] = count($this->M_Katalog_buku->get_data_buku());
		$data['total_kategori'] = count($this->M_Katalog_buku->get_data_kategori());
		$data['peminjaman'] = $this->M_Data_transaksi->data_peminjaman_rows();
		$data['pengembalian'] = $this->M_Data_transaksi->data_pengembalian_rows();
		$data['data_peminjaman'] = $this->M_Dashboard->get_data_peminjaman();
		
		$this->load->view('header', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('footer', $data);
	}
}
