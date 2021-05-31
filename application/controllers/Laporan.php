<?php

class Laporan extends CI_Controller {

	public function __construct() {

		parent::__construct();
		
		$this->load->library('Sess_Validation');
	}

	public function index()
	{

		$data['judul'] = "Laporan";
		$data['nama_lengkap'] = $this->M_Profil->admin_data()->nama_lengkap;
		$data['kategori'] = $this->M_Laporan->get_kategori();
		$data['kelas'] = $this->M_Laporan->get_kelas();

		$this->load->view('header', $data);
		$this->load->view('laporan/index', $data);
		$this->load->view('footer', $data);
	}

	public function cetak_peminjaman() {

		$post = $this->input->post();

		$data['report'] = $this->M_Laporan->cetak_peminjaman($post);

		// $this->load->view('laporan/cetak_peminjaman', $data);

		$mpdf = new \Mpdf\Mpdf();
		$data = $this->load->view('laporan/cetak_peminjaman', $data, true);
		$mpdf->WriteHTML($data);
		$mpdf->Output('Laporan_Peminjaman_Perpustakaan.pdf', 'D');
	}

	public function cetak_buku() {

		$post = $this->input->post();

		if ($post['kategori'] == 'all') {
			
			$filename = 'Laporan_Data_Buku_Perpustakaan.pdf';
		} else {

			$filename = 'Laporan_Data_Buku_' . $post['kategori'] . '_Perpustakaan.pdf';
		}

		$data['report'] = $this->M_Laporan->cetak_buku($post);

		$mpdf = new \Mpdf\Mpdf();
		$data = $this->load->view('laporan/cetak_buku', $data, true);
		$mpdf->WriteHTML($data);
		$mpdf->Output($filename, 'D');
	}

	public function cetak_siswa() {

		$post = $this->input->post();

		if ($post['kelas'] == 'all') {
			
			$filename = 'Laporan_Semua_Data_Siswa_Perpustakaan.pdf';
		} else {

			$filename = 'Laporan_Data_Siswa_Perpustakaan_' . $post['kelas'] . '.pdf';
		}

		$data['report'] = $this->M_Laporan->cetak_siswa($post);

		// $this->load->view('laporan/cetak_siswa', $data);

		$mpdf = new \Mpdf\Mpdf();
		$data = $this->load->view('laporan/cetak_siswa', $data, true);
		$mpdf->WriteHTML($data);
		$mpdf->Output($filename, 'D');
	}

	public function cetak_data_peminjaman() {

		$keyword = $this->uri->segment(3);

		$data['report'] = $this->M_Laporan->cetak_data_peminjaman($keyword);

		$mpdf = new \Mpdf\Mpdf();
		$data = $this->load->view('laporan/cetak_data_peminjaman', $data, true);
		$mpdf->WriteHTML($data);
		$mpdf->Output('Laporan_Peminjaman_Perpustakaan.pdf', 'D');
	}
}
