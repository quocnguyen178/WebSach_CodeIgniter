<?php
Class Login extends MY_Controller{
	function __construct() {
        parent::__construct();
        $this->load->model('login_model');
    }
	function index(){
		$this-> load-> library('form_validation');
		$this-> load-> helper('form');

		
		if($this-> input->post()){
			 $this-> form_validation-> set_rules('username','Tên đăng nhập','required');
			$this-> form_validation-> set_rules('password','Mật khẩu','required');
			$this-> form_validation-> set_message('required','%s không được bỏ trống!');
			$this-> form_validation-> set_rules('login','login', 'callback_check_login');
			if($this-> form_validation->run()){
				$admin = $this->_get_admin_info();
				//tạo biến session
				$this-> session-> set_userdata('user_admin_login',$admin);
				//tạo biến session sử dụng 1 lần để hiện thị
				$this-> session-> set_flashdata('message', 'Đăng nhập thành công');
				redirect(base_url('admin/home/index'));
			}
		}

		$this->load->view('admin/login/index');
	}
	//kiểm tra username va password co chinh xac khong
	function check_login(){
		$admin= $this->_get_admin_info();

		if($admin){
			return true;
		}else{
			$this-> form_validation->set_message('check_login','Không đăng nhập thành công');
			return false;
		}
	}
	function _get_admin_info(){
		$taikhoan = $this-> input-> post('username');
		$matkhau = $this-> input-> post('password');
		$this-> load-> model('admin_model');
		$where = array('taikhoan' => $taikhoan, 'matkhau' => $matkhau);
		$admin = $this-> admin_model-> get_info_rule($where);
		return $admin;
	}
    public function logout() {
        if($this-> session->userdata('login')){
        	$this-> session-> unset_userdata('login');
        }
        redirect(base_url('login/index'));
    }
}