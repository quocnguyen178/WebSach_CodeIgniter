<?php
Class Test extends MY_Controller{
	function index(){
		$this-> load-> model('test_model');
		$this->load->model('danhmuc_model');
		$this->load->model('tacgia_model');
		$this->load->model('sach_model');
		$this->load->model('nhaxuatban_model');
		$this-> data['theloai'] = $this-> danhmuc_model->select_tl();
		$this-> data['tacgia'] = $this-> tacgia_model->select_tg();
		$this-> data['nhaxuatban'] = $this-> nhaxuatban_model->select_nxb();
		$this-> data['sach'] = $this-> test_model->getall();
		$this-> data['danhmuc'] = 'frontend/test';
		$this-> load-> view('frontend/layoutdanhmuc', $this->data);
	}
	function testchitiet(){
		$this-> load-> model('test_model');
		$this->load->model('danhmuc_model');
		$this->load->model('tacgia_model');
		$this->load->model('sach_model');
		$this->load->model('nhaxuatban_model');
		$this-> data['theloai'] = $this-> danhmuc_model->select_tl();
		$this-> data['tacgia'] = $this-> tacgia_model->select_tg();
		$this-> data['nhaxuatban'] = $this-> nhaxuatban_model->select_nxb();

		$id = $this-> uri-> segment(3);
		$sach =$this-> test_model-> getidsach($id);
		$this-> data['sach_item'] = $sach;
		$manxb = $sach['manxb'];
		$matg= $this-> tacgia_model-> gettacgiasach($id);
		$ma= array();
		foreach ($matg as $key => $value) {
			$ma[]=$value['matacgia'];
		}
		$tentg = $this-> tacgia_model-> gettacgia_tg($ma);
		$this-> data['tentg'] = $tentg;
		$this-> data['tennxb'] = $this-> test_model-> getnxb($manxb);

		$this-> data['temp'] = 'frontend/testchitiet';
		$this-> data['sachlienquan'] = 'frontend/home/layoutsachlienquan';
		$this-> load-> view('frontend/layoutchitiet', $this-> data);
	}
}