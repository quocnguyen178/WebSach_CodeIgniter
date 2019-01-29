<?php
Class Home extends MY_Controller{
	function __construct(){
		parent:: __construct();
	}
	function index(){
		$this->load->model('danhmuc_model');
		$this->load->model('tacgia_model');
		$this->load->model('sach_model');
		
		$this-> data['list'] = $this-> sach_model-> getsachlimit_gia();
		$this-> data['theloai'] = $this-> danhmuc_model->select_tl();
		$this-> data['tacgia'] = $this-> tacgia_model->select_tg();
		//$this-> data['sach'] = $this->sach_model->getsach();

		$this-> data['temp'] = 'frontend/home/index';

		$message = $this-> session-> flashdata('message');
		$this->data['message'] = $message;
		
		$this->load->view('frontend/layout',$this-> data);
	}
}