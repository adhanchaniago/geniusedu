<?php defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "products";

    public $product_id;
    public $name;
    public $image = "default.jpg";
    public $description;

    public function rules()
    {
        return [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ],

            [
                'field' => 'description',
                'label' => 'Description',
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
        return $this->db->get_where($this->_table, ["product_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->product_id = uniqid();
        $this->name = $post["name"];
        $this->image = $this->_uploadImage();
        $this->description = $post["description"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->product_id = $post["id"];
        $this->name = $post["name"];
        if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
        }
        $this->description = $post["description"];
    }

    function delete($product_id)
    {
        $this->_deleteImage($product_id);
        $this->db->where('product_id', $product_id);
        $this->db->delete('products');
    }

    private function _deleteImage($product_id)
    {
        $list = $this->getById($product_id);
        if ($list->image != "default.jpg") {
            $filename = explode(".", $list->image)[0];
            return array_map('unlink', glob(FCPATH . "./assets/img/profile/$filename.*"));
        }
    }


    function tambah_data($data)
    {
        $this->db->insert('products', $data);
    }

    function list()
    {
        return  $this->db->get('products');
    }

    function edit_artikel($data, $product_id)
    {
        $this->db->where('product_id', $product_id);
        $this->db->update('products', $data);
    }
}
