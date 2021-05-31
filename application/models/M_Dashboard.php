<?php

class M_Dashboard extends CI_Model {

	public function get_data_peminjaman() {

		$now = date('Y');
        
		
		$this->db->trans_start();
		$jan = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-01%'")->num_rows();
		$feb = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-02%'")->num_rows();
		$mar = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-03%'")->num_rows();
		$apr = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-04%'")->num_rows();
		$mei = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-05%'")->num_rows();
		$jun = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-06%'")->num_rows();
		$jul = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-07%'")->num_rows();
		$agu = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-08%'")->num_rows();
		$sep = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-09%'")->num_rows();
		$okt = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-10%'")->num_rows();
		$nov = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-11%'")->num_rows();
		$des = $this->db->query("SELECT tgl_pinjam FROM tb_peminjaman WHERE tgl_pinjam LIKE '%$now-12%'")->num_rows();

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
}