<?php defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "siswa";

    public $no;
    public $no_induk;
    public $nama_siswa;
    public $jenjang;
    public $sekolah;
    public $alamat;
    public $no_hp;
    public $nama_ortu;
    public $pekerjaan_ortu;
    public $total_bayar;
    public $image = "default.jpg";


    public function rules()
    {
        return [
            [
                'field' => 'no_induk',
                'label' => 'No_induk',
                'rules' => 'required'
            ],

            [
                'field' => 'nama_siswa',
                'label' => 'Nama_siswa',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["no" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->no = uniqid();
        $this->no_induk = $post["no_induk"];
        $this->nama_siswa = $post["nama_siswa"];
        $this->jenjang = $post["jenjang"];
        $this->sekolah = $post["sekolah"];
        $this->alamat = $post["alamat"];
        $this->no_hp = $post["no_hp"];
        $this->nama_ortu = $post["nama_ortu"];
        $this->pekerjaan_ortu = $post["pekerjaan_ortu"];
        $this->image = $this->_uploadImage();
        $this->total_bayar = $post["total_bayar"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->no = $post["id"];
        $this->no_induk = $post["no_induk"];
        if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
        }
        $this->total_bayar = $post["total_bayar"];
    }

    function delete($no)
    {
        $this->_deleteImage($no);
        $this->db->where('no', $no);
        $this->db->delete('siswa');
    }

    private function _deleteImage($no)
    {
        $list = $this->getById($no);
        if ($list->image != "default.jpg") {
            $filename = explode(".", $list->image)[0];
            return array_map('unlink', glob(FCPATH . "./assets/img/profile/$filename.*"));
        }
    }


    function tambah_data($data)
    {
        $this->db->insert('siswa', $data);
    }

    function list()
    {
        return  $this->db->get('siswa');
    }

    function edit_artikel($data, $no)
    {
        $this->db->where('no', $no);
        $this->db->update('siswa', $data);
    }
}
