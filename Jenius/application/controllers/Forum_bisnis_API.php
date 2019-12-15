<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Forum_bisnis_API extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data Artikel
    function index_get()
    {
        $UPT_rest_API = $this->db->get('forum_bisnis')->result();
        $this->response(array("result" => $UPT_rest_API, 200));
    }

    //Masukan function selanjutnya disini
    //Mengirim atau menambah data kontak baru
    function index_post()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'judul_bisnis' => $this->input->post('judul_bisnis'),
            'image' => $this->input->post('image'),
            'alamat' => $this->input->post('alamat'),
            'nama_peternak' => $this->input->post('nama_peternak'),
            'no_telephon' => $this->input->post('no_telephon'),
            'diskripsi'    => $this->input->post('diskripsi')
        );
        $insert = $this->db->insert('forum_bisnis', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
    //Memperbarui data kontak yang telah ada
    function index_put()
    {
        $id = $this->put('id');
        $data = array(
            'id'  => $this->put('id'),
            'judul_bisnis'  => $this->put('judul_bisnis'),
            'diskripsi'  => $this->put('diskripsi'),
            'alamat'  => $this->put('alamat'),
            'nama_peternak'  => $this->put('nama_peternak'),
            'no_telephon'  => $this->put('no_telephon'),
            'image'    => $this->put('image')
        );
        $this->db->where('id_puskeswan', $id);
        $update = $this->db->update('anggota_puskeswan', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
    //Menghapus salah satu data kontak
    function index_delete() {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('forum_bisnis');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
