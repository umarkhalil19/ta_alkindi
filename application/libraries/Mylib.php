<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mylib
{
	
	/*fungsi membuat menampilkan halaman tertentu*/
	function mview($view,$data=array())
	{
		$ci =& get_instance();
		if (!array_key_exists('title', $data)) {
			$data['title'] = 'SIMAIL - SI Email Unimal';
		}
		$ci->load->view('masyarakat/template/v_header', $data);
		$ci->load->view('masyarakat/template/v_sidebar', $data);
		if ($data) {
			$ci->load->view('masyarakat/'.$view,$data);
		}else{
			$ci->load->view($view);
		}
		$ci->load->view('masyarakat/template/v_footer', $data);
	}

	function aview($view,$data=array())
	{
		$ci =& get_instance();
		if (!array_key_exists('title', $data)) {
			$data['title'] = 'SIMAIL - SI Email Unimal';
		}
		$ci->load->view('admin/template/v_header', $data);
		$ci->load->view('admin/template/v_sidebar', $data);
		if ($data) {
			$ci->load->view('admin/'.$view,$data);
		}else{
			$ci->load->view($view);
		}
		$ci->load->view('admin/template/v_footer', $data);
	}

	function fview($view,$data=array())
	{
		$ci =& get_instance();
		if (!array_key_exists('title', $data)) {
			$data['title'] = 'SIMAIL - SI Email Unimal';
		}
		$ci->load->view('front/template/v_header', $data);
		$ci->load->view('front/template/v_sidebar', $data);
		if ($data) {
			$ci->load->view('front/'.$view,$data);
		}else{
			$ci->load->view($view);
		}
		$ci->load->view('front/template/v_footer', $data);
	}

	function oview($view,$data=array())
	{
		$ci =& get_instance();
		if (!array_key_exists('title', $data)) {
			$data['title'] = 'SIMAIL - SI Email Unimal';
		}
		$ci->load->view('operator/template/v_header', $data);
		$ci->load->view('operator/template/v_sidebar', $data);
		if ($data) {
			$ci->load->view('operator/'.$view,$data);
		}else{
			$ci->load->view($view);
		}
		$ci->load->view('operator/template/v_footer', $data);
	}

	function autoCode($field_code, $initial, $tabel)
	{
		$ci = &get_instance();
		$ci->db->order_by($field_code, 'DESC');
		$res = $ci->db->get($tabel);
		$data = $res->row_array();
		if ($data) {
			$value = $data[$field_code];
			$result = substr($value, 4, 8);
			$result = (int)$result;
			$result = $result + 1;
			$coderesult = $initial . "-" . STR_PAD($result, 8, "0", STR_PAD_LEFT);
		} else {
			$coderesult = $initial . "-" . "00000001";
		}
		return $coderesult;
	}

}