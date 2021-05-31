<?php

class Master_data extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library('Sess_Validation');
	}

	public function index() {

		$this->data_siswa();
	}

	public function uploadExcel() {

		$post = $this->input->post();
			
			$path = 'FileExcelUploads/';
			require_once APPPATH . "/third_party/PHPExcel-1.8/Classes/PHPExcel.php";
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'xlsx|xls';
			$config['remove_spaces'] = true;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('file')) {
				
				$error = array('error' => $this->upload->display_errors());
			} else {

				$data = array('upload_data' => $this->upload->data());
			}

			if (empty($error)) {
				
				if (!empty($data['upload_data']['file_name'])) {
					
					$import_xls_file = $data['upload_data']['file_name'];
				} else {

					$import_xls_file = 0;
				}

				$inputFileName = $path . $import_xls_file;

				try {

					$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load($inputFileName);
					$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
					$flag = true;
					$i = 0;

					foreach ($allDataInSheet as $value) {
						
						if ($flag) {
							$flag = false;
							continue;
						}

						$insertdata[$i]['password'] = rand(11111111,99999999);
						$insertdata[$i]['nis'] = $value['A'];
						$insertdata[$i]['nama_siswa'] = $value['B'];
						$insertdata[$i]['tempat_lahir'] = $value['C'];
						$insertdata[$i]['tgl_lahir'] = $value['D'];
						$insertdata[$i]['jk'] = $value['E'];
						$insertdata[$i]['kelas'] = $value['F'];
						$i++;
					}

					$result = $this->M_Master_data->importData($insertdata);

					if ($result) {
						
						unlink($inputFileName);
						$this->session->set_flashdata(
							'message',
							'<script>swal("Berhasil!", "Data siswa berhasil ditambahkan.", "success")</script>'
						);
						redirect(base_url('master_data/data_siswa'));
					} else {

						$this->session->set_flashdata(
							'message',
							'<script>swal("Gagal!", "Data siswa gagal ditambahkan.", "error")</script>'
						);
						redirect(base_url('master_data/data_siswa'));
					}
				} catch (Exception $e) {

					$this->session->set_flashdata(
						'message',
						'<script>swal("Error!", "Error loading file : "' . pathinfo($inputFileName, PATHINFO_BASENAME) . " : " . $e->getMessage() .'", "error")</script>'
					);
					redirect(base_url('master_data/data_siswa'));
				}
			} else {

				$this->session->set_flashdata(
					'message',
					'<script>swal("Error!", "Error : "' . $error['error'] .'", "error")</script>'
				);
				redirect(base_url('master_data/data_siswa'));
			}
	}

	public function tambah_siswa() {

		$post = $this->input->post();

		$data['judul'] = "Tambah Siswa";
		$data['nama_lengkap'] = $this->M_Profil->admin_data()->nama_lengkap;

		$this->form_validation->set_rules('nis', 'NIS', 'required|is_unique[tb_siswa.nis]|numeric');
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');

		$this->form_validation->set_message('required', '%s harus diisi.');
		$this->form_validation->set_message('is_unique', '%s sudah terpakai.');
		$this->form_validation->set_message('numeric', '%s hanya boleh berupa angka.');
		$this->form_validation->set_error_delimiters('<label>', '</label>');

		if ($this->form_validation->run() != false) {

			$this->M_Master_data->tambah_siswa($post);
				
			if ($this->db->affected_rows() >= 1) {
					
				$this->session->set_flashdata(
					'message',
					'<script>swal("Berhasil!", "Data siswa berhasil ditambahkan.", "success")</script>'
				);
				redirect(base_url('master_data/data_siswa'));
			} else {

				$this->session->set_flashdata(
					'message',
					'<script>swal("Gagal!", "Data siswa gagal ditambahkan.", "error")</script>'
				);
				redirect(base_url('master_data/data_siswa'));
			}

			$this->load->view('header', $data);
			$this->load->view('master_data/tambah_siswa', $data);
			$this->load->view('footer', $data);
		} else {

			$this->load->view('header', $data);
			$this->load->view('master_data/tambah_siswa', $data);
			$this->load->view('footer', $data);
		}
	} 

	public function data_siswa() {

		$data['judul'] = "Data Siswa";
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

		$config['base_url'] 		= base_url('master_data/data_siswa/search');
		$config['total_rows'] 		= count((array) $this->M_Master_data->get_data_siswa2(null, null, $keyword));
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

		$data['data_siswa'] = $this->M_Master_data->get_data_siswa2($config['per_page'], $start, $keyword);

		$this->load->view('header', $data);
		$this->load->view('master_data/data_siswa', $data);
		$this->load->view('footer', $data);
	}

	public function administrator() {

		$data['judul'] = "Administrator";
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
		
		$config['base_url'] 		= base_url('master_data/administrator');
		$config['total_rows'] 		= count((array) $this->M_Master_data->get_data_admin_pag(null, null, $keyword));
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

		$data['data_admin'] = $this->M_Master_data->get_data_admin_pag($config['per_page'], $start, $keyword);

		$this->load->view('header', $data);
		$this->load->view('master_data/administrator', $data);
		$this->load->view('footer', $data);
	}

	public function tambah_administrator() {

		$post = $this->input->post();

		$data['judul'] = "Tambah Administrator";
		$data['nama_lengkap'] = $this->M_Profil->admin_data()->nama_lengkap;

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_admin.username]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passwordconf', 'Konfirmasi Password', 'required|matches[password]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('telp', 'No Telepon', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');

		$this->form_validation->set_message('required', '%s harus diisi.');
		$this->form_validation->set_message('is_unique', '%s sudah terpakai.');
		$this->form_validation->set_message('matches', '%s tidak sesuai.');	
		$this->form_validation->set_message('numeric', '%s hanya boleh berupa angka.');
		$this->form_validation->set_error_delimiters('<label>', '</label>');

		if ($this->form_validation->run() != false) {

			$this->M_Master_data->tambah_administrator($post);
			
			if ($this->db->affected_rows() >= 1) {
				
				$this->session->set_flashdata(
					'message',
					'<script>swal("Berhasil!", "Administrator berhasil ditambahkan.", "success")</script>'
				);
				redirect(base_url('master_data/administrator'));
			} else {

				$this->session->set_flashdata(
					'message',
					'<script>swal("Gagal!", "Administrator gagal ditambahkan.", "error")</script>'
				);
				redirect(base_url('master_data/administrator'));
			}

			$this->load->view('header', $data);
			$this->load->view('master_data/tambah_administrator', $data);
			$this->load->view('footer', $data);
		} else {

			$this->load->view('header', $data);
			$this->load->view('master_data/tambah_administrator', $data);
			$this->load->view('footer', $data);
		}
	}
}