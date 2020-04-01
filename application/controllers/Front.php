<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
        $this->load->helper('url');
        $this->load->helper('vic_helper');
        $this->load->helper('my_helper');
        $this->load->helper('vic_convert_helper');
        $this->load->library(array('session','form_validation','mylib'));
        $this->load->model('m_vic');
	}

	public function index()
	{   
        $data['komisi'] = $this->m_vic->get_data('tbl_komisi');
        $this->mylib->fview('v_home',$data);
    }
    
    function daftar()
    {
        $this->mylib->fview('v_daftar');
    }

    function daftar_act()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('no_hp', 'No. HP', 'required');
        if ($this->form_validation->run() != true) {
            $this->mylib->fview('v_daftar');
        }else {
            $data = [
                'masyarakat_nik' => $this->input->post('nik'),
                'masyarakat_nama' => $this->input->post('nama'),
                'masyarakat_email' => $this->input->post('email'),
                'masyarakat_no_hp' => $this->input->post('no_hp'),
                'masyarakat_pass' => str_mod(vic_slug_akun($this->input->post('pass')))
            ];
            $this->m_vic->insert_data($data,'tbl_masyarakat');
            $this->session->set_flashdata('suces','Akun Berhasil Di Daftarkan');
		    redirect('front/daftar?notif=suces');
        }
    }

    function login()
    {
        $this->load->view('front/v_login_masyarakat');
    }

    function cek(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[70]');
        $this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required|max_length[100]');
        // $this->form_validation->set_rules('userCaptcha', 'Captcha', 'required|callback_check_captcha');
        // $userCaptcha = $this->input->post('userCaptcha');

        if($this->form_validation->run() != true){
            redirect('front/login');
        }else{
            $uname = vic_slug_akun($this->input->post('username'));
            $pass = str_mod(vic_slug_akun($this->input->post('password')));
            $where = array(
                'masyarakat_nik' => $uname,
                'masyarakat_pass' => $pass,
                );
            $data = $this->m_vic->edit_data($where,'tbl_masyarakat');
            if($data->num_rows() > 0){
                $mydata = $data->row();
                $session = array(
                    'id' => $mydata->masyarakat_id,
                    'username' => $mydata->masyarakat_nik,
                    'name' => $mydata->masyarakat_nama,
                    // 'email' => $mydata->user_email,
                    // 'level' => $mydata->user_level,
                    'status' => 'loginmasyarakat'
                );
                $this->session->set_userdata($session);
                redirect('masyarakat');
                // if ($mydata->user_level == 99) {
                //    redirect('admin');
                // }elseif ($mydata->user_level == 1) {
                //     redirect('operator');
                // // }elseif ($mydata->peg_level == 2) {
                // //     redirect('pim');
                // }else{
                //      redirect(base_url().'auth/?alert=login-failed');
                // }
            } else {
                redirect(base_url().'front/login?alert=login-failed');
            }
        }
    }

	// function cek(){
    //     $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[70]');
    //     $this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required|max_length[100]');
    //     // $this->form_validation->set_rules('userCaptcha', 'Captcha', 'required|callback_check_captcha');
    //     // $userCaptcha = $this->input->post('userCaptcha');

    //     if($this->form_validation->run() != true){
    //         redirect('auth');
    //     }else{
    //         $uname = vic_slug_akun($this->input->post('username'));
    //         $pass = str_mod(vic_slug_akun($this->input->post('password')));
    //         $where = array(
    //             'user_login' => $uname,
    //             'user_pass' => $pass,
    //             'user_status' => 'Aktif'
    //             );
    //         $data = $this->m_vic->edit_data($where,'tbl_users');
    //         if($data->num_rows() > 0){
    //             $mydata = $data->row();
    //             $session = array(
    //                 'id' => $mydata->user_id,
    //                 'username' => $mydata->user_login,
    //                 'name' => $mydata->user_name,
    //                 'email' => $mydata->user_email,
    //                 'level' => $mydata->user_level,
    //                 'status' => 'loginadmin'
    //             );
    //             $this->session->set_userdata($session);
    //             // redirect('admin');
    //             if ($mydata->user_level == 99) {
    //                redirect('admin');
    //             }elseif ($mydata->user_level == 1) {
    //                 redirect('operator');
    //             // }elseif ($mydata->peg_level == 2) {
    //             //     redirect('pim');
    //             }else{
    //                  redirect(base_url().'auth/?alert=login-failed');
    //             }
    //         } else {
    //             redirect(base_url().'auth/?alert=login-failed');
    //         }
    //     }
    // }

    // public function register()
    // {
    //     $this->load->helper('captcha');
    //     $this->load->library('form_validation');
    //     $this->load->library('session');
    //     $random_number = substr(number_format(time() * rand(),0,'',''),0,6);
    //     $vals = array(
    //         'word' => $random_number,
    //         'img_path' => './captcha/',
    //         'img_url' => base_url().'captcha/',
    //         'img_width' => 160,
    //         'img_height' => 32,
    //         //'expiration' => 7200
    //         'expiration' => 20
    //     );
    //     $data['captcha'] = create_captcha($vals);
    //     $this->session->set_userdata('captchaWord',$data['captcha']['word']);
    //     $this->load->view('v_pegawai_register',$data);
    // }

    // public function register_act()
    // {
    //     // regiter action
    // }

    // function check_captcha($str){
    //     $word = $this->session->userdata('captchaWord');
    //     if(strcmp(strtoupper($str),strtoupper($word)) == 0){
    //         return true;
    //     }else{
    //         $this->form_validation->set_message('check_captcha', 'Please enter correct words!');
    //         return false;
    //     }
    // }

}