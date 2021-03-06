<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masyarakat extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('url');
		$this->load->helper('vic_helper');
		$this->load->helper('my_helper');
		$this->load->helper('vic_convert_helper');
		$this->load->library(array('session', 'form_validation', 'mylib'));
		$this->load->model('m_vic');
		if ($this->session->userdata('status') != 'loginmasyarakat') {
			redirect(base_url());
		}
	}

	public function index()
	{
		$this->mylib->mview('v_home');
	}

	function laporan()
	{
		$id = $this->session->userdata('id');
		$w = [
			'h_pengguna' => $id
		];
		$data['laporan'] = $this->db->query("SELECT * FROM v_laporan WHERE h_pengguna='$id' ORDER BY laporan_tanggal_masuk ASC");
		$this->mylib->mview('v_laporan', $data);
	}

	function laporan_proses()
	{
		$id = $this->session->userdata('id');
		$w = [
			'h_pengguna' => $id
		];
		$data['laporan'] = $this->db->query("SELECT * FROM v_laporan WHERE h_pengguna='$id' AND laporan_status=1 ORDER BY laporan_tanggal_proses ASC");
		$this->mylib->mview('v_laporan_proses', $data);
	}

	function laporan_belum_proses()
	{
		$id = $this->session->userdata('id');
		$data['laporan'] = $this->db->query("SELECT * FROM v_laporan WHERE laporan_status = 0 AND laporan_bulan = 0 AND laporan_hari <= 7 AND h_pengguna = $id ORDER BY laporan_tanggal_masuk ASC");
		$this->mylib->mview('v_laporan_belum_proses', $data);
	}

	function laporan_pending()
	{
		$id = $this->session->userdata('id');
		$w = [
			'h_pengguna' => $id
		];
		$data['laporan'] = $this->db->query("SELECT * FROM v_laporan WHERE h_pengguna='$id' AND laporan_bulan > 0 AND laporan_status = 0 OR h_pengguna='$id' AND laporan_hari > 7 AND laporan_status = 0 ORDER BY laporan_tanggal_masuk ASC");
		$this->mylib->mview('v_laporan_pending', $data);
	}

	function laporan_selesai($id)
	{
		$w = [
			'laporan_id' => $id
		];
		$data = [
			'laporan_status' => 2
		];
		$this->m_vic->update_data($w, $data, 'tbl_laporan');
		redirect('masyarakat/laporan_proses');
	}

	function tambah_laporan()
	{
		$this->mylib->mview('v_tambah_laporan');
	}

	function tambah_laporan_act()
	{
		$nama_file = $_FILES['file_bukti']['name'];
		$config['upload_path']   = './dokumen/';
		$config['allowed_types'] = 'pdf|jpeg|jpg|png';
		$this->load->library('upload', $config);
		$this->upload->do_upload('file_bukti');
		$kosakata = $this->db->query("SELECT kata_id FROM tbl_kata_kunci")->num_rows();
		$laporan = strtolower($this->input->post('laporan'));
		$filter = array("-", "'", ":", ".", ",", "!", "?", "(", ")", "/", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0"); //bisa ditambahkan
		$text_clean = str_replace($filter, " ", $laporan); //bersihkan tanda baca
		$kata = explode(" ", $text_clean);
		$jumlah_komisi = $this->db->query("SELECT komisi_id FROM tbl_komisi")->num_rows();
		for ($i = 1; $i <= $jumlah_komisi; $i++) {
			$kata_kunci = $this->db->query("SELECT kata FROM tbl_kata_kunci WHERE komisi_id='$i'");
			foreach ($kata_kunci->result() as $k) {
				if (in_array($k->kata, $kata)) {
					$data = [
						'kata' => $k->kata,
						'komisi_id' => $i
					];
					$this->m_vic->insert_data($data, 'tbl_temp');
				}
			}
		}
		$hitung = array_count_values($kata);
		foreach ($hitung as $x => $x_value) {
			if ($x != "") {
				$w = [
					'kata' => $x
				];
				$data = [
					'kata_frekuensi' => $x_value
				];
				$this->m_vic->update_data($w, $data, 'tbl_temp');
			}
		}
		$kata_temp = $this->db->query("SELECT temp_id,kata_frekuensi,komisi_id FROM tbl_temp")->result();
		foreach ($kata_temp as $kt) {
			$nk = $this->db->query("SELECT kata_id FROM tbl_kata_kunci WHERE komisi_id='$kt->komisi_id'")->num_rows();
			$hasil = $kt->kata_frekuensi / ($nk + $kosakata);
			$w = [
				'temp_id' => $kt->temp_id,
			];
			$data = [
				'nilai_algoritma_nb' => $hasil
			];
			$this->m_vic->update_data($w, $data, 'tbl_temp');
		}
		$isi_laporan = [
			'judul' => $this->input->post('judul'),
			'laporan' => $this->input->post('laporan'),
			'bukti' => $nama_file
		];
		$this->session->set_userdata($isi_laporan);
		redirect('masyarakat/hasil_perhitungan');
	}

	function hasil_perhitungan()
	{
		$data['temp'] = $this->m_vic->get_data('tbl_temp');
		$this->mylib->mview('v_hasil_perhitungan', $data);
	}

	function laporan_benar()
	{
		$data = [
			'laporan_judul' => $this->session->userdata('judul'),
			'laporan_isi' => $this->session->userdata('isi'),
			'laporan_komisi' => $this->session->userdata('komisi'),
			'laporan_tanggal_masuk' => date('Y-m-d'),
			'laporan_status' => 0,
			'laporan_bukti' => $this->session->userdata('bukti'),
			'laporan_nilai_nb' => $this->session->userdata('nilai'),
			'laporan_akurasi' => 1,
			'h_pengguna' => $this->session->userdata('id'),
			'h_tanggal' => date('Y-m-d'),
			'h_waktu' => date('H:i:s')
		];
		$this->m_vic->insert_data($data, 'tbl_laporan');
		$this->db->query("TRUNCATE tbl_temp");
		$this->session->set_flashdata('suces', 'Laporan Anda Sudah Kami Terima');
		redirect('masyarakat/laporan?notif=suces');
	}

	function laporan_salah()
	{
		$data = [
			'laporan_judul' => $this->session->userdata('judul'),
			'laporan_isi' => $this->session->userdata('isi'),
			'laporan_komisi' => $this->session->userdata('komisi'),
			'laporan_tanggal_masuk' => date('Y-m-d'),
			'laporan_status' => 0,
			'laporan_bukti' => $this->session->userdata('bukti'),
			'laporan_nilai_nb' => $this->session->userdata('nilai'),
			'laporan_akurasi' => 0,
			'h_pengguna' => $this->session->userdata('id'),
			'h_tanggal' => date('Y-m-d'),
			'h_waktu' => date('H:i:s')
		];
		$this->m_vic->insert_data($data, 'tbl_laporan');
		$this->db->query("TRUNCATE tbl_temp");
		$this->session->set_flashdata('suces', 'Laporan Anda Sudah Kami Terima');
		redirect('masyarakat/laporan?notif=suces');
	}

	function detail_laporan($id)
	{
		$w = [
			'laporan_id' => $id
		];
		$data['laporan'] = $this->m_vic->edit_data($w, 'tbl_laporan')->row();
		$this->mylib->mview('v_detail_laporan', $data);
	}

	function change_pass()
	{
		$this->mylib->mview('v_change_pass');
	}

	function change_pass_act()
	{
		$this->form_validation->set_rules('new_pass1', 'Password Baru', 'trim|required|min_length[8]|matches[new_pass2]');
		$this->form_validation->set_rules('new_pass2', 'Konfirmasi Password Baru', 'trim|required|min_length[8]|matches[new_pass1]');
		if ($this->form_validation->run() != true) {
			$this->mylib->mview('v_change_pass');
		} else {
			$data = [
				'masyarakat_pass' => str_mod(vic_slug_akun($this->input->post('new_pass1'))),
			];
			$w = [
				'masyarakat_id' => $this->session->userdata('id')
			];
			$this->m_vic->update_data($w, $data, 'tbl_masyarakat');
			$this->session->set_flashdata('suces', 'Password Berhasil Di Ubah');
			redirect('masyarakat/change_pass?notif=suces');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
