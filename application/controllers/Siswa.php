<?php

class Siswa extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library('Sess_Validation_2');
	}

	public function index()
	{

		$this->dashboard();
	}

	public function dashboard()
	{

		$data['judul'] = "Dashboard Siswa";
		$data['nama_lengkap'] = $this->M_Siswa->siswa_data()->nama_siswa;
		$data['jumlah_dipinjam'] = $this->M_Siswa->get_jumlah_dipinjam();
		$data['total_peminjaman'] = count($this->M_Siswa->get_data_peminjaman(null, null, null));
		$data['peminjaman'] = count($this->M_Siswa->get_data_peminjaman(null, null, null));
		$data['data_peminjaman'] = $this->M_Siswa->get_data_peminjaman_grafik();
		
		$this->load->view('header_siswa', $data);
		$this->load->view('siswa/dashboard', $data);
		$this->load->view('footer_siswa', $data);
	}

	public function data_peminjaman() {

		$data['judul'] = "Data Peminjaman";
		$data['nama_lengkap'] = $this->M_Siswa->siswa_data()->nama_siswa;
		
		$keyword = '';

		if ($this->input->post('search') === NULL && $this->uri->segment(4) === NULL) {

			$this->session->unset_userdata('keyword');
		} else if ($this->input->post('search') !== null) {

			$keyword = $this->input->post('keyword');
			$this->session->set_userdata(array('keyword' => $keyword));
		} else {

			$keyword = $this->session->keyword;
		}

		$config['base_url'] 		= base_url('siswa/data_peminjaman');
		$config['total_rows'] 		= count((array) $this->M_Siswa->get_data_peminjaman(null, null, $keyword));
		$config['per_page']			= 20;
		$config['uri_segment']		= 4;

		$config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';

		$config['first_link']		= 'First';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';

		$config['last_link']		= 'Last';
		$config['last_tag_open'] 	= '<li>';
		$config['last_tag_close'] 	= '</li>';

		$config['prev_tag_open'] 	= '<li>';
		$config['prev_tag_close'] 	= '</li>';

		$config['next_tag_open'] 	= '<li>';
		$config['next_tag_close'] 	= '</li>';

		$config['num_tag_open'] 	= '<li>';
		$config['num_tag_close'] 	= '</li>';

		$config['cur_tag_open'] 	= '<li class="active"><a>';
		$config['cur_tag_close'] 	= '</a></li>';

		$this->pagination->initialize($config);

		$start = $this->uri->segment(4);

		$data['data_peminjaman'] = $this->M_Siswa->get_data_peminjaman($config['per_page'], $start, $keyword);

		$this->load->view('header_siswa', $data);
		$this->load->view('siswa/data_peminjaman', $data);
		$this->load->view('footer_siswa', $data);
	}


	public function buku_perpustakaan() {

		$data['judul'] = "Buku Perpustakaan";
		$data['nama_lengkap'] = $this->M_Siswa->siswa_data()->nama_siswa;

		$keyword = '';

		if ($this->input->post('search') === NULL && $this->uri->segment(4) === NULL) {

			$this->session->unset_userdata('keyword');
		} else if ($this->input->post('search') !== null) {

			$keyword = $this->input->post('keyword');
			$this->session->set_userdata(array('keyword' => $keyword));
		} else {

			$keyword = $this->session->keyword;
		}

		$config['base_url'] 		= base_url('siswa/buku_perpustakaan');
		$config['total_rows'] 		= count((array) $this->M_Siswa->buku_perpustakaan(null, null, $keyword));
		$config['per_page']			= 20;
		$config['uri_segment']		= 4;

		$config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';

		$config['first_link']		= 'First';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';

		$config['last_link']		= 'Last';
		$config['last_tag_open'] 	= '<li>';
		$config['last_tag_close'] 	= '</li>';

		$config['prev_tag_open'] 	= '<li>';
		$config['prev_tag_close'] 	= '</li>';

		$config['next_tag_open'] 	= '<li>';
		$config['next_tag_close'] 	= '</li>';

		$config['num_tag_open'] 	= '<li>';
		$config['num_tag_close'] 	= '</li>';

		$config['cur_tag_open'] 	= '<li class="active"><a>';
		$config['cur_tag_close'] 	= '</a></li>';

		$this->pagination->initialize($config);

		$start = $this->uri->segment(4);

		$data['buku_perpustakaan'] = $this->M_Siswa->buku_perpustakaan($config['per_page'], $start, $keyword);

		$this->load->view('header_siswa', $data);
		$this->load->view('siswa/buku_perpustakaan', $data);
		$this->load->view('footer_siswa', $data);
	}
}
