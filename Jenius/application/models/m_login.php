
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 class M_login extends CI_Model
{
    function __construct()
    {
        $this->load->database();
        parent::__construct();
    }
    function cek_login($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $data = $this->db->get('user')->row_array();
        return $data;
    }
    function cek_item($id_pengguna)
    {
        $this->db->where('id', $id_pengguna);
        $data = $this->db->get('item')->row_array();
        return $data;
    }
}