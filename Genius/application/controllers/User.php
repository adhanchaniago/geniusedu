<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model("Product_model");
        $this->load->model("Anggota_model");
        $this->load->library('form_validation');
    }

    public function index()
    {


        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }


    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
    }




    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
    public function input()
    {

        $data['title'] = 'Input Artikel';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('product/new_form', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_artikel()
    {
        $data = [

            'product_id' => $this->input->post('product_id'),
            'name' => $this->input->post('name'),
            'image' => $this->_uploadImage(),
            'description' => $this->input->post('description'),
        ];

        $this->Product_model->tambah_data($data);
        $this->session->set_flashdata('pesantambah', '<div class="alert alert-success" role="alert">
                Pesanan ditambahkan
              </div>');
        redirect('user/input');
    }
    private function _uploadImage()
    {
        $config['upload_path']          = './assets/img/profile';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $_FILES['image']['name'];
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }
    public function list()
    {

        $data['title'] = 'list';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['list'] = $this->Product_model->list()->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('product/list', $data);
        $this->load->view('templates/footer');
    }

    public function edit_artikel($product_id)
    {
        $data['title'] = 'edit artikel';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['list'] = $this->db->get_where('products', ['product_id' => $product_id])->row_array();



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('product/edit_form', $data);
            $this->load->view('templates/footer');
        } else {

            $product_id = $this->input->post('product_id');
            $name = $this->input->post('name');
            $image = $this->input->post('image');
            $description = $this->input->post('description');






            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Update Success
            </div>');
            redirect('user/list');
        }
    }

    public function edit_action()
    {
        $product_id = $this->uri->segment(3);
        $product_id = $this->input->post('product_id');
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['upload_path'] = './assets/img/profile/';
            $config['allowed_types'] = 'gif|jpg|png|JPG';
            $config['max_size'] = '9048';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {

                $old_image = $product_id;
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . '/assets/img/profile/' . $old_image);
                }
                $image = $this->upload->data('file_name');
                $this->db->set('image', $image);
            } else {
                echo $this->upload->display_errors();
            }
        }


        $this->db->set('name', $name);

        $this->db->set('description', $description);
        $this->db->where('product_id', $product_id);
        $this->db->update('products');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Update Success
            </div>');
        redirect('user/list');
    }

    public function delete($product_id)
    {

        if ($product_id) {
            $this->Product_model->delete($product_id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect('user/list');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('user/list');
        }
    }

    public function input_lab()
    {

        $data['title'] = 'UPT dan lab';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/new_form_anggota', $data);
        $this->load->view('templates/footer');
    }



    public function inputan()
    {
        $data = [

            'id_puskeswan' => $this->input->post('id_puskeswan'),
            'nama_kepala' => $this->input->post('nama_kepala'),
            'TTL' => $this->input->post('TTL'),
            'image' => $this->_uploadImage(),
            'deskripsi' => $this->input->post('deskripsi'),
        ];

        $this->Anggota_model->inputan($data);
        $this->session->set_flashdata('pesantambah', '<div class="alert alert-success" role="alert">
                Pesanan ditambahkan
              </div>');
        redirect('user/input_lab');
    }
    public function list_lab()
    {

        $data['title'] = 'List_lab';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['list_lab'] = $this->Anggota_model->list_lab()->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/list_anggota', $data);
        $this->load->view('templates/footer');
    }
    public function edit_Lab_Upt($id_puskeswan)
    {
        $data['title'] = 'edit UPT dan LAB';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['list_lab'] = $this->db->get_where('anggota_puskeswan', ['id_puskeswan' => $id_puskeswan])->row_array();



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit_form', $data);
            $this->load->view('templates/footer');
        } else {

            $id_puskeswan = $this->input->post('id_puskeswan');
            $nama_kepalanama_kepala = $this->input->post('nama_kepala');
            $TTL = $this->input->post('TTL');
            $image = $this->input->post();
            $deskripsi = $this->input->post('deskripsi');






            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Update Success
            </div>');
            redirect('User/list_lab');
        }
    }

    public function edit_action_UPT()
    {
        $id_puskeswan = $this->input->post('id_puskeswan');
        $nama_kepala = $this->input->post('nama_kepala');
        $TTL = $this->input->post('TTL');
        $deskripsi = $this->input->post('deskripsi');

        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['upload_path'] = './assets/img/profile/';
            $config['allowed_types'] = 'gif|jpg|png|JPG';
            $config['max_size'] = '9048';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {

                $old_image = $id_puskeswan;
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . '/assets/img/profile/' . $old_image);
                }
                $image = $this->upload->data('file_name');
                $this->db->set('image', $image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('nama_kepala', $nama_kepala);
        $this->db->set('TTL', $TTL);

        // $this->db->set('image', $image);
        $this->db->set('deskripsi', $deskripsi);
        $this->db->where('id_puskeswan', $id_puskeswan);
        $this->db->update('anggota_puskeswan');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Update Success
            </div>');
        redirect('User/list_lab');
    }
    public function delete2($id_puskeswan)
    {

        if ($id_puskeswan) {
            $this->Product_model->delete($id_puskeswan);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect('User/list_lab');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('User/list_lab');
        }
    }
}
