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
        $data['laporan'] = $this->db->query("SELECT * FROM v_laporan WHERE laporan_bulan > 0 AND laporan_status = 0 OR laporan_hari > 7 AND laporan_status = 0 ORDER BY laporan_tanggal_masuk DESC");
        $this->mylib->atview('v_laporan_pending', $data);
    }
}
