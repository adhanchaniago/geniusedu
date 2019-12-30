<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('data');
    }
    
    public function index()
	{
		$this->load->view('login');
    }
    
    public function aksi_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$passwordhash = $this->db->get_where('user',array('user_username' => $username))->result();
		foreach ($passwordhash as $key) {}

		if (!empty($username) AND !empty($password)) {

			if(password_verify($password, $key->user_password)){
 
				$data_session = array(
					'id_user' => $key->user_id,
					'namauser' => $key->user_nama,
					'username' => $username,
					'level' => $key->user_level,
					'status' => "login"
				);
	 
				$this->session->set_userdata($data_session);

				echo 1;
	 
			}else{
				echo 0;
			}
		}else{
			echo 0;
		}
    }
    
    public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}

?>