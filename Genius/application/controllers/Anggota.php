<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller

{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("anggota_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["anggota_puskeswan"] = $this->anggota_model->getAll();
        $this->load->view("anggota_puskeswan/list_anggota", $data);
    }

    public function add()
    {
        $anggota_puskeswan = $this->anggota_model;
        $validation = $this->form_validation;
        $validation->set_rules($anggota_puskeswan->rules());

        if ($validation->run()) {
            $anggota_puskeswan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("user/new_form_anggota");
    }

    

    public function edit($id = null)
    {
        if (!isset($id)) redirect('anggota_puskeswan');

        $anggota_puskeswan = $this->anggota_model;
        $validation = $this->form_validation;
        $validation->set_rules($anggota_puskeswan->rules());

        if ($validation->run()) {
            $anggota_puskeswan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["anggota_puskeswan"] = $anggota_puskeswan->getById($id);
        if (!$data["anggota_puskeswan"]) show_404();

        $this->load->view("user/edit_form_anggota", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->anggota_model->delete($id)) {
            redirect(site_url('anggota_puskeswan'));
        }
    }
}
