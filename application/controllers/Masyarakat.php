<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masyarakat extends CI_Controller {

	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
        $this->load->helper('url');
		$this->load->helper('vic_helper');
		$this->load->helper('my_helper');
        $this->load->helper('vic_convert_helper');
        $this->load->library(array('session','form_validation','mylib'));
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
        $data['laporan'] = $this->m_vic->edit_data($w,'tbl_laporan');
        $this->mylib->mview('v_laporan',$data);
	}
	
	function tambah_laporan()
	{
		$this->mylib->mview('v_tambah_laporan');
	}

	function tambah_laporan_act()
	{
		$kosakata = $this->db->query("SELECT kata_id FROM tbl_kata_kunci")->num_rows();
		$laporan = strtolower($this->input->post('laporan'));
		$filter = array("-","'",":",".",",","!","?","(",")","/","1","2","3","4","5","6","7","8","9","0"); //bisa ditambahkan
		$text_clean = str_replace($filter, " ", $laporan); //bersihkan tanda baca
		$kata = explode(" ",$text_clean);
		$jumlah_komisi = $this->db->query("SELECT komisi_id FROM tbl_komisi")->num_rows();
		for ($i=1; $i < $jumlah_komisi ; $i++) { 
			$kata_kunci = $this->db->query("SELECT kata FROM tbl_kata_kunci WHERE komisi_id='$i'");
				foreach ($kata_kunci->result() as $k) {
					if (in_array($k->kata,$kata)) {
						$data = [
							'kata' => $k->kata,
							'komisi_id' => $i
						];
						$this->m_vic->insert_data($data,'tbl_temp');
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
				$this->m_vic->update_data($w,$data,'tbl_temp');
			}
		}
		$kata_temp = $this->db->query("SELECT temp_id,kata_frekuensi,komisi_id FROM tbl_temp")->result();
		foreach ($kata_temp as $kt) {
			$nk = $this->db->query("SELECT kata_id FROM tbl_kata_kunci WHERE komisi_id='$kt->komisi_id'")->num_rows();
			$hasil = $kt->kata_frekuensi/($nk+$kosakata);
			$w = [
				'temp_id' => $kt->temp_id,
			];
			$data = [
				'nilai_algoritma_nb' => $hasil
			];
			$this->m_vic->update_data($w,$data,'tbl_temp');
		}
		$isi_laporan =[
			'judul' => $this->input->post('judul'),
			'laporan' => $this->input->post('laporan')
		];
		$this->session->set_userdata($isi_laporan);
		redirect('masyarakat/hasil_perhitungan');
	}
	
	function hasil_perhitungan()
	{
		$data['temp'] = $this->m_vic->get_data('tbl_temp');
		$this->mylib->mview('v_hasil_perhitungan',$data);
	}

	function laporan_benar()
	{
		$data = [
			'laporan_judul' => $this->session->userdata('judul'),
			'laporan_isi' => $this->session->userdata('isi'),
			'laporan_komisi' => $this->session->userdata('komisi'),
			'laporan_status' => 0,
			'laporan_nilai_nb' => $this->session->userdata('nilai'),
			'laporan_akurasi' => 1,
			'h_pengguna' => $this->session->userdata('id'),
			'h_tanggal' => date('Y-m-d'),
			'h_waktu' => date('H:i:s')
		];
		$this->m_vic->insert_data($data,'tbl_laporan');
		$this->db->query("TRUNCATE tbl_temp");
		$this->session->set_flashdata('suces','Laporan Anda Sudah Kami Terima');
		redirect('masyarakat/laporan?notif=suces');
	}

	function laporan_salah()
	{
		$data = [
			'laporan_judul' => $this->session->userdata('judul'),
			'laporan_isi' => $this->session->userdata('isi'),
			'laporan_komisi' => $this->session->userdata('komisi'),
			'laporan_status' => 0,
			'laporan_nilai_nb' => $this->session->userdata('nilai'),
			'laporan_akurasi' => 0,
			'h_pengguna' => $this->session->userdata('id'),
			'h_tanggal' => date('Y-m-d'),
			'h_waktu' => date('H:i:s')
		];
		$this->m_vic->insert_data($data,'tbl_laporan');
		$this->db->query("TRUNCATE tbl_temp");
		$this->session->set_flashdata('suces','Laporan Anda Sudah Kami Terima');
		redirect('masyarakat/laporan?notif=suces');
	}

	function detail_laporan($id)
	{
		$w = [
			'laporan_id' => $id
		];
		$data['laporan'] = $this->m_vic->edit_data($w,'tbl_laporan')->row();
		$this->mylib->mview('v_detail_laporan',$data);
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

}