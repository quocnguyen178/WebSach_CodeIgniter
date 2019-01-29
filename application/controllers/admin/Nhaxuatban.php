<?php
Class Nhaxuatban extends MY_Controller{
	function index(){
		$this-> load->model('nhaxuatban_model');
		//$this-> data['nhaxuatban'] = $this-> nhaxuatban_model->select_nxb();
		//lấy nội dung của biến message
		$message = $this-> session-> flashdata('message');
		$this-> data['message'] = $message;

		$total_rows = count($this-> nhaxuatban_model->select_nxb());
		$this-> data['total_rows'] = $total_rows;
		//load ra thu vien phan trang
		$this-> load-> library('pagination');
		$config = array();
		$config['total_rows'] = $total_rows;
		$config['base_url'] = base_url('admin/nhaxuatban/index/');
		$config['per_page'] = 5;//so luong san pham hien thi tren 1 trang
		$config['uri_segment'] =4;//phan doan hien thi so trang tren url
		$config['num_links'] = 2;
		$config['next_link'] = 'Trang kế tiếp';
		$config['prev_link'] = 'Trang trước';
		$config['cur_tag_open'] =  '<a class="currentpage">';
		$config['cur_tag_close'] =  '</a>';
		//$config['use_page_numbers'] = TRUE;
		//khoi tao cac cau hinh phan trang
		$this-> pagination-> initialize($config);
		$segment = $this -> uri->segment('4');
		//$segment = intval($segment);

		$name = $this-> input->get('name');
		if(isset($name) ){
			$list = $this-> db->like('tennxb',$name)->or_where('manxb',$name)->limit($config['per_page'],$segment)->get('nhaxuatban')->result_array();
			$this-> data['list'] = $list;
		}else{		
			//lay ra danh sach san pham thuoc the loai
			$list = $this->db->limit($config['per_page'],$segment)->get('nhaxuatban')->result_array();
			$this-> data['list'] = $list;
		}

		$this-> data['temp'] = 'admin/danhmuc/nhaxuatban';
		$this->load->view('admin/main',$this-> data);
	}
	public function check(){
		$this->load->model('nhaxuatban_model');
		$tennxb= $this-> input-> post('tennxb');
		$arr = $tennxb;
		if($this -> nhaxuatban_model-> check_name($arr)){
			//
			$this-> form_validation->set_message('check','%s đã tồn tại');
			return false;
		}else{
			return true;
		}
	}

	public function add(){
		$this-> load-> library('form_validation');
		$this-> load->helper('form'); 
		//neu ma co du lieu post len thi kiem tra
		if($this-> input-> post()){
			$this-> form_validation-> set_rules('tennxb','Tên nhà xuất bản','required|callback_check');
			$this-> form_validation-> set_message('required','%s không được bỏ trống!');
			//nhập liệu chính xác
			if($this-> form_validation->run()){
				//thêm vào csdl
				$tennxb = $this-> input->post('tennxb');
				$value = array(
					'tennxb' => $tennxb
				);
				$this->load->model('nhaxuatban_model');
				$this-> nhaxuatban_model->insert_nxb($value);
				$this-> session-> set_flashdata('message','Thêm thành công');
				redirect(base_url('admin/nhaxuatban/index'));
			

			}
		}
		$this-> data['temp'] = 'admin/danhmuc/addnxb';
		$this->load->view('admin/main',$this-> data);
	}
	public function editnxb(){
		$this-> load-> library('form_validation');
		$this-> load->helper('form'); 
		//lấy id cua nha xuat ban
		$id = $this-> uri-> segment('4');
		//ep kieu la so nguyen
		$id = intval($id);
		$this->load->model('nhaxuatban_model');
		$info = $this-> nhaxuatban_model->select_nxbid($id);
		if(!$info){
			$this-> session-> set_flashdata('message','Mã không tồn tại');
			redirect(base_url('admin/nhaxuatban/index'));
		}
		if($this-> input-> post()){
			$this-> form_validation-> set_rules('tennxb','Tên nhà xuất bản','required|callback_check');
			$this-> form_validation-> set_message('required','%s không được bỏ trống!');
			if($this-> form_validation->run()){
				//thêm vào csdl
				$tennxb = $this-> input->post('tennxb');
				$value = array(
					'tennxb' => $tennxb
				);
				$this->load->model('nhaxuatban_model');
				$this-> nhaxuatban_model->update_nxb($id,$value);
				$this-> session-> set_flashdata('message','Cập nhật dữ liệu thành công');
				redirect(base_url('admin/nhaxuatban/index'));
			}
		}


		$this-> data['info'] = $info;
		$this-> data['temp'] = 'admin/danhmuc/editnxb';
		$this->load->view('admin/main',$this-> data);

	}

	public function deletenxb(){
		//lấy id cua nha xuat ban
		$id = $this-> uri-> segment('4');
		//ep kieu la so nguyen
		$id = intval($id);
		$this->load->model('nhaxuatban_model');
		$info = $this-> nhaxuatban_model->select_nxbid($id);
		if(!$info){
			$this-> session-> set_flashdata('message','Mã không tồn tại');
			redirect(base_url('admin/nhaxuatban/index'));
		}
		//thực hiện xóa
		$this-> nhaxuatban_model->delete_nxb($id);
		$this-> session-> set_flashdata('message','Xóa dữ liệu thành thành công');
		redirect(base_url('admin/nhaxuatban/index'));
	}

	
}