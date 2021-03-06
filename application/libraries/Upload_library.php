<?php
Class Upload_library{
	//biến siêu đối tượng
	var $CI = '';
	function __construct(){
		$this-> CI = & get_instance();
	}
	// upload_path: duong dan luu file
	//file_name: ten the input upload file
	function upload($upload_path='',$file_name){
		$config = $this ->config($upload_path);
		$this-> CI-> load-> library('upload',$config);
		if($this-> CI-> upload-> do_upload($file_name)){
			$data = $this->CI->upload->data();
		}else{
			//khong upload thanh cong
			$data =$this-> CI->upload->display_errors();
		}
		return $data; 

	}

	//cấu hình upload file
	function config($upload_path){
		//Khai bao bien cau hinh
		$config = array();
		//thu muc chua file
		$config['upload_path'] = $upload_path;
		//Định dạng file được phép tải
		$config['allowed_types'] = 'jpg|png|gif';
		//Dung lượng tối đa
		$config['max_size'] ='1200';
		//Chiều rộng tối đa
		$config['max_width'] = '1028';
		//Chiều cao tối đa
		$config['max_height'] = '1028';

		return $config;

	}
}