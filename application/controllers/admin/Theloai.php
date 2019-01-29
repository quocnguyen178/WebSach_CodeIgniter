<?php
Class Theloai extends MY_Controller{
	function index(){
		$this->load->model('danhmuc_model');
		//$this-> data['theloai'] = $this->danhmuc_model->select_tl();
		
		$message = $this-> session-> flashdata('message');
		$this-> data['message'] = $message;

		$message = $this-> session-> flashdata('message');
		$this-> data['message'] = $message;

		$total_rows = count($this->danhmuc_model->select_tl());
		$this-> data['total_rows'] = $total_rows;
		//load ra thu vien phan trang
		$this-> load-> library('pagination');
		$config = array();
		$config['total_rows'] = $total_rows;
		$config['base_url'] = base_url('admin/theloai/index/');
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
			$list = $this-> db->like('tentheloai',$name)->or_where('matheloai',$name)->limit($config['per_page'],$segment)->get('theloai')->result_array();
			$this-> data['list'] = $list;
		}else{		
			//lay ra danh sach san pham thuoc the loai
			$list = $this->db->limit($config['per_page'],$segment)->get('theloai')->result_array();
			$this-> data['list'] = $list;
		}
			

		$this-> data['temp'] = 'admin/danhmuc/theloai';
		$this->load->view('admin/main',$this-> data);
	}
	public function check(){
		$this->load->model('danhmuc_model');
		$tentheloai= $this-> input-> post('tentheloai');
		$arr = $tentheloai;
		if($this -> danhmuc_model-> check_name($arr)){
			//
			$this-> form_validation->set_message('check','%s đã tồn tại');
			return false;
		}else{
			return true;
		}
	}
	public function check_id(){
		$this->load->model('danhmuc_model');
		$matheloai= $this-> input-> post('matheloai');
		$arr = $matheloai;
		if($this -> danhmuc_model-> check_id($arr)){
			//
			$this-> form_validation->set_message('check_id','%s đã tồn tại');
			return false;
		}else{
			return true;
		}
	}
	public function addtheloai(){
		$this-> load-> library('form_validation');
		$this-> load->helper('form'); 
		//neu ma co du lieu post len thi kiem tra
		if($this-> input-> post()){
			$this-> form_validation-> set_rules('matheloai','Mã thể loại','required|callback_check_id');
			$this-> form_validation-> set_rules('tentheloai','Tên thể loại','required|callback_check');
			$this-> form_validation-> set_message('required','%s không được bỏ trống!');
			//nhập liệu chính xác
			if($this-> form_validation->run()){
				//thêm vào csdl
				$matheloai = $this-> input-> post('matheloai');
				$tentheloai = $this-> input->post('tentheloai');
				$value = array(
					'matheloai' => $matheloai,
					'tentheloai' => $tentheloai
				);
				$this->load->model('danhmuc_model');
				$this-> danhmuc_model->insert_theloai($value);
				$this-> session-> set_flashdata('message','Thêm thành công');
				redirect(base_url('admin/theloai/index'));
			

			}
		}
		$this-> data['temp'] = 'admin/danhmuc/addtheloai';
		$this->load->view('admin/main',$this-> data);
	}
	public function edittheloai(){
		$this-> load-> library('form_validation');
		$this-> load->helper('form'); 
		//lấy id cua the loai
		$id = $this-> uri-> segment('4');
		
		$this->load->model('danhmuc_model');
		$info = $this-> danhmuc_model->select_tlid($id);
		if(!$info){
			$this-> session-> set_flashdata('message','Mã không tồn tại');
			redirect(base_url('admin/theloai/index'));
		}
		if($this-> input-> post()){
			$this-> form_validation-> set_rules('tentheloai','Tên thể loại','required|callback_check');
			$this-> form_validation-> set_message('required','%s không được bỏ trống!');
			if($this-> form_validation->run()){
				//thêm vào csdl
				$tentheloai = $this-> input->post('tentheloai');
				$value = array(
					'tentheloai' => $tentheloai
				);
				$this-> danhmuc_model->update_theloai($id,$value);
				$this-> session-> set_flashdata('message','Cập nhật dữ liệu thành công');
				redirect(base_url('admin/theloai/index'));
			}
		}


		$this-> data['info'] = $info;
		$this-> data['temp'] = 'admin/danhmuc/edittheloai';
		$this->load->view('admin/main',$this-> data);

	}
	public function deletetheloai(){
		//lấy id cua nha xuat ban
		$id = $this-> uri-> segment('4');
		$this->load->model('danhmuc_model');
		$info = $this-> danhmuc_model->select_tlid($id);
		if(!$info){
			$this-> session-> set_flashdata('message','Mã không tồn tại');
			redirect(base_url('admin/theloai/index'));
		}
		//thực hiện xóa
		$this-> danhmuc_model->delete_theloai($id);
		$this-> session-> set_flashdata('message','Xóa dữ liệu thành thành công');
		redirect(base_url('admin/theloai/index'));
	}
}