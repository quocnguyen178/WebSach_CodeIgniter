<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Model extends CI_Model{
	//Tên table
	var $table = '';

	//key chinh cua table
	var $key='id';

	//Order mac dinh(VD:$order = array('id',desc));
	var $order = '';

	//Cac field select mac dinh khi get_list(VD: $select = 'id, name')
	var $select = '';

	function create($data = array()){
		if($this->db->insert($this->table,$data)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}