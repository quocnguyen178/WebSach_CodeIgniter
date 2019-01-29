<?php
Class Cart extends MY_Controller{
	function __construct(){
		parent:: __construct();
		
	}
	//thêm sản phẩm vào giỏ hàng
	public function add(){
		$this->load->model('sach_model');
		$id = $this-> uri-> segment(4);
		$product = $this-> sach_model-> getsachid($id);
		$qty = 1;
		$data = array();
		$data['id'] = $product['masach'];
		$data['qty'] = $qty;
		$data['name'] = url_title($product['tensach']);
		$data['image_link'] = $product['urlhinh'];
		if(isset($product['giagiam']))
		{
		 $data['price'] = $product['giagiam'];
		}else{
			$data['price'] = $product['giagoc'];
		}
		// chuyen sang trang danh sach them san pham vao gio hang

		$this-> cart-> insert($data);
		redirect(base_url('frontend/cart'));
	}
	//hiển thị danh sach trong gio hang
	public function index(){
		//lấy toàn bộ dữ liệu trong giỏ hàng
		$carts = $this-> cart-> contents();
		//var_dump($carts);
		//tổng sản phẩm trong giỏ hàng
		$total_items = $this-> cart->total_items();

		$data['carts'] = $carts;
		$data['total_items'] = $total_items;

		$this->load->model('danhmuc_model');
		$this->load->model('tacgia_model');
		$data['theloai'] = $this->danhmuc_model->select_tl();
		$data['tacgia'] = $this->tacgia_model->select_tg();

		$data['temp'] = 'frontend/cart/index';
		$this-> load->view('frontend/layoutcart',$data);

	}
	//cập nhật giỏ hàng
	public function update(){
		//thong tin gio hang
		$carts = $this-> cart-> contents();
		foreach ($carts as $key => $value) {
			$total_qty= $this->input-> post('qty_'.$value['id']);
			$data = array();
			$data['rowid'] = $key;
			$data['qty'] = $total_qty;
			$this->cart->update($data);
		}
		redirect(base_url('frontend/cart'));
	}
	//xóa giỏ hàng
	public function del(){
		$id = $this-> uri-> segment(4);
		$id = intval($id);
		//trường hợp xóa 1 sản phẩm nào đó giỏ hàng
		if($id > 0){
			//thong tin gio hang
			$carts = $this-> cart-> contents();
			foreach ($carts as $key => $value) {
				if($value['id'] == $id){
					$data = array();
				$data['rowid'] = $key;
				$data['qty'] = 0;
				$this-> cart->update($data);
				}
				
			}
		}else{
			//xóa toàn bộ giỏ hàng
			$this-> cart-> destroy();
		}
		redirect(base_url('frontend/cart'));
	}
}
