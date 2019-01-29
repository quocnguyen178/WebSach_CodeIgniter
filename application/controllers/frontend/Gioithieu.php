<?php
Class Gioithieu extends MY_Controller{
	function index(){
		$this->load->model('danhmuc_model');
		$this->load->model('tacgia_model');
		$this->load->model('sach_model');
		$this->load->model('nhaxuatban_model');
		$this-> data['theloai'] = $this-> danhmuc_model->select_tl();
		$this-> data['tacgia'] = $this-> tacgia_model->select_tg();
		$this-> data['nhaxuatban'] = $this-> nhaxuatban_model->select_nxb();
		
		
		$this-> data['danhmuc'] = 'frontend/gioithieu';
		$this-> load->view('frontend/layoutdanhmuc',$this-> data);
	}
}