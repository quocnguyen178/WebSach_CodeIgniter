<?php
Class Test_model extends CI_Model{
	protected $table_tl = "sach";
	function getall(){
		return $this-> db-> get($this-> table_tl)->result_array();
	}
	function getidsach($id){
		$this-> db-> where('masach', $id);
		return $this-> db-> get('sach')-> row_array();
	}
	function getnxb($nxb){
		$this-> db-> where('manxb', $nxb);
		return $this-> db-> get('nhaxuatban')-> row_array();
	}
	function gettheloai($tl){
		$this-> db-> where('matheloai', $tl);
		return $this-> db-> get('theloai')-> row_array();
	}
	public function gettacgia_tg($arrmatacgia){
		$this-> db-> where_in("matacgia",$arrmatacgia);
		return $this->db->get($this->table_tacgia)->result_array();
	}

}