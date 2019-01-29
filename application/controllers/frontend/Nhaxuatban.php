<?php
Class Nhaxuatban extends MY_Controller{
	function __construct(){
		parent:: __construct();
	}
	function listsanphamnxb(){
		$this->load->model('tacgia_model');
		$this->load->model('danhmuc_model');
		$this->load->model('nhaxuatban_model');
		$this-> data['theloai'] = $this-> danhmuc_model->select_tl();
		$this-> data['tacgia'] = $this-> tacgia_model->select_tg();
		$this-> data['nhaxuatban'] = $this-> nhaxuatban_model->select_nxb();

		$this->load->model('sach_model');
		$id = $this-> uri-> segment('4');
		//$sanpham=$this->sach_model->getsach_tl($id);
		//$this-> data['sanpham'] =$sanpham;

		//phan trang
		//lay tong so luong tat ca cac san pham
		$total_rows = count($this-> sach_model->getsach_nxb($id));
		$this-> data['total_rows'] = $total_rows;
		//load ra thu vien phan trang
		$this-> load-> library('pagination');
		$config = array();
		$config['total_rows'] = $total_rows;
		$config['base_url'] = base_url('frontend/nhaxuatban/listsanphamnxb/'.$id);
		$config['per_page'] = 3;//so luong san pham hien thi tren 1 trang
		$config['uri_segment'] =5;//phan doan hien thi so trang tren url
		$config['num_links'] = 2;
		$config['next_link'] = 'Trang kế tiếp';
		$config['prev_link'] = 'Trang trước';
		$config['cur_tag_open'] =  '<a class="currentpage">';
		$config['cur_tag_close'] =  '</a>';
		//$config['use_page_numbers'] = TRUE;
		//khoi tao cac cau hinh phan trang
		$this-> pagination-> initialize($config);
		$segment = $this -> uri->segment('5');
		//$segment = intval($segment);

		
		//lay ra danh sach san pham thuoc the loai
		$list = $this->db->where('manxb',$id)->limit($config['per_page'],$segment)->get('sach')->result_array();

		$this-> data['list'] = $list;
		$this-> data['nxbid'] = $this-> nhaxuatban_model->select_nxbid($id);
		//var_dump($this-> data);
		//hien thi ra view
		$this-> data['danhmuc'] = 'frontend/nhaxuatban/listnxb';
		$this->load->view('frontend/layoutdanhmuc',$this-> data);

	}
}