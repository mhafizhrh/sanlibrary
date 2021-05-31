<?php

class Data_transaksi extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library('Sess_Validation');
	}

	public function index() {

		$this->data_peminjaman();
	}

	public function peminjaman() {

		$post = $this->input->post();

		$data['judul'] = "Peminjaman";
		$data['nama_lengkap'] = $this->M_Profil->admin_data()->nama_lengkap;
		$data['id_peminjaman'] = $this->M_Data_transaksi->get_id_peminjaman();
		$data['siswa'] = $this->M_Master_data->get_data_siswa();
		$data['buku'] = $this->M_Katalog_buku->get_data_buku(null, 1);

		$this->form_validation->set_rules('id_siswa', 'Nama Siswa', 'required');
		$this->form_validation->set_rules('id_buku', 'Judul Buku', 'required');
		$this->form_validation->set_rules('id_peminjaman', 'ID Peminjaman', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah Pinjam', 'required|numeric|greater_than[0]');

		$this->form_validation->set_message('required', '%s harus diisi.');
		$this->form_validation->set_message('numeric', '%s tidak valid.');
		$this->form_validation->set_message('greater_than', '%s minimal 1.');
		$this->form_validation->set_error_delimiters('<label>', '</label>');

		if ($this->form_validation->run() != false) {

			$this->M_Data_transaksi->peminjaman($post);

			if ($this->db->affected_rows() >= 1) {
				
				$this->session->set_flashdata(
					'message',
					'<script>swal("Buku berhasil dipinjam.", {icon: "success"});</script>'
				);
				redirect(base_url('data_transaksi/peminjaman'));
			} else {

				$this->session->set_flashdata(
					'message',
					'<script>swal("Peminjaman buku gagal. Silahkan coba lagi.", {icon: "error"});</script>'
				);
				redirect(base_url('data_transaksi/peminjaman'));
			}

			$this->load->view('header', $data);
			$this->load->view('data_transaksi/peminjaman', $data);
			$this->load->view('footer', $data);
		} else {

			$this->load->view('header', $data);
			$this->load->view('data_transaksi/peminjaman', $data);
			$this->load->view('footer', $data);
		}
	}

	public function data_peminjaman() {

		$data['judul'] = "Data Peminjaman";
		$data['nama_lengkap'] = $this->M_Profil->admin_data()->nama_lengkap;

		$keyword = '';

		if ($this->input->post('search') === NULL && $this->uri->segment(4) === NULL) {

			$this->session->unset_userdata('keyword');
		} else if ($this->input->post('search') !== null) {

			$keyword = $this->input->post('keyword');
			$this->session->set_userdata(array('keyword' => $keyword));
		} else {

			$keyword = $this->session->keyword;
		}
		
		$config['base_url'] 		= base_url('data_transaksi/data_peminjaman');
		$config['total_rows'] 		= count((array) $this->M_Data_transaksi->get_data_peminjaman_pag(null, null, $keyword));
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

		$data['data_peminjaman'] = $this->M_Data_transaksi->get_data_peminjaman_pag($config['per_page'], $start, $keyword);

		$this->load->view('header', $data);
		$this->load->view('data_transaksi/data_peminjaman', $data);
		$this->load->view('footer', $data);
	}

	public function data_pengembalian() {

		$data['judul'] = "Data Pengembalian";
		$data['nama_lengkap'] = $this->M_Profil->admin_data()->nama_lengkap;
		
		$keyword = '';

		if ($this->input->post('search') === NULL && $this->uri->segment(4) === NULL) {

			$this->session->unset_userdata('keyword');
		} else if ($this->input->post('search') !== null) {

			$keyword = $this->input->post('keyword');
			$this->session->set_userdata(array('keyword' => $keyword));
		} else {

			$keyword = $this->session->keyword;
		}

		$config['base_url'] 		= base_url('data_transaksi/data_pengembalian');
		$config['total_rows'] 		= count((array) $this->M_Data_transaksi->get_data_pengembalian_pag(null, null, $keyword));
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

		$start = $this->uri->segment('3');

		$data['data_pengembalian'] = $this->M_Data_transaksi->get_data_pengembalian_pag($config['per_page'], $start, $keyword);

		$this->load->view('header', $data);
		$this->load->view('data_transaksi/data_pengembalian', $data);
		$this->load->view('footer', $data);
	}

	public function kembali($id_peminjaman = null) {

		$this->M_Data_transaksi->kembali($id_peminjaman);

		if ($this->db->affected_rows() >= 1) {
				
			$this->session->set_flashdata(
				'message',
				'<script>swal("Dikembalikan!", "Buku dikembalikan.", "success")</script>'
			);
			redirect(base_url('data_transaksi/data_peminjaman'));
		} else {

			$this->session->set_flashdata(
				'message',
				'<script>swal("Gagal!", "Buku gagal dikembalikan. Silahkan coba kembali.", "error")</script>'
			);
			redirect(base_url('data_transaksi/data_peminjaman'));
		}
	}

	public function perpanjang($id_peminjaman = null) {

		$this->M_Data_transaksi->perpanjang($id_peminjaman);

		if ($this->db->affected_rows() >= 1) {
				
			$this->session->set_flashdata(
				'message',
				'<script>swal("Diperpanjang!", "Peminjaman telah diperpanjang selama 7 hari.", "success")</script>'
			);
			redirect(base_url('data_transaksi/data_peminjaman'));
		} else {

			$this->session->set_flashdata(
				'message',
				'<script>swal("Gagal!", "Peminjaman gagal diperpanajng. Silahkan coba kembali.", "error")</script>'
			);
			redirect(base_url('data_transaksi/data_peminjaman'));
		}
	}
}