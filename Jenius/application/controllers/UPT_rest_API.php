<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class UPT_rest_API extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data Artikel
    function index_get()
    {
        $UPT_rest_API = $this->db->get('anggota_puskeswan')->result();
        $this->response(array("result" => $UPT_rest_API, 200));
    }

    //Masukan function selanjutnya disini
    //Mengirim atau menambah data kontak baru
    function index_post()
    {
        $data = array(
            'id_puskeswan' => $this->post('id_puskeswan'),
            'nama_kepala' => $this->post('nama_kepala'),
            'TTL' => $this->input->post('TTL'),
            'image' => $this->input->post('image'),
            'nomor'    => $this->post('nomor')
        );
        $insert = $this->db->insert('anggota', $data);
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
        $id = $this->put('id_puskeswan');
        $data = array(
            'id_puskeswan'  => $this->put('id_puskeswan'),
            'nama_kepala'  => $this->put('nama_kepala'),
            'nomor'    => $this->put('nomor')
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
    function index_delete()
    {
        $id = $this->delete('id_puskeswan');
        $this->db->where('id_puskeswan', $id);
        $delete = $this->db->delete('anggota_puskeswan');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
