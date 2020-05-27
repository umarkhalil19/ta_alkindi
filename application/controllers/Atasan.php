<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Atasan extends CI_Controller
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
        if ($this->session->userdata('level') != 0) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $this->mylib->atview('v_home');
    }

    public function laporan()
    {
        $data['laporan'] = $this->db->query("SELECT * FROM v_laporan ORDER BY laporan_tanggal_masuk ASC");
        $this->mylib->atview('v_laporan', $data);
    }

    function laporan_proses()
    {
        $data['laporan'] = $this->db->query("SELECT * FROM v_laporan WHERE laporan_status=1 ORDER BY laporan_tanggal_proses ASC");
        $this->mylib->atview('v_laporan_proses', $data);
    }

    function laporan_pending()
    {
        $data['laporan'] = $this->db->query("SELECT * FROM v_laporan WHERE laporan_bulan > 0 AND laporan_status = 0 OR laporan_hari > 7 AND laporan_status = 0 ORDER BY laporan_tanggal_masuk ASC");
        $this->mylib->atview('v_laporan_pending', $data);
    }

    function laporan_belum_proses()
    {
        $data['laporan'] = $this->db->query("SELECT * FROM v_laporan WHERE laporan_status = 0 AND laporan_bulan = 0 AND laporan_hari <= 7 ORDER BY laporan_tanggal_masuk ASC");
        $this->mylib->atview('v_laporan_belum_proses', $data);
    }

    function detail_laporan($id)
    {
        $w = [
            'laporan_id' => $id
        ];
        $data['laporan'] = $this->m_vic->edit_data($w, 'tbl_laporan')->row();
        $this->mylib->atview('v_detail_laporan', $data);
    }

    function change_pass()
    {
        $this->mylib->atview('v_change_pass');
    }

    function change_pass_act()
    {
        $this->form_validation->set_rules('new_pass1', 'Password Baru', 'trim|required|min_length[8]|matches[new_pass2]');
        $this->form_validation->set_rules('new_pass2', 'Konfirmasi Password Baru', 'trim|required|min_length[8]|matches[new_pass1]');
        if ($this->form_validation->run() != true) {
            $this->mylib->atview('v_change_pass');
        } else {
            $data = [
                'user_pass' => str_mod(vic_slug_akun($this->input->post('new_pass1'))),
            ];
            $w = [
                'user_id' => $this->session->userdata('id')
            ];
            $this->m_vic->update_data($w, $data, 'tbl_users');
            $this->session->set_flashdata('suces', 'Password Berhasil Di Ubah');
            redirect('atasan/change_pass?notif=suces');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
