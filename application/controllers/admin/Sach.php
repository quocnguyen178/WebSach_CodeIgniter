<?php
Class Sach extends MY_Controller{
	function index(){
		$this->load->model('sach_model');

		$message = $this-> session-> flashdata('message');
		$this-> data['message'] = $message;

		$total_rows = count($this->sach_model->getsach());
		$this-> data['total_rows'] = $total_rows;
		//load ra thu vien phan trang
		$this-> load-> library('pagination');
		$config = array();
		$config['total_rows'] = $total_rows;
		$config['base_url'] = base_url('admin/sach/index/');
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
		//lấy phân đoạn thứ 4 tính từ controller
		$segment = $this -> uri->segment('4');
		$name = $this-> input->get('name');
		if(isset($name) ){
			$list = $this-> db->like('tensach',$name)->or_where('masach',$name)->limit($config['per_page'],$segment)->get('sach')->result_array();
			$this-> data['list'] = $list;
		}else{		
			//lay ra danh sach san pham thuoc the loai
			$list = $this->db->limit($config['per_page'],$segment)->get('sach')->result_array();
			$this-> data['list'] = $list;
		}		

		$this-> data['sach'] = $this->sach_model->getsach();
		$this-> data['temp'] = 'admin/danhmuc/sach';
		$this->load->view('admin/main',$this-> data);
	}
	public function check(){
		$this->load->model('sach_model');
		$tensach= $this-> input-> post('tensach');
		$arr = $tensach;
		if($this -> sach_model-> check_name($arr)){
			$this-> form_validation->set_message('check','%s đã tồn tại');
			return false;
		}else{
			return true;
		}
	}
	public function addsach(){
		$this-> load-> library('form_validation');
		$this-> load->helper('form'); 
		//neu ma co du lieu post len thi kiem tra
		if($this-> input-> post()){
			$this-> form_validation-> set_rules('tensach','Tên tên sách','required|callback_check');			
			$this-> form_validation-> set_rules('giagoc','Giá gốc','required');			
			$this-> form_validation-> set_message('required','%s không được bỏ trống!');
			//nhập liệu chính xác
			if($this-> form_validation->run()){
				//thêm vào csdl				
				$tensach = $this-> input->post('tensach');
				$mota = $this-> input->post('mota');
				$giagoc = $this-> input->post('giagoc');
				$giagiam = $this-> input->post('giagiam');
				$manxb = $this-> input->post('manxb');
				$matheloai = $this-> input->post('matheloai');
				//lấy tên file ảnh được upload lên
				$this-> load->library('upload_library');
				$upload_path= './public/products-images';
				$upload_data = $this-> upload_library-> upload($upload_path,'image');
				
				$image_link = '';
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}
				$value = array(
					'tensach' => $tensach,
					'mota' => $mota,
					'giagoc' => $giagoc,
					'giagiam' => $giagiam,
					'manxb' => $manxb,
					'matheloai' => $matheloai,
					'urlhinh' => $image_link
				);
				$this->load->model('sach_model');
				$this-> sach_model->insert_sach($value);
				$this-> session-> set_flashdata('message','Thêm thành công');
				redirect(base_url('admin/sach/index'));
			}
		}
		//lấy ra tên nhà xuất bản
		$this->load->model('nhaxuatban_model');
		$listnxb = $this-> nhaxuatban_model->select_nxb();
		$this-> data['listnxb'] = $listnxb;

		$this->load->model('danhmuc_model');
		$listtl = $this-> danhmuc_model->select_tl();
		$this-> data['listtl'] = $listtl;
		$this-> data['temp'] = 'admin/danhmuc/addsach';
		$this->load->view('admin/main',$this-> data);
	}
	public function editsach(){
		$this-> load-> library('form_validation');
		$this-> load->helper('form'); 
		//lấy id cua nha xuat ban
		$id = $this-> uri-> segment('4');
		//ep kieu la so nguyen
		$id = intval($id);
		$this->load->model('sach_model');
		$info = $this-> sach_model->getsachid($id);
		$this-> data['info'] = $info;
		if(!$info){
			$this-> session-> set_flashdata('message','Không tồn tại sản phẩm này');
			redirect(base_url('admin/sach/index'));
		}

		if($this-> input-> post()){
			$this-> form_validation-> set_rules('tensach','Tên sách','required|callback_check');
			$this-> form_validation-> set_rules('giagoc','Giá gốc','required');		
			$this-> form_validation-> set_message('required','%s không được bỏ trống!');

			//nhập liệu chính xác
			if($this-> form_validation->run()){
				//thêm vào csdl				
				$tensach = $this-> input->post('tensach');
				$mota = $this-> input->post('mota');
				$giagoc = $this-> input->post('giagoc');
				$giagiam = $this-> input->post('giagiam');
				$manxb = $this-> input->post('manxb');
				$matheloai = $this-> input->post('matheloai');
				//lấy tên file ảnh được upload lên
				$this-> load->library('upload_library');
				$upload_path= './public/products-images';
				$upload_data = $this-> upload_library-> upload($upload_path,'image');
				
				$image_link = '';
				if(isset($upload_data['file_name'])){
					$image_link = $upload_data['file_name'];
				}
				$value = array(
					'tensach' => $tensach,
					'mota' => $mota,
					'giagoc' => $giagoc,
					'giagiam' => $giagiam,
					'manxb' => $manxb,
					'matheloai' => $matheloai,
					
				);
				if($image_link != ''){
					$value['urlhinh']= $image_link;
				}
				$this->load->model('sach_model');
				$this-> sach_model->update_sach($id,$value);
				$this-> session-> set_flashdata('message','Cập nhật thành công');
				redirect(base_url('admin/sach/index'));
			}
		}	//lấy ra tên nhà xuất bản
		$this->load->model('nhaxuatban_model');
		$listnxb = $this-> nhaxuatban_model->select_nxb();
		$this-> data['listnxb'] = $listnxb;

		$this->load->model('danhmuc_model');
		$listtl = $this-> danhmuc_model->select_tl();
		$this-> data['listtl'] = $listtl;
		$this-> data['temp'] = 'admin/danhmuc/editsach';
		$this->load->view('admin/main',$this-> data);
	}
	public function deletesach(){
		//lấy id cua nha xuat ban
		$id = $this-> uri-> segment('4');
		//ep kieu la so nguyen
		$id = intval($id);
		$this->load->model('sach_model');
		$info = $this-> sach_model->getsachid($id);
		if(!$info){
			$this-> session-> set_flashdata('message','Sản phẩm không tồn tại');
			redirect(base_url('admin/sach/index'));
		}
		//thực hiện xóa
		$this-> sach_model->delete_sach($id);
		$this-> session-> set_flashdata('message','Xóa dữ liệu thành thành công');
		redirect(base_url('admin/sach/index'));
	}

}