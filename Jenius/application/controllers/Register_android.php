<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Register_android extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    

    //Masukan function selanjutnya disini
    //Mengirim atau menambah data kontak baru
    function index_post() {
        $data = array(
                    'id'           => $this->post('id'),
                    'name'          => $this->post('name'),
                    'email'    => $this->post('email'),
                    'password'=> $this->post('password'),
                    'role_id'=> $this->post('role_id'),
                    'date_created'=>time(),
                    'is_active'=> $this->post('is_active'));
                

        $insert = $this->db->insert('user', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    
    }

