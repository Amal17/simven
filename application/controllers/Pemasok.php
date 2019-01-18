<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Pemasok extends MY_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->cekLogin();
	    //validasi jika session dengan level karyawan mengakses halaman ini maka akan dialihkan ke halaman karyawan
	    if ($this->session->userdata('level') == "karyawan") {
	      redirect('Karyawan/Karyawan');
	    }
 		$this->load->model('m_pemasok');
		$this->load->model('m_notif');
 	}

 	public function index()
 	{
		$angka = $this->m_notif->Angka();
		$notif = $this->m_notif->GetAll();

 		$data = $this->m_pemasok->GetAll();

 		$this->load->view('atribut/HeaderAdmin', array('angka'=>$angka, 'notif'=>$notif));
 		$this->load->view('Admin/Pemasok', array('data' => $data));
 		$this->load->view('atribut/FooterAdmin');
 	}

 	public function tambah(){
		$nama_pemasok = $this -> input -> post('nama_pemasok');
		$penanggung_jawab = $this -> input -> post('penanggung_jawab');
		$alamat = $this -> input -> post('alamat');
		$kota = $this -> input -> post('kota');
		$no_telp = $this -> input -> post('telp');
		$email = $this -> input -> post('email');
		
		$data = array(
				'nama_pemasok' => $nama_pemasok,
				'penanggung_jawab' => $penanggung_jawab,
				'alamat' => $alamat,
				'kota' => $kota,
				'no_telp' => $no_telp,
				'email' => $email
				);

		$r = $this -> m_pemasok -> insertPemasok($data);
		if ($r == '1'){
			$this->session->set_flashdata('message', 'Anda berhasil menginput data Pemasok');	
		} else {
			$this->session->set_flashdata('info', 'Gagal Input Data Pemasok '.$r);
		}
		
		redirect('Pemasok');
 	}

 	public function ubah(){
 		$id_pemasok = $this -> input -> post('id');
	    $nama_pemasok = $this -> input -> post('pemasok');
		$penanggung_jawab = $this -> input -> post('pj');
		$alamat = $this -> input -> post('alamat');
		$kota = $this -> input -> post('kota');
		$no_telp = $this -> input -> post('telp');
		$email = $this -> input -> post('email');

	    $data = array(
	        'nama_pemasok' => $nama_pemasok,
	        'penanggung_jawab' => $penanggung_jawab,
	        'alamat' => $alamat,
	        'kota' => $kota,
	        'no_telp' => $no_telp,
	        'email' => $email,
	        );

	    $r = $this -> m_pemasok -> updatePemasok($id_pemasok, $data);
	    
	    if ($r == '1') {
	    	$this->session->set_flashdata('message', 'Anda berhasil mengupdate data Pemasok');	
	    } else {
	    	$this->session->set_flashdata('info', 'Gagal Update Data Pemasok '.$r);
	    }

	    redirect('Pemasok');
  	}

	public function hapus(){
		$id_pemasok = $this -> input -> post('id_pemasok');
		$r = $this->m_pemasok->periksaPemasok($id_pemasok);

		if (count($r) == '0') {
			$this -> m_pemasok -> deletePemasok($id_pemasok);
			$this->session->set_flashdata('message', 'Anda berhasil menghapus data Pemasok');	
		} else {
			$this->session->set_flashdata('info', 'Data Pemasok Tidak Dapat Dihapus, Terkait Pengadaan Barang');	
		}
	  	
	  	redirect('Pemasok');
	}
 } ?>