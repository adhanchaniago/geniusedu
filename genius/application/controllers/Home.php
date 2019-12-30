<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->model('data');
		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}
	}

	public function tgl_indo($tanggal){
		$bulan = array (
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);
		
		return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}

	public function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return ucwords(strtolower($temp));
	}
 
	public function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim($this->penyebut($nilai));
		} else {
			$hasil = trim($this->penyebut($nilai));
		}     		
		return $hasil;
	}
    
    public function index()
	{
        $this->load->view('home');
    }

    public function master()
	{
        $data['master'] = $this->db->get('master')->result();

        $this->load->view('master',$data);
    }

    public function master_aksi()
    {
    	$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');

		$data = array(
			'master_nama' => $nama,
			'master_alamat' => $alamat,
		);

		$where = array(
			'master_id' => 1
		);
		
		$this->data->edit($where,$data,'master');
		redirect(base_url('master'));
    }

    public function master_upload_icon()
    {
    	$config['upload_path']          = './assets/img/logo/';
        $config['allowed_types']        = 'jpg|png';
        $config['file_name']        	= 'icon';
        $config['overwrite'] 			= true;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('logo'))
        {
                echo $this->upload->display_errors();
        }
        else
        {
				$data = array(
					'master_icon' => "icon".$this->upload->data('file_ext')
				);

				$where = array(
					'master_id' => 1
				);

				$this->upload->data('logo');

				$this->data->edit($where,$data,'master');
				redirect(base_url('master'));
        }
    }

    public function master_upload_logo()
    {
    	$config['upload_path']          = './assets/img/logo/';
        $config['allowed_types']        = 'jpg|png';
        $config['file_name']        	= 'logo';
        $config['overwrite'] 			= true;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('logo'))
        {
                echo $this->upload->display_errors();
        }
        else
        {
				$data = array(
					'master_logo' => "logo".$this->upload->data('file_ext')
				);

				$where = array(
					'master_id' => 1
				);

				$this->upload->data('logo');

				$this->data->edit($where,$data,'master');
				redirect(base_url('master'));
        }
    }

    public function user()
	{
		$this->db->order_by("user_nama", "ASC");
        $data['user'] = $this->db->get('user')->result();

    	$this->load->view('user',$data);
    }

    public function user_tambah()
	{
        $this->load->view('user-tambah');
    }

    public function user_tambah_aksi()
    {
    	$nama = $this->input->post('nama');
    	$username = $this->input->post('username');
    	$password = $this->input->post('password');
    	$level = $this->input->post('level');

 		$data = array(
			'user_nama' => $nama,
			'user_username' => $username,
			'user_password' => password_hash($password, PASSWORD_DEFAULT),
			'user_level' => $level
		);

		$this->db->insert('user',$data);
		redirect(base_url('user'));
    }

    public function user_hapus($id)
	{
		$where = array('user_id' => $id);
		$this->data->hapus($where,'user');
		redirect(base_url('user'));
	}

	public function user_ubahpassword($id)
    {
    	$where = array('user_id' => $id);
    	$data['user'] = $this->db->get_where('user',$where)->result();
    	$this->load->view('user-ubahpassword',$data);
    }

    public function user_ubahpassword_aksi($id)
    {
    	$password = $this->input->post('password');

		$data = array(
			'user_password' => password_hash($password, PASSWORD_DEFAULT)
		);

		$where = array(
			'user_id' => $id
		);
		
		$this->data->edit($where,$data,'user');
		redirect(base_url('user'));
    }

    public function user_edit($id)
    {
    	$where = array('user_id' => $id);
    	$data['user'] = $this->db->get_where('user',$where)->result();
    	$this->load->view('user-edit',$data);
    }

    public function user_edit_aksi($id)
    {
    	$nama = $this->input->post('nama');
    	$username = $this->input->post('username');
    	$level = $this->input->post('level');

 		$data = array(
			'user_nama' => $nama,
			'user_username' => $username,
			'user_level' => $level
		);

		$where = array(
			'user_id' => $id
		);
		
		$this->data->edit($where,$data,'user');
		redirect(base_url('user'));
    }

    public function paketbimbel()
	{
		$this->db->order_by("paketbimbel_nama", "ASC");
        $data['paketbimbel'] = $this->db->get('paketbimbel')->result();

    	$this->load->view('paketbimbel',$data);
    }

    public function paketbimbel_tambah()
	{
        $this->load->view('paketbimbel-tambah');
    }

    public function paketbimbel_tambah_aksi()
    {
    	$namapaket = $this->input->post('namapaket');
    	$nominal = $this->input->post('nominal');

 		$data = array(
			'paketbimbel_nama' => $namapaket,
			'paketbimbel_nominal' => $nominal,
		);

		$this->db->insert('paketbimbel',$data);
		redirect(base_url('paketbimbel'));
    }

    public function paketbimbel_edit($id)
    {
    	$where = array('paketbimbel_id' => $id);
    	$data['paketbimbel'] = $this->db->get_where('paketbimbel',$where)->result();
    	$this->load->view('paketbimbel-edit',$data);
    }

    public function paketbimbel_edit_aksi($id)
    {
    	$namapaket = $this->input->post('namapaket');
    	$nominal = $this->input->post('nominal');

 		$data = array(
			'paketbimbel_nama' => $namapaket,
			'paketbimbel_nominal' => $nominal,
		);

		$where = array(
			'paketbimbel_id' => $id
		);
		
		$this->data->edit($where,$data,'paketbimbel');
		redirect(base_url('paketbimbel'));
    }

    public function paketbimbel_hapus($id)
	{
		$where = array('paketbimbel_id' => $id);
		$this->data->hapus($where,'paketbimbel');
		redirect(base_url('paketbimbel'));
	}

	public function pesertadidik()
	{
		$this->db->order_by("pesertadidik_nama", "ASC");
        $data['pesertadidik'] = $this->db->select('*')
	    							   ->from('pesertadidik')
	    							   ->join('paketbimbel', 'pesertadidik.pesertadidik_paketbimbel_id = paketbimbel.paketbimbel_id','left')
	    							   ->get()
	    							   ->result();

    	$this->load->view('pesertadidik',$data);
    }

    public function pesertadidik_tambah()
	{
		$this->db->order_by("paketbimbel_nama", "ASC");
		$data['paketbimbel'] = $this->db->get('paketbimbel')->result();

        $this->load->view('pesertadidik-tambah',$data);
    }

    public function pesertadidik_tambah_aksi()
    {
    	$nama = $this->input->post('nama');
    	$noinduk = $this->input->post('noinduk');
    	$jk = $this->input->post('jk');
    	$tempatlahir = $this->input->post('tempatlahir');
    	$tanggallahir = $this->input->post('tanggallahir');
    	$agama = $this->input->post('agama');
    	$alamat = $this->input->post('alamat');
    	$telepon = $this->input->post('telepon');
    	$ayah = $this->input->post('ayah');
    	$ibu = $this->input->post('ibu');
    	$pekerjaanayah = $this->input->post('pekerjaanayah');
    	$pekerjaanibu = $this->input->post('pekerjaanibu');
    	$teleponortu = $this->input->post('teleponortu');
    	$paketbimbel = $this->input->post('paketbimbel');

 		$data = array(
			'pesertadidik_nama' => $nama,
			'pesertadidik_noinduk' => $noinduk,
			'pesertadidik_jk' => $jk,
			'pesertadidik_tempatlahir' => $tempatlahir,
			'pesertadidik_tanggallahir' => $tanggallahir,
			'pesertadidik_agama' => $agama,
			'pesertadidik_alamat' => $alamat,
			'pesertadidik_telepon' => $telepon,
			'pesertadidik_ayah' => $ayah,
			'pesertadidik_ibu' => $ibu,
			'pesertadidik_pekerjaanayah' => $pekerjaanayah,
			'pesertadidik_pekerjaanibu' => $pekerjaanibu,
			'pesertadidik_teleponortu' => $teleponortu,
			'pesertadidik_paketbimbel_id' => $paketbimbel,
		);

		$this->db->insert('pesertadidik',$data);
		redirect(base_url('pesertadidik'));
    }

    public function pesertadidik_edit($id)
    {
    	$where = array('pesertadidik_id' => $id);
    	$data['pesertadidik'] = $this->db->get_where('pesertadidik',$where)->result();

    	$this->db->order_by("paketbimbel_nama", "ASC");
    	$data['paketbimbel'] = $this->db->get('paketbimbel')->result();

    	$this->load->view('pesertadidik-edit',$data);
    }

    public function pesertadidik_edit_aksi($id)
    {
    	$nama = $this->input->post('nama');
    	$noinduk = $this->input->post('noinduk');
    	$jk = $this->input->post('jk');
    	$tempatlahir = $this->input->post('tempatlahir');
    	$tanggallahir = $this->input->post('tanggallahir');
    	$agama = $this->input->post('agama');
    	$alamat = $this->input->post('alamat');
    	$telepon = $this->input->post('telepon');
    	$ayah = $this->input->post('ayah');
    	$ibu = $this->input->post('ibu');
    	$pekerjaanayah = $this->input->post('pekerjaanayah');
    	$pekerjaanibu = $this->input->post('pekerjaanibu');
    	$teleponortu = $this->input->post('teleponortu');
    	$paketbimbel = $this->input->post('paketbimbel');

 		$data = array(
			'pesertadidik_nama' => $nama,
			'pesertadidik_noinduk' => $noinduk,
			'pesertadidik_jk' => $jk,
			'pesertadidik_tempatlahir' => $tempatlahir,
			'pesertadidik_tanggallahir' => $tanggallahir,
			'pesertadidik_agama' => $agama,
			'pesertadidik_alamat' => $alamat,
			'pesertadidik_telepon' => $telepon,
			'pesertadidik_ayah' => $ayah,
			'pesertadidik_ibu' => $ibu,
			'pesertadidik_pekerjaanayah' => $pekerjaanayah,
			'pesertadidik_pekerjaanibu' => $pekerjaanibu,
			'pesertadidik_teleponortu' => $teleponortu,
			'pesertadidik_paketbimbel_id' => $paketbimbel,
		);

		$where = array(
			'pesertadidik_id' => $id
		);
		
		$this->data->edit($where,$data,'pesertadidik');
		redirect(base_url('pesertadidik'));
    }

    public function pesertadidik_hapus($id)
	{
		$where = array('pesertadidik_id' => $id);
		$this->data->hapus($where,'pesertadidik');
		redirect(base_url('pesertadidik'));
	}

	public function guru()
	{
		$this->db->order_by("guru_nama", "ASC");
        $data['guru'] = $this->db->get('guru')->result();

    	$this->load->view('guru',$data);
    }

    public function guru_tambah()
	{
		$this->load->view('guru-tambah');
    }

    public function guru_tambah_aksi()
    {
    	$nama = $this->input->post('nama');
    	$jk = $this->input->post('jk');
    	$alamat = $this->input->post('alamat');
    	$telepon = $this->input->post('telepon');

 		$data = array(
			'guru_nama' => $nama,
			'guru_jk' => $jk,
			'guru_alamat' => $alamat,
			'guru_telepon' => $telepon
		);

		$this->db->insert('guru',$data);
		redirect(base_url('guru'));
    }

    public function guru_edit($id)
    {
    	$where = array('guru_id' => $id);
    	$data['guru'] = $this->db->get_where('guru',$where)->result();

    	$this->load->view('guru-edit',$data);
    }

    public function guru_edit_aksi($id)
    {
    	$nama = $this->input->post('nama');
    	$jk = $this->input->post('jk');
    	$alamat = $this->input->post('alamat');
    	$telepon = $this->input->post('telepon');

 		$data = array(
			'guru_nama' => $nama,
			'guru_jk' => $jk,
			'guru_alamat' => $alamat,
			'guru_telepon' => $telepon
		);

		$where = array(
			'guru_id' => $id
		);
		
		$this->data->edit($where,$data,'guru');
		redirect(base_url('guru'));
    }

    public function guru_hapus($id)
	{
		$where = array('guru_id' => $id);
		$this->data->hapus($where,'guru');
		redirect(base_url('guru'));
	}

	public function pembayaran()
    {
    	$this->db->order_by("pesertadidik_nama", "ASC");
    	$data['pesertadidik'] = $this->db->select('*')
	    							   ->from('pesertadidik')
	    							   ->join('paketbimbel', 'pesertadidik.pesertadidik_paketbimbel_id = paketbimbel.paketbimbel_id','left')
	    							   ->get()
	    							   ->result();

        $this->load->view('pembayaran',$data);
    }

    public function pembayaran_bayar($id)
    {
    	$where = array('pesertadidik_id' => $id);
    	$data['pesertadidik'] = $this->db->select('*')
	    							   ->from('pesertadidik')
	    							   ->join('paketbimbel', 'pesertadidik.pesertadidik_paketbimbel_id = paketbimbel.paketbimbel_id','left')
	    							   ->where($where)
	    							   ->get()
	    							   ->result();

	    foreach ($data['pesertadidik'] as $p) {
	    	if (empty($p->pesertadidik_diskonpersen)) {
	    		$diskonpersen = 0;
	    	}else {
	    		$diskonpersen = $p->paketbimbel_nominal * $p->pesertadidik_diskonpersen / 100;
	    	}

	    	if (empty($p->pesertadidik_diskonnominal)) {
	    		$diskonnominal = 0;
	    	}else {
	    		$diskonnominal = $p->pesertadidik_diskonnominal;
	    	}

	    	$data['potongan'] = $diskonpersen + $diskonnominal;

	    	$data['totalbayar'] = $p->paketbimbel_nominal - $data['potongan'];
	    }

	    $data['controller'] = $this;

	    $wherebayar = array('pembayaran_pesertadidik_id' => $id);
	    $this->db->order_by("pembayaran_tanggalbayar", "DESC");
    	$data['pembayaran'] = $this->db->get_where('pembayaran',$wherebayar)->result();

    	$data['terbayar'] = $this->db->select_sum('pembayaran_nominalbayar')->get_where('pembayaran',$wherebayar)->result();

    	foreach ($data['terbayar'] as $t) {
    		$data['kurangbayar'] = $data['totalbayar'] - $t->pembayaran_nominalbayar;
    	}
    	
		$this->load->view('pembayaran-bayar',$data);
    }

    public function pembayaran_bayar_simpan($id)
    {
    	$diskonpersen = $this->input->post('diskonpersen');
    	$diskonnominal = $this->input->post('diskonnominal');
    	$keterangandiskon = $this->input->post('keterangandiskon');
    	$batasbayar = $this->input->post('batasbayar');

 		$data = array(
			'pesertadidik_diskonpersen' => $diskonpersen,
			'pesertadidik_diskonnominal' => $diskonnominal,
			'pesertadidik_keterangandiskon' => $keterangandiskon,
			'pesertadidik_batasbayar' => $batasbayar
		);

		$where = array(
			'pesertadidik_id' => $id
		);

		$this->data->edit($where,$data,'pesertadidik');

		redirect(base_url('pembayaran/bayar/').$id);
    }

    public function pembayaran_bayar_aksi($id)
    {
    	$tanggalbayar = $this->input->post('tanggalbayar');
    	$nominalbayar = $this->input->post('nominalbayar');
    	$kwitansi = $this->input->post('kwitansi');

 		$data = array(
			'pembayaran_tanggalbayar' => $tanggalbayar,
			'pembayaran_pesertadidik_id' => $id,
			'pembayaran_nominalbayar' => $nominalbayar,
			'pembayaran_kwitansi' => $kwitansi
		);

		$this->db->insert('pembayaran',$data);

		redirect(base_url('pembayaran/bayar/').$id);
    }

    public function pembayaran_bayar_hapus($id)
	{
		$where = array( 'pembayaran_id' => $id );

		$peserta = $this->db->get_where('pembayaran',$where)->result();

		foreach ($peserta as $pd) {}

		$this->data->hapus($where,'pembayaran');

		redirect(base_url('pembayaran/bayar/').$pd->pembayaran_pesertadidik_id);
	}

	public function pembayaran_bayar_cetak($id)
	{
		$where = array('pesertadidik_id' => $id);
    	$data['pesertadidik'] = $this->db->select('*')
	    							   ->from('pesertadidik')
	    							   ->join('paketbimbel', 'pesertadidik.pesertadidik_paketbimbel_id = paketbimbel.paketbimbel_id','left')
	    							   ->where($where)
	    							   ->get()
	    							   ->result();

	    foreach ($data['pesertadidik'] as $p) {
	    	if (empty($p->pesertadidik_diskonpersen)) {
	    		$diskonpersen = 0;
	    	}else {
	    		$diskonpersen = $p->paketbimbel_nominal * $p->pesertadidik_diskonpersen / 100;
	    	}

	    	if (empty($p->pesertadidik_diskonnominal)) {
	    		$diskonnominal = 0;
	    	}else {
	    		$diskonnominal = $p->pesertadidik_diskonnominal;
	    	}

	    	$data['potongan'] = $diskonpersen + $diskonnominal;

	    	$data['totalbayar'] = $p->paketbimbel_nominal - $data['potongan'];
	    }

	    $wherebayar = array('pembayaran_pesertadidik_id' => $id);
	    $this->db->order_by("pembayaran_tanggalbayar", "ASC");
    	$data['pembayaran'] = $this->db->get_where('pembayaran',$wherebayar)->result();

    	$data['terbayar'] = $this->db->select_sum('pembayaran_nominalbayar')->get_where('pembayaran',$wherebayar)->result();

    	foreach ($data['terbayar'] as $t) {
    		$data['kurangbayar'] = $data['totalbayar'] - $t->pembayaran_nominalbayar;
    	}

    	$data['controller']=$this;

		$this->load->view('pembayaran-bayar-cetak',$data);
	}

	public function pengeluaran_setting()
	{
        $data['kategori'] = $this->db->get('kategoripengeluaran')->result();

    	$this->load->view('pengeluaran-setting',$data);
    }

    public function pengeluaran_setting_tambah()
	{
    	$this->load->view('pengeluaran-setting-tambah');
    }

    public function pengeluaran_setting_tambah_aksi()
    {
    	$nama = $this->input->post('nama');

 		$data = array(
			'kategoripengeluaran_nama' => $nama
		);

		$this->db->insert('kategoripengeluaran',$data);
		redirect(base_url('pengeluaran/setting'));
    }

    public function pengeluaran_setting_edit($id)
	{
		$where = array('kategoripengeluaran_id' => $id);
        $data['kategori'] = $this->db->get_where('kategoripengeluaran',$where)->result();

    	$this->load->view('pengeluaran-setting-edit',$data);
    }

    public function pengeluaran_setting_edit_aksi($id)
    {
    	$nama = $this->input->post('nama');

 		$data = array(
			'kategoripengeluaran_nama' => $nama
		);

		$where = array(
			'kategoripengeluaran_id' => $id
		);
		
		$this->data->edit($where,$data,'kategoripengeluaran');
		redirect(base_url('pengeluaran/setting'));
    }

    public function pengeluaran_setting_hapus($id)
	{
		$where = array('kategoripengeluaran_id' => $id);
		$this->data->hapus($where,'kategoripengeluaran');
		redirect(base_url('pengeluaran/setting'));
	}

	public function pengeluaran()
	{
        $this->db->order_by("pengeluaran_tanggal", "DESC");
        $data['pengeluaran'] = $this->db->select('*')
	    							   ->from('pengeluaran')
	    							   ->join('kategoripengeluaran', 'pengeluaran.pengeluaran_kategoripengeluaran_id = kategoripengeluaran.kategoripengeluaran_id','left')
	    							   ->get()
	    							   ->result();

	    $data['controller'] = $this;

    	$this->load->view('pengeluaran',$data);
    }

    public function pengeluaran_tambah()
	{
        $data['kategori'] = $this->db->get('kategoripengeluaran')->result();

    	$this->load->view('pengeluaran-tambah',$data);
    }

    public function pengeluaran_tambah_aksi()
    {
    	$tanggal = $this->input->post('tanggal');
    	$kategori = $this->input->post('kategori');
    	$nominal = $this->input->post('nominal');
    	$keterangan = $this->input->post('keterangan');

 		$data = array(
			'pengeluaran_tanggal' => $tanggal,
			'pengeluaran_kategoripengeluaran_id' => $kategori,
			'pengeluaran_nominal' => $nominal,
			'pengeluaran_keterangan' => $keterangan
		);

		$this->db->insert('pengeluaran',$data);
		redirect(base_url('pengeluaran'));
    }

    public function pengeluaran_edit($id)
	{
		$where = array('pengeluaran_id' => $id);
        $data['pengeluaran'] = $this->db->select('*')
	    							   ->from('pengeluaran')
	    							   ->join('kategoripengeluaran', 'pengeluaran.pengeluaran_kategoripengeluaran_id = kategoripengeluaran.kategoripengeluaran_id','left')
	    							   ->where($where)
	    							   ->get()
	    							   ->result();

    	$data['kategori'] = $this->db->get('kategoripengeluaran')->result();

    	$this->load->view('pengeluaran-edit',$data);
    }

    public function pengeluaran_edit_aksi($id)
    {
    	$tanggal = $this->input->post('tanggal');
    	$kategori = $this->input->post('kategori');
    	$nominal = $this->input->post('nominal');
    	$keterangan = $this->input->post('keterangan');

 		$data = array(
			'pengeluaran_tanggal' => $tanggal,
			'pengeluaran_kategoripengeluaran_id' => $kategori,
			'pengeluaran_nominal' => $nominal,
			'pengeluaran_keterangan' => $keterangan
		);

		$where = array(
			'pengeluaran_id' => $id
		);
		
		$this->data->edit($where,$data,'pengeluaran');
		redirect(base_url('pengeluaran'));
    }

    public function pengeluaran_hapus($id)
	{
		$where = array('pengeluaran_id' => $id);
		$this->data->hapus($where,'pengeluaran');
		redirect(base_url('pengeluaran'));
	}

	public function laporan()
	{
		$this->load->view('laporan');
    }

    public function laporan_cetak()
	{
		$sort = $this->input->post('sort');
		$tanggalawal = $this->input->post('tanggalawal');
		$tanggalakhir = $this->input->post('tanggalakhir');

		if ($sort == 'siswa') {

			$this->db->order_by("pesertadidik_nama", "ASC");
	    	$data['pesertadidik'] = $this->db->select('*')
		    							   ->from('pesertadidik')
		    							   ->join('paketbimbel', 'pesertadidik.pesertadidik_paketbimbel_id = paketbimbel.paketbimbel_id','left')
		    							   ->get()
		    							   ->result();

			$this->load->view('laporan-cetak-persiswa',$data);
		}elseif ($sort == 'paket') {

			$this->db->order_by("paketbimbel_nama", "ASC");
	    	$data['paketbimbel'] = $this->db->get('paketbimbel')->result();

			$this->load->view('laporan-cetak-perpaket',$data);
		}
		
    }

}

?>