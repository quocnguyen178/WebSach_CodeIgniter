<?php
Class Tacgia extends MY_Controller{
	function index(){
		$this->load->model('tacgia_model');
		//$this-> data['tacgia'] = $this-> tacgia_model->select_tg();

		$message = $this-> session-> flashdata('message');
		$this-> data['message'] = $message;

		$total_rows = count($this->tacgia_model->select_tg());
		$this-> data['total_rows'] = $total_rows;
		//load ra thu vien phan trang
		$this-> load-> library('pagination');
		$config = array();
		$config['total_rows'] = $total_rows;
		$config['base_url'] = base_url('admin/tacgia/index/');
		$config['per_page'] = 10;//so luong san pham hien thi tren 1 trang
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
			$list = $this-> db->like('tentacgia',$name)->or_where('matacgia',$name)->limit($config['per_page'],$segment)->get('tacgia')->result_array();
			$this-> data['list'] = $list;
		}else{		
			//lay ra danh sach san pham thuoc the loai
			$list = $this->db->limit($config['per_page'],$segment)->get('tacgia')->result_array();
			$this-> data['list'] = $list;
		}

		$this-> data['temp'] = 'admin/danhmuc/tacgia';
		$this->load->view('admin/main',$this-> data);
	}
	public function check(){
		$this->load->model('tacgia_model');
		$tentacgia= $this-> input-> post('tentacgia');
		$arr = $tentacgia;
		if($this -> tacgia_model-> check_name($arr)){
			//
			$this-> form_validation->set_message('check','%s đã tồn tại');
			return false;
		}else{
			return true;
		}
	}
	public function addtacgia(){
		$this-> load-> library('form_validation');
		$this-> load->helper('form'); 
		//neu ma co du lieu post len thi kiem tra
		if($this-> input-> post()){
			$this-> form_validation-> set_rules('tentacgia','Tên tác giả','required|callback_check');
			$this-> form_validation-> set_message('required','%s không được bỏ trống!');
			//nhập liệu chính xác
			if($this-> form_validation->run()){
				//thêm vào csdl
				$tentacgia = $this-> input->post('tentacgia');
				$value = array(
					'tentacgia' => $tentacgia
				);
				$this->load->model('tacgia_model');
				$this-> tacgia_model->insert_tacgia($value);
				$this-> session-> set_flashdata('message','Thêm thành công');
				redirect(base_url('admin/tacgia/index'));
			}
		}
		$this-> data['temp'] = 'admin/danhmuc/addtacgia';
		$this->load->view('admin/main',$this-> data);
	}
	public function edittacgia(){
		$this-> load-> library('form_validation');
		$this-> load->helper('form'); 
		//lấy id cua nha xuat ban
		$id = $this-> uri-> segment('4');
		//ep kieu la so nguyen
		$id = intval($id);
		$this->load->model('tacgia_model');
		$info = $this-> tacgia_model->select_tgid($id);
		if(!$info){
			$this-> session-> set_flashdata('message','Mã không tồn tại');
			redirect(base_url('admin/tacgia/index'));
		}
		if($this-> input-> post()){
			$this-> form_validation-> set_rules('tentacgia','Tên tác giả','required|callback_check');
			$this-> form_validation-> set_message('required','%s không được bỏ trống!');
			if($this-> form_validation->run()){
				//thêm vào csdl
				$tentacgia = $this-> input->post('tentacgia');
				$value = array(
					'tentacgia' => $tentacgia
				);
				$this-> tacgia_model->update_tacgia($id,$value);
				$this-> session-> set_flashdata('message','Cập nhật dữ liệu thành công');
				redirect(base_url('admin/tacgia/index'));
			}
		}


		$this-> data['info'] = $info;
		$this-> data['temp'] = 'admin/danhmuc/edittacgia';
		$this->load->view('admin/main',$this-> data);

	}

	public function deletetacgia(){
		//lấy id cua nha xuat ban
		$id = $this-> uri-> segment('4');
		//ep kieu la so nguyen
		$id = intval($id);
		$this->load->model('tacgia_model');
		$info = $this-> tacgia_model->select_tgid($id);
		if(!$info){
			$this-> session-> set_flashdata('message','Mã không tồn tại');
			redirect(base_url('admin/tacgia/index'));
		}
		//thực hiện xóa
		$this-> tacgia_model->delete_tacgia($id);
		$this-> session-> set_flashdata('message','Xóa dữ liệu thành thành công');
		redirect(base_url('admin/tacgia/index'));
	}
}