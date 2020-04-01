<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
        $this->load->helper('url');
        $this->load->helper('vic_helper');
        $this->load->helper('my_helper');
        $this->load->helper('vic_convert_helper');
        $this->load->library(array('session','form_validation'));
        $this->load->model('m_vic');
	}

	public function index()
	{
		// $this->load->helper('captcha');
		// $this->load->library('form_validation');
		// $this->load->library('session');
		// $random_number = substr(number_format(time() * rand(),0,'',''),0,6);
		// $vals = array(
		// 	'word' => $random_number,
		// 	'img_path' => './captcha/',
		// 	'img_url' => base_url().'captcha/',
		// 	'img_width' => 270,
		// 	'img_height' => 32,
        //     //'expiration' => 7200
		// 	'expiration' => 20
		// );
		// $data['captcha'] = create_captcha($vals);
		// $this->session->set_userdata('captchaWord',$data['captcha']['word']);
        // $this->load->view('v_admin_login',$data);
        $this->load->view('v_admin_login');
	}

	function cek(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[70]');
        $this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required|max_length[100]');
        // $this->form_validation->set_rules('userCaptcha', 'Captcha', 'required|callback_check_captcha');
        // $userCaptcha = $this->input->post('userCaptcha');

        if($this->form_validation->run() != true){
            redirect('auth');
        }else{
            $uname = vic_slug_akun($this->input->post('username'));
            $pass = str_mod(vic_slug_akun($this->input->post('password')));
            $where = array(
                'user_login' => $uname,
                'user_pass' => $pass,
                'user_status' => 'Aktif'
                );
            $data = $this->m_vic->edit_data($where,'tbl_users');
            if($data->num_rows() > 0){
                $mydata = $data->row();
                $session = array(
                    'id' => $mydata->user_id,
                    'username' => $mydata->user_login,
                    'name' => $mydata->user_name,
                    'komisi' => $mydata->user_komisi,
                    'email' => $mydata->user_email,
                    'level' => $mydata->user_level,
                    'status' => 'loginadmin'
                );
                $this->session->set_userdata($session);
                // redirect('admin');
                if ($mydata->user_level == 99) {
                   redirect('admin');
                }elseif ($mydata->user_level == 1) {
                    redirect('operator');
                // }elseif ($mydata->peg_level == 2) {
                //     redirect('pim');
                }else{
                     redirect(base_url().'auth/?alert=login-failed');
                }
            } else {
                redirect(base_url().'auth/?alert=login-failed');
            }
        }
    }

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

    function check_captcha($str){
        $word = $this->session->userdata('captchaWord');
        if(strcmp(strtoupper($str),strtoupper($word)) == 0){
            return true;
        }else{
            $this->form_validation->set_message('check_captcha', 'Please enter correct words!');
            return false;
        }
    }

}