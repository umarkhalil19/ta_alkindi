<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
		if ($this->session->userdata('level') != 99) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$this->mylib->aview('v_home');
	}

	function komisi()
	{
		$this->load->database();
		$data['komisi'] = $this->m_vic->get_data('tbl_komisi');
		$this->mylib->aview('v_komisi', $data);
	}

	function tambah_komisi()
	{
		$this->load->database();
		$this->mylib->aview('v_tambah_komisi');
	}

	function tambah_komisi_act()
	{
		$this->load->database();
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		if ($this->form_validation->run() != true) {
			$this->mylib->aview('v_tambah_barang');
		}
		$data = [
			'komisi_nama' => $this->input->post('nama'),
			'h_pengguna' => $this->session->userdata('username'),
			'h_tanggal' => date('Y-m-d'),
			'h_waktu' => date('H:i:s')
		];
		$this->m_vic->insert_data($data, 'tbl_komisi');
		$this->session->set_flashdata('suces', 'Data Berhasil Ditambah');
		redirect('admin/komisi?notif=suces');
	}

	function edit_komisi($id)
	{
		$w = [
			'komisi_id' => $id
		];
		$data['komisi'] = $this->m_vic->edit_data($w, 'tbl_komisi')->row();
		$this->mylib->aview('v_edit_komisi', $data);
	}

	function update_komisi()
	{
		$w = [
			'komisi_id' => $this->input->post('id')
		];

		$data = [
			'komisi_nama' => $this->input->post('nama'),
			'h_pengguna' => $this->session->userdata('username'),
			'h_tanggal' => date('Y-m-d'),
			'h_waktu' => date('H:i:s')
		];
		$this->m_vic->update_data($w, $data, 'tbl_komisi');
		$this->session->set_flashdata('suces', 'Data Berhasil Diubah');
		redirect('admin/komisi?notif=suces');
	}

	function operator()
	{
		$this->load->database();
		$data['operator'] = $this->m_vic->get_data('tbl_users');
		$this->mylib->aview('v_operator', $data);
	}

	function tambah_operator()
	{
		$this->load->database();
		$data['komisi'] = $this->m_vic->get_data('tbl_komisi');
		$this->mylib->aview('v_tambah_operator', $data);
	}

	function tambah_operator_act()
	{
		$this->load->database();
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		if ($this->form_validation->run() != true) {
			$data['komisi'] = $this->m_vic->get_data('tbl_komisi');
			$this->mylib->aview('v_tambah_operator', $data);
		}
		$data = [
			'user_name' => $this->input->post('nama'),
			'user_email' => $this->input->post('email'),
			'user_login' => $this->input->post('username'),
			'user_pass' => str_mod(vic_slug_akun($this->input->post('pass'))),
			'user_komisi' => $this->input->post('komisi'),
			'user_level' => $this->input->post('level'),
			'user_status' => $this->input->post('status'),
			'h_pengguna' => $this->session->userdata('username'),
			'h_tanggal' => date('Y-m-d'),
			'h_waktu' => date('H:i:s')
		];
		$this->m_vic->insert_data($data, 'tbl_users');
		$this->session->set_flashdata('suces', 'Data Berhasil Ditambah');
		redirect('admin/operator?notif=suces');
	}

	function edit_operator($id)
	{
		$this->load->database();
		$w = [
			'user_id' => $id
		];
		$data['komisi'] = $this->m_vic->get_data('tbl_komisi');
		$data['operator'] = $this->m_vic->edit_data($w, 'tbl_users')->row();
		$this->mylib->aview('v_edit_operator', $data);
	}

	function update_operator()
	{
		$this->load->database();
		$w = [
			'user_id' => $this->input->post('id')
		];
		$data = [
			'user_name' => $this->input->post('nama'),
			'user_email' => $this->input->post('email'),
			'user_login' => $this->input->post('username'),
			'user_komisi' => $this->input->post('komisi'),
			'user_level' => $this->input->post('level'),
			'user_status' => $this->input->post('status'),
			'h_pengguna' => $this->session->userdata('username'),
			'h_tanggal' => date('Y-m-d'),
			'h_waktu' => date('H:i:s')
		];
		$this->m_vic->update_data($w, $data, 'tbl_users');
		if ($this->input->post('pass') != '') {
			$pass = [
				'user_pass' => str_mod(vic_slug_akun($this->input->post('pass'))),
			];
			$this->m_vic->update_data($w, $pass, 'tbl_users');
		}
		$this->session->set_flashdata('suces', 'Data Berhasil Diubah');
		redirect('admin/operator?notif=suces');
	}

	function hapus_operator($id)
	{
		$w = [
			'user_id' => $id
		];
		$this->m_vic->delete_data($w, 'tbl_users');
		$this->session->set_flashdata('suces', 'Data Berhasil Dihapus');
		redirect('admin/operator?notif=suces');
	}

	function kata_kunci()
	{
		$this->load->database();
		$data['kata'] = $this->m_vic->get_data('tbl_kata_kunci');
		$this->mylib->aview('v_kata_kunci', $data);
	}

	function tambah_kata()
	{
		$this->load->database();
		$data['komisi'] = $this->m_vic->get_data('tbl_komisi');
		$this->mylib->aview('v_tambah_kata', $data);
	}

	function tambah_kata_act()
	{
		$this->load->database();
		$this->form_validation->set_rules('kata', 'Kata', 'required');
		// $this->form_validation->set_rules('username','Username','required');
		if ($this->form_validation->run() != true) {
			$data['komisi'] = $this->m_vic->get_data('tbl_komisi');
			$this->mylib->aview('v_tambah_kata', $data);
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
		redirect('admin/kata_kunci?notif=suces');
	}

	function delete_kata($id)
	{
		$w = [
			'kata_id' => $id
		];
		$this->m_vic->delete_data($w, 'tbl_kata_kunci');
		$this->session->set_flashdata('suces', 'Data Berhasil Dihapus');
		redirect('admin/kata_kunci?notif=suces');
	}

	function masyarakat()
	{
		$this->load->database();
		$data['masyarakat'] = $this->m_vic->get_data('tbl_masyarakat');
		$this->mylib->aview('v_masyarakat', $data);
	}

	function masyarakat_laporan($id)
	{
		$data['laporan'] = $this->db->query("SELECT * FROM v_laporan WHERE h_pengguna ='$id' ORDER BY laporan_tanggal_masuk ASC");
		$data['nama'] = $this->db->query("SELECT masyarakat_nama FROM tbl_masyarakat WHERE masyarakat_id='$id'")->row();
		$this->mylib->aview('v_laporan', $data);
	}

	function detail_laporan($id)
	{
		$w = [
			'laporan_id' => $id
		];
		$data['laporan'] = $this->m_vic->edit_data($w, 'tbl_laporan')->row();
		$this->mylib->aview('v_detail_laporan', $data);
	}


	function laporan()
	{
		$data['laporan'] = $this->db->query("SELECT * FROM v_laporan WHERE laporan_status = 0 AND laporan_bulan >= 1 OR laporan_status = 0 AND laporan_hari > 1");
		$this->mylib->aview('v_laporan_2', $data);
	}

	function kirim_laporan($id)
	{
		$w = [
			'laporan_id' => $id
		];
		$data = [
			'laporan_tanggal_masuk' => date('Y-m-d')
		];
		$this->m_vic->update_data($w, $data, 'tbl_laporan');
		$this->session->set_flashdata('suces', 'Laporan berhasil di kirim ulang');
		redirect('admin/laporan?notif=suces');
	}

	function change_pass()
	{
		$this->mylib->aview('v_change_pass');
	}

	function change_pass_act()
	{
		$this->form_validation->set_rules('new_pass1', 'Password Baru', 'trim|required|min_length[8]|matches[new_pass2]');
		$this->form_validation->set_rules('new_pass2', 'Konfirmasi Password Baru', 'trim|required|min_length[8]|matches[new_pass1]');
		if ($this->form_validation->run() != true) {
			$this->mylib->aview('v_change_pass');
		} else {
			$data = [
				'user_pass' => str_mod(vic_slug_akun($this->input->post('new_pass1'))),
			];
			$w = [
				'user_id' => $this->session->userdata('id')
			];
			$this->m_vic->update_data($w, $data, 'tbl_users');
			$this->session->set_flashdata('suces', 'Password Berhasil Di Ubah');
			redirect('admin/change_pass?notif=suces');
		}
	}


	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
