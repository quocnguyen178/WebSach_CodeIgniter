<?php
Class MY_Controller extends CI_Controller{
	//bien gui du lieu sang ben view
	public $data = array();

	//My_controller để kế thừa tất cả các controller
	function __construct(){
		//kế thừa từ CI_Controller
		parent::__construct();
		$this-> load-> library('cart');

		$controller = $this->uri->segment(1);
		switch($controller){
			case 'admin' :
			{
				//sử dụng biến session
				$user_admin_login = $this-> session-> userdata('user_admin_login');
				$this->data['user_admin_login'] = $user_admin_login;
				break;
			}
			default:
			{
				$this-> load-> library('cart');
				$carts = $this-> cart-> contents();
				$total_items = $this-> cart->total_items();

				$this-> data['carts'] = $carts;
				$this-> data['total_items'] = $total_items;

				$user_id_login = $this-> session-> userdata('user_id_login');
				$this->data['user_id_login'] = $user_id_login;
			}
		}
	}

	//kiểm tra trạng thái đăng nhập của admin
	private function _check_login(){
		$controller = $this-> uri-> segment('2');
			$login = $this-> session-> userdata('login');
			if(!$login && $controller != 'login'){
				redirect(base_url('admin/login'));
			}
			if($login && $controller == 'login'){
				redirect(base_url('admin/admin'));
			}
	}
}