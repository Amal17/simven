<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class User extends MY_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->cekLogin();
	    //validasi jika session dengan level karyawan mengakses halaman ini maka akan dialihkan ke halaman karyawan
	    if ($this->session->userdata('level') == "karyawan") {
	      redirect('Karyawan/Karyawan');
	    }
 		$this->load->model('m_user');
		$this->load->model('m_notif');
 	}

 	public function index()
 	{
		$angka = $this->m_notif->Angka();
    	$notif = $this->m_notif->GetAll();
 		
		$data = $this->m_user->GetAll();

 		$this->load->view('atribut/HeaderAdmin', array('angka'=>$angka, 'notif'=>$notif));
 		$this->load->view('Admin/User', array('data' => $data));
 		$this->load->view('atribut/FooterAdmin');
 	}

 	public function tambah(){
		$username = $this -> input -> post('username');
		$password = $this -> input -> post('password');
		$passwordBaru = md5($password);
		$nama = $this -> input -> post('nama');
		$level = $this -> input -> post('level');
		
		$r = $this->m_user->periksaUser($username);

		if (count($r) == '0') {
			$data = array(
				'username' => $username,
				'password' => $passwordBaru,
				'nama' => $nama,
				'level' => $level,
				);

			$result = $this -> m_user -> insertUser($data);

			if ($result == '1') {
				$this->session->set_flashdata('message', 'Anda berhasil menginput data User baru');
			} else {
				$this->session->set_flashdata('info', 'Gagal Input Data User '.$result);
			}
		} else {
			$this->session->set_flashdata('info', 'Username Telah Digunakan ');
		}
		
		redirect('User');
 	}

 	public function ubah(){
	    $username = $this -> input -> post('username');
	    $nama = $this -> input -> post('nama');
	    $password = $this -> input -> post('password');
	    $passwordBaru = md5($password);

	    $data = array(
	        'nama' => $nama,
	        'password' => $passwordBaru
	        );

	    $r = $this -> m_user -> updateUser($username, $data);
	    if ($r == '1'){
	    	$this->session->set_flashdata('message', 'Anda berhasil mengupdate data User');	
	    } else {
	    	$this->session->set_flashdata('info', 'Gagal Update Data User '.$r);
	    }
	    
	    redirect('User');
  	}

	public function hapus(){
		$username = $this -> input -> post('username');
	  	$result = $this -> m_user -> deleteUser($username);

	  	if ($result == '1') {
	  		$this->session->set_flashdata('message', 'Anda berhasil menghapus data User ');	
	  	} else {
	  		$this->session->set_flashdata('info', 'Gagal Delete Data User '.$result);
	  	}
		redirect('User');
	}
 } ?>