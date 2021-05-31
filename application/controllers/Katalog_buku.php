<?php

class Katalog_buku extends CI_Controller {
	
	public function __construct() {

		parent::__construct();

		$this->load->library('Sess_Validation');
	}

	public function index() {

		$this->data_buku();
	}

	public function data_buku() {

		$data['judul'] = "Data Buku";
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

		$config['base_url'] 		= base_url('katalog_buku/data_buku');
		$config['total_rows'] 		= count((array) $this->M_Katalog_buku->get_data_buku_pag(null, null, $keyword));
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

		$data['data_buku'] = $this->M_Katalog_buku->get_data_buku_pag($config['per_page'], $start, $keyword);

		$this->load->view('header', $data);
		$this->load->view('katalog_buku/data_buku', $data);
		$this->load->view('footer', $data);
	}

	public function kategori_buku() {

		$data['judul'] = "Kategori Buku";
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
		
		$config['base_url'] 		= base_url('katalog_buku/kategori_buku');
		$config['total_rows'] 		= count((array) $this->M_Katalog_buku->get_data_kategori_pag(null, null, $keyword));
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

		$data['data_kategori'] = $this->M_Katalog_buku->get_data_kategori_pag($config['per_page'], $start, $keyword);

		$this->load->view('header', $data);
		$this->load->view('katalog_buku/kategori_buku', $data);
		$this->load->view('footer', $data);
	}

	public function tambah_buku() {

		$post = $this->input->post();

		$data['judul'] = "Tambah Buku";
		$data['nama_lengkap'] = $this->M_Profil->admin_data()->nama_lengkap;
		$data['kategori'] = $this->M_Katalog_buku->get_data_kategori();

		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
		$this->form_validation->set_rules('tahun_terbit', 'Pengarang', 'required|numeric');
		$this->form_validation->set_rules('no_isbn', 'No. ISBN', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric|greater_than_equal_to[1]');

		$this->form_validation->set_message('required', '%s harus diisi.');
		$this->form_validation->set_message('numeric', '%s tidak valid.');
		$this->form_validation->set_message('greater_than_equal_to', '%s minimal 1.');
		$this->form_validation->set_error_delimiters('<label>', '</label>');

		if ($this->form_validation->run() != false) {

			$this->M_Katalog_buku->tambah_buku($post);
			
			if ($this->db->affected_rows() >= 1) {

				$this->session->set_flashdata(
					'message',
					'<script>swal("Berhasil!", "Buku telah ditambahkan.", "success")</script>'
				);
				redirect(base_url('katalog_buku/data_buku'));
			} else {

				$this->session->set_flashdata(
					'message',
					'<script>swal("Gagal!", "Buku gagal ditambahkan.", "error")</script>'
				);
				redirect(base_url('katalog_buku/data_buku'));
			}

			$this->load->view('header', $data);
			$this->load->view('katalog_buku/tambah_buku', $data);
			$this->load->view('footer', $data);
		} else {

			$this->load->view('header', $data);
			$this->load->view('katalog_buku/tambah_buku', $data);
			$this->load->view('footer', $data);
		}
	}

	public function tambah_kategori() {

		$post = $this->input->post();

		$data['judul'] = "Tambah Kategori Buku";
		$data['nama_lengkap'] = $this->M_Profil->admin_data()->nama_lengkap;

		$this->form_validation->set_rules('kategori', 'Kategori', 'required|is_unique[tb_kategori.kategori]');

		$this->form_validation->set_message('required', '%s harus diisi.');
		$this->form_validation->set_message('is_unique', '%s sudah ada.');
		$this->form_validation->set_error_delimiters('<label>', '</label>');

		if ($this->form_validation->run() != false) {

			$this->M_Katalog_buku->tambah_kategori($post);
			
			if ($this->db->affected_rows() >= 1) {

				$this->session->set_flashdata(
					'message',
					'<script>swal("Berhasil!", "Kategori telah ditambahkan.", "success")</script>'
				);

				redirect(base_url('katalog_buku/kategori_buku'));
			} else {

				$this->session->set_flashdata(
					'message',
					'<script>swal("Gagal!", "Kategori gagal ditambahkan.", "error")</script>'
				);

				redirect(base_url('katalog_buku/kategori_buku'));
			}

			$this->load->view('header', $data);
			$this->load->view('katalog_buku/tambah_kategori', $data);
			$this->load->view('footer', $data);
		} else {

			$this->load->view('header', $data);
			$this->load->view('katalog_buku/tambah_kategori', $data);
			$this->load->view('footer', $data);
		}
	}

	public function edit_buku($id_buku = null) {

		$post = $this->input->post();

		$data['judul'] = "Ubah Data Buku";
		$data['nama_lengkap'] = $this->M_Profil->admin_data()->nama_lengkap;
		$data['data_kategori'] = $this->M_Katalog_buku->get_data_kategori();

		if (count($this->M_Katalog_buku->get_data_buku($id_buku)) == 1) {

			$data['return_message'] = $this->M_Katalog_buku->get_data_buku($id_buku);
			$data['data_buku'] = $this->M_Katalog_buku->get_data_buku($id_buku);
		} else {

			redirect(base_url('katalog_buku/data_buku'));
		}

		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
		$this->form_validation->set_rules('tahun_terbit', 'Pengarang', 'required|numeric');
		$this->form_validation->set_rules('no_isbn', 'Penerbit', 'required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric');

		$this->form_validation->set_message('required', '%s harus diisi.');
		$this->form_validation->set_message('numeric', '%s tidak valid.');
		$this->form_validation->set_error_delimiters('<label>', '</label>');

		if ($this->form_validation->run() != false) {

			$this->M_Katalog_buku->edit_buku($post, $id_buku);

			if ($this->db->affected_rows() >= 1) {

				$this->session->set_flashdata(
					'message',
					'<script>swal("Berhasil!", "Data buku berhasil disimpan.", "success")</script>'
				);
				redirect(base_url('katalog_buku/edit_buku/' . $id_buku));
			} else {

				$this->session->set_flashdata(
					'message',
					'<script>swal("Informasi!", "Tidak ada perubahan.", "info")</script>'
				);
				redirect(base_url('katalog_buku/edit_buku/' . $id_buku));
			}

			$this->load->view('header', $data);
			$this->load->view('katalog_buku/edit_buku', $data);
			$this->load->view('footer', $data);
		} else {

			$this->load->view('header', $data);
			$this->load->view('katalog_buku/edit_buku', $data);
			$this->load->view('footer', $data);
		}
	}

	public function delete_buku($id_buku = null) {

		$this->M_Katalog_buku->delete_buku($id_buku);

		if ($this->db->affected_rows() >= 1) {

			$this->session->set_flashdata(
				'message',
				'<script>swal("Berhasil!", "Buku berhasil dihapus.", "success")</script>'
			);
			redirect(base_url('katalog_buku/data_buku'));
		} else {

			$this->session->set_flashdata(
				'message',
				'<script>swal("Gagal!", "Buku gagal dihapus.", "error")</script>'
			);
			redirect(base_url('katalog_buku/data_buku'));
		}
	}

	public function edit_kategori($id_kategori = null) {

		$post = $this->input->post();

		$data['judul'] = "Ubah Kategori Buku";
		$data['nama_lengkap'] = $this->M_Profil->admin_data()->nama_lengkap;

		if (count($this->M_Katalog_buku->get_data_kategori2($id_kategori)) == 1) {

			$data['kategori_buku'] = $this->M_Katalog_buku->get_data_kategori2($id_kategori);
		} else {

			redirect(base_url('katalog_buku/kategori_buku'));
		}

		$this->form_validation->set_rules('kategori', 'Kategori', 'required|is_unique[tb_kategori.kategori]');

		$this->form_validation->set_message('required', '%s harus diisi.');
		$this->form_validation->set_message('is_unique', '%s sudah ada.');
		$this->form_validation->set_error_delimiters('<label>', '</label>');

		if ($this->form_validation->run() != false) {

			$this->M_Katalog_buku->edit_kategori($post, $id_kategori);
			
			if ($this->db->affected_rows() >= 1) {

				$this->session->set_flashdata(
					'message',
					'<script>swal("Berhasil!", "Kategori berhasil disimpan.", "success")</script>'
				);

				redirect(base_url('katalog_buku/edit_kategori/') . $id_kategori);
			} else {

				$this->session->set_flashdata(
					'message',
					'<script>swal("Berhasil!", "Tidak ada perubahan.", "info")</script>'
				);
				redirect(base_url('katalog_buku/edit_kategori/') . $id_kategori);
			}

			$this->load->view('header', $data);
			$this->load->view('katalog_buku/edit_kategori', $data);
			$this->load->view('footer', $data);
		} else {

			$this->load->view('header', $data);
			$this->load->view('katalog_buku/edit_kategori', $data);
			$this->load->view('footer', $data);
		}
	}

	public function delete_kategori($id_kategori = null) {

		$this->M_Katalog_buku->delete_kategori($id_kategori);

		if ($this->db->affected_rows() >= 1) {

			$this->session->set_flashdata(
				'message',
				'<script>swal("Berhasil!", "Kategori Telah dihapus.", "success")</script>'
			);
			redirect(base_url('katalog_buku/kategori_buku'));
		} else {

			$this->session->set_flashdata(
				'message',
				'<script>swal("Gagal!", "Kategori gagal dihapus.", "error")</script>'
			);
			redirect(base_url('katalog_buku/kategori_buku'));
		}
	}
}