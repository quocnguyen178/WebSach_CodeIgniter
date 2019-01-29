<?php 
Class User extends MY_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}
	public function check_email(){
		$this->load->model('user_model');
		$email= $this-> input-> post('email');
		$value = $email;
		if($this -> user_model-> check_name($value)){
			$this-> form_validation->set_message('check_email','%s đã tồn tại');
			return false;
		}else{
			return true;
		}
	}
	public function check_sdt(){
		$this->load->model('user_model');
		$sdt= $this-> input-> post('sdt');
		$value = $sdt;
		if($this -> user_model-> check_sdt($value)){
			$this-> form_validation->set_message('check_sdt','%s đã tồn tại');
			return false;
		}else{
			return true;
		}
	}
	public function dangky(){
		$this->load->model('tacgia_model');
		$this->load->model('danhmuc_model');
		$this->load->model('nhaxuatban_model');
		
		$this-> data['theloai'] = $this-> danhmuc_model->select_tl();
		$this-> data['nhaxuatban'] = $this-> nhaxuatban_model->select_nxb();
		$this-> data['tacgia'] = $this-> tacgia_model->select_tg();

		$this-> load-> library('form_validation');
		$this-> load-> helper('form');

		if($this-> input->post()){
			$this-> form_validation-> set_rules('email','Email','callback_check_email');
			$this-> form_validation-> set_rules('sdt','Số điện thoại','callback_check_sdt');
			$password = $this-> input-> post('password');
				
			if($this-> form_validation->run()){
				$password = md5($password);
				$data = array(
					'email' => $this-> input-> post('email'),
					'matkhau' => $password,
					'tenkhachhang' => $this-> input-> post('ten'),
					'diachi' => $this-> input-> post('diachi'),
					'sodt' => $this-> input-> post('sdt')
				);
				//var_dump($data);
				//$this-> user_model-> create($data);
				
				if($this-> user_model-> create($data)){
					$this->data['message'] = 'Đăng ký thành công';
				}else{
					$this->data['message'] = 'Đăng ký thất bại';
				}
			}
				
			
		}
		//$message = $this-> session-> flashdata('message');
		//$this->data['message'] = $message;
		$this-> data['danhmuc'] = 'frontend/user/dangky';
		$this->load->view('frontend/layoutdanhmuc',$this-> data);
	}
	public function dangnhap(){
		$this->load->model('tacgia_model');
		$this->load->model('danhmuc_model');
		$this->load->model('nhaxuatban_model');
		
		$this-> data['theloai'] = $this-> danhmuc_model->select_tl();
		$this-> data['nhaxuatban'] = $this-> nhaxuatban_model->select_nxb();
		$this-> data['tacgia'] = $this-> tacgia_model->select_tg();

		$this-> load-> library('form_validation');
		$this-> load-> helper('form');

		if($this-> input->post()){
			$this-> form_validation-> set_rules('email','Email','required|valid_email');
			$this-> form_validation-> set_rules('password','Mật khẩu','required');
			$this-> form_validation-> set_message('required','%s không được bỏ trống!');
			$this-> form_validation-> set_rules('login','login', 'callback_check_login');
			if($this-> form_validation->run()){
				//tao bien session
				$user = $this->_get_user_info();
				$this-> session-> set_userdata('user_id_login',$user);
				$this-> session-> set_flashdata('message', 'Đăng nhập thành công');
				redirect(base_url('home/index'));
			}
		}

		$this-> data['danhmuc'] = 'frontend/user/dangnhap';
		$this->load->view('frontend/layoutdanhmuc',$this-> data);
	}
	function check_login(){
		$user= $this->_get_user_info();
		if($user){
			return true;
		}else{
			$this-> form_validation->set_message('check_login','Không đăng nhập thành công');
			return false;
		}
	}
	function _get_user_info(){
		$email = $this-> input-> post('email');
		$password = $this-> input-> post('password');
		$password = md5($password);
		$this-> load-> model('user_model');
		$where = array('email' => $email, 'matkhau' => $password);
		$user = $this-> user_model-> get_info_rule($where);
		return $user;
	}
	public function logout() {
        if($this-> session->userdata('user_id_login')){
        	$this-> session-> set_flashdata('message', 'Đăng nhập thành công');
        	$this-> session-> unset_userdata('user_id_login');
        }
        redirect(base_url('home'));
    }
}