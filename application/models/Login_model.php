<?php
Class Login_model extends CI_Model{
public function admin_login($user,$pass) {
    $this->load->model('login_model');

    $username=$this-> login_model->hash($user);
    $password=$this-> login_model->hash($pass);

    $this-> db-> where('taikhoan', $user);
    $this-> db-> where('matkhau', $pass);
    $query = $this-> db-> get('admin');
    $item=$query->row();
    if($query->num_rows()>0 && $username==$item->taikhoan && $password==$item->matkhau) {        
        $this->session->set_userdata(array(
            
            'admin_user'=> $item->taikhoan,
            'admin_pass'=> $item->matkhau
        ));
        return true;
    }
    else {
        return false;
    }
}
public function admin_logged_in() {
    if($this->session->has_userdata('admin_user') && $this->session->has_userdata('admin_pass')) {
        return true;
    }
    else {
        return false;
    }
}
public function admin_logout() {
    $this->session->unset_userdata(array('admin_user','admin_pass'));
}
}