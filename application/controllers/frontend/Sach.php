<?php
Class Sach extends MY_Controller{
	function __construct(){
		parent:: __construct();
	}
	function chitiet(){
		$this->load->model('danhmuc_model');
		$this->load->model('tacgia_model');
		$this->load->model('sach_model');
		$this->load->model('nhaxuatban_model');
		$this-> data['theloai'] = $this-> danhmuc_model->select_tl();
		$this-> data['tacgia'] = $this-> tacgia_model->select_tg();

		$this-> data['temp'] = 'frontend/home/sachchitiet';
		$this-> data['sachlienquan'] = 'frontend/home/layoutsachlienquan';

		$id = $this-> uri-> segment('4');
		$masach = $this-> sach_model->getsachid($id);
		$this-> data['sach_item'] = $masach;
		$manxb=$masach['manxb'];
		$matheloai=$masach['matheloai'];
		$matg= $this-> tacgia_model-> gettacgiasach($id);
		$ma= array();
		foreach ($matg as $key => $value) {
			$ma[]=$value['matacgia'];
		}
		$tentg = $this-> tacgia_model-> gettacgia_tg($ma);
		$this-> data['list'] = $this-> sach_model-> getsachlimit_tl($matheloai,$id);

		$tennxb = $this-> nhaxuatban_model->select_nxbid($manxb);
		$this-> data['tentg'] = $tentg;
		$this-> data['tennxb'] = $tennxb;
		$this->load->view('frontend/layoutchitiet',$this-> data);
	}
	function listsanphamgiamgia(){

		$this->load->model('danhmuc_model');
		$this->load->model('nhaxuatban_model');
		$this->load->model('tacgia_model');
		$this-> data['theloai'] = $this-> danhmuc_model->select_tl();
		$this-> data['tacgia'] = $this-> tacgia_model->select_tg();
		$this-> data['nhaxuatban'] = $this-> nhaxuatban_model->select_nxb();

		$this->load->model('sach_model');
		$sanpham=$this-> sach_model->getsach_giamgia();
		$this-> data['sanpham'] =$sanpham;
		//phan trang
		//lay tong so luong tat ca cac san pham
		$total_rows = count($sanpham);
		$this-> data['total_rows'] = $total_rows;
		//load ra thu vien phan trang
		$this-> load-> library('pagination');
		$config = array();
		$config['total_rows'] = $total_rows;
		$config['base_url'] = base_url('frontend/sach/listsanphamgiamgia/');
		$config['per_page'] = 9;//so luong san pham hien thi tren 1 trang
		$config['uri_segment'] =4;//phan doan hien thi so trang tren url
		$config['num_links'] = 2;
		$config['next_link'] = 'Trang kế tiếp';
		$config['prev_link'] = 'Trang trước';
		$config['cur_tag_open'] =  '<a class="currentpage">';
		$config['cur_tag_close'] =  '</a>';
		//$config['use_page_numbers'] = TRUE;
		//khoi tao cac cau hinh phan trang
		$this-> pagination-> initialize($config);
		$segment = $this -> uri->segment(4);
		//$segment = intval($segment);
		//lay ra danh sach san pham thuoc the loai
		$list = $this->db->where('giagiam < giagoc')->limit($config['per_page'],$segment)->get('sach')->result_array();

		$this-> data['list'] = $list;
		//var_dump($this-> data);
		//hien thi ra view
		$this-> data['danhmuc'] = 'frontend/home/sachgiam';
		$this->load->view('frontend/layoutdanhmuc',$this-> data);

	}
	function listsanphamnoibat(){

		$this->load->model('danhmuc_model');
		$this->load->model('nhaxuatban_model');
		$this->load->model('tacgia_model');
		$this-> data['theloai'] = $this-> danhmuc_model->select_tl();
		$this-> data['tacgia'] = $this-> tacgia_model->select_tg();
		$this-> data['nhaxuatban'] = $this-> nhaxuatban_model->select_nxb();

		$this->load->model('sach_model');
		$sanpham = $this-> sach_model->getsach();
		//phan trang
		//lay tong so luong tat ca cac san pham
		$total_rows = count($sanpham);
		$this-> data['total_rows'] = $total_rows;
		//load ra thu vien phan trang
		$this-> load-> library('pagination');
		$config = array();
		$config['total_rows'] = $total_rows;
		$config['base_url'] = base_url('frontend/sach/listsanphamnoibat/');
		$config['per_page'] = 9;//so luong san pham hien thi tren 1 trang
		$config['uri_segment'] =4;//phan doan hien thi so trang tren url
		$config['num_links'] = 2;
		$config['next_link'] = 'Trang kế tiếp';
		$config['prev_link'] = 'Trang trước';
		$config['cur_tag_open'] =  '<a class="currentpage">';
		$config['cur_tag_close'] =  '</a>';
		//$config['use_page_numbers'] = TRUE;
		//khoi tao cac cau hinh phan trang
		$this-> pagination-> initialize($config);
		$segment = $this -> uri->segment(4);
		//$segment = intval($segment);
		//lay ra danh sach san pham thuoc the loai
		$list = $this->db->order_by('masach','RANDOM')->limit($config['per_page'],$segment)->get('sach')->result_array();

		$this-> data['list'] = $list;
		//var_dump($this-> data);
		//hien thi ra view
		$this-> data['danhmuc'] = 'frontend/home/sachnoibat';
		$this->load->view('frontend/layoutdanhmuc',$this-> data);

	}
	public function search(){
		$this->load->model('danhmuc_model');
		$this->load->model('tacgia_model');
		$this->load->model('sach_model');
		$this->load->model('nhaxuatban_model');
		$this-> data['theloai'] = $this-> danhmuc_model->select_tl();
		$this-> data['tacgia'] = $this-> tacgia_model->select_tg();
		$this-> data['nhaxuatban'] = $this-> nhaxuatban_model->select_nxb();
		$key = $this-> input-> get('search');
		$this-> data['key'] = trim($key);
		$input = array();
		$input['like'] = array('tensach', $key);
		$input['giagoc'] = array('giagoc', $key);
		$input['giagiam'] = array('giagiam', $key);

		$list =  $this-> sach_model->search($input);

		$total_rows = count($list);
		
		$this-> data['total_rows'] = $total_rows;
		//load ra thu vien phan trang
		$this-> load-> library('pagination');
		$config = array();
		$config['total_rows'] = $total_rows;
		$config['base_url'] = base_url('frontend/sach/search/');
		$config['per_page'] = 9;//so luong san pham hien thi tren 1 trang
		$config['uri_segment'] =4;//phan doan hien thi so trang tren url
		$config['num_links'] = 2;
		$config['next_link'] = 'Trang kế tiếp';
		$config['prev_link'] = 'Trang trước';
		$config['cur_tag_open'] =  '<a class="currentpage">';
		$config['cur_tag_close'] =  '</a>';
		//$config['use_page_numbers'] = TRUE;
		//khoi tao cac cau hinh phan trang

		$this-> pagination-> initialize($config);
		$segment = $this -> uri->segment(4);
		$list =  $this-> db->like($input['like'][0], $input['like'][1])->limit($config['per_page'],$segment)->get('sach')->result_array();
		$this-> data['list'] = $list;
		
		$this-> data['danhmuc'] = 'frontend/search/listsearch';
		$this-> load->view('frontend/layoutdanhmuc',$this-> data);
	}
	public function hienthi(){
		$this->load->model('danhmuc_model');
		$this->load->model('tacgia_model');
		$this->load->model('sach_model');
		$this->load->model('nhaxuatban_model');
		$this-> data['theloai'] = $this-> danhmuc_model->select_tl();
		$this-> data['tacgia'] = $this-> tacgia_model->select_tg();
		$this-> data['nhaxuatban'] = $this-> nhaxuatban_model->select_nxb();
		
		$this->load->model('sach_model');
		$list = $this-> sach_model->getsachall();
		$this-> data['list'] = $list;
		
		$this-> data['danhmuc'] = 'frontend/home/hienthi';
		$this-> load->view('frontend/layoutdanhmuc',$this-> data);
	}
}