<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
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
		if ($this->session->userdata('level') != 1) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$this->mylib->oview('v_home');
	}

	function komisi()
	{
		$this->load->database();
		$data['komisi'] = $this->m_vic->get_data('tbl_komisi');
		$this->mylib->oview('v_komisi', $data);
	}

	function kata_kunci($id)
	{
		$this->load->database();
		$w = [
			'komisi_id' => $id
		];
		$data['kata'] = $this->m_vic->edit_data($w, 'tbl_kata_kunci');
		$this->mylib->oview('v_kata_kunci', $data);
	}

	function tambah_kata()
	{
		$this->load->database();
		$w = [
			'komisi_id' => $this->session->userdata('komisi')
		];
		$data['komisi'] = $this->m_vic->edit_data($w, 'tbl_komisi');
		$this->mylib->oview('v_tambah_kata', $data);
	}

	function tambah_kata_act()
	{
		$this->load->database();
		$this->form_validation->set_rules('kata', 'Kata', 'required');
		// $this->form_validation->set_rules('username','Username','required');
		if ($this->form_validation->run() != true) {
			$data['komisi'] = $this->m_vic->get_data('tbl_komisi');
			$this->mylib->oview('v_tambah_kata', $data);
		}
		$data = [
			'kata' => strtolower($this->input->post('kata')),
			'komisi_id' => $this->input->post('komisi'),
			'h_pengguna' => $this->session->userdata('username'),
			'h_tanggal' => date('Y-m-d'),
			'h_waktu' => date('H:i:s')
		];
		$this->m_vic->insert_data($data, 'tbl_kata_kunci');
		$this->session->set_flashdata('suces', 'Data Berhasil Ditambah');
		redirect('operator/kata_kunci?notif=suces');
	}

	function laporan()
	{
		$w = $this->session->userdata('komisi');
		$data['laporan'] = $this->db->query("SELECT * FROM v_laporan WHERE laporan_status < 2 AND laporan_bulan >= 1 AND laporan_komisi ='$w' OR laporan_status < 2 AND laporan_hari <= 1 AND laporan_komisi ='$w'");
		$this->mylib->oview('v_laporan', $data);
	}

	function detail_laporan($id)
	{
		$w = [
			'laporan_id' => $id
		];
		$data['laporan'] = $this->m_vic->edit_data($w, 'v_laporan')->row();
		$this->mylib->oview('v_detail_laporan', $data);
	}

	function proses_laporan($id)
	{
		$w = [
			'laporan_id' => $id
		];
		$data = [
			'laporan_tanggal_proses' => date('Y-m-d'),
			'laporan_status' => 1
		];
		$this->m_vic->update_data($w, $data, 'tbl_laporan');
		$this->session->set_flashdata('suces', 'Data Berhasil Diupdate');
		redirect('operator/laporan?notif=suces');
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
		redirect('operator/laporan');
	}

	function change_pass()
	{
		$this->mylib->oview('v_change_pass');
	}

	function change_pass_act()
	{
		$this->form_validation->set_rules('new_pass1', 'Password Baru', 'trim|required|min_length[8]|matches[new_pass2]');
		$this->form_validation->set_rules('new_pass2', 'Konfirmasi Password Baru', 'trim|required|min_length[8]|matches[new_pass1]');
		if ($this->form_validation->run() != true) {
			$this->mylib->oview('v_change_pass');
		} else {
			$data = [
				'user_pass' => str_mod(vic_slug_akun($this->input->post('new_pass1'))),
			];
			$w = [
				'user_id' => $this->session->userdata('id')
			];
			$this->m_vic->update_data($w, $data, 'tbl_users');
			$this->session->set_flashdata('suces', 'Password Berhasil Di Ubah');
			redirect('operator/change_pass?notif=suces');
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
