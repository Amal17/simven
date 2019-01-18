<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Home extends MY_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
		$this->cekLogin();
	    //validasi jika session dengan level karyawan mengakses halaman ini maka akan dialihkan ke halaman karyawan
	    if ($this->session->userdata('level') == "karyawan") {
	      redirect('Karyawan/Karyawan');
	    }
 		$this->load->model('m_home');
		$this->load->model('m_notif');
 	}

 	public function index()
 	{
 		$pemasok = $this -> m_home -> Pemasok();
 		$user = $this -> m_home -> User();
 		$gedung = $this -> m_home -> Gedung();
 		$ruang = $this -> m_home -> Ruang();
 		$barang = $this -> m_home -> Barang();
		$peminjam = $this -> m_home -> Peminjam();
		$pengambilan = $this -> m_home -> Pengambilan();
		$peminjaman = $this -> m_home -> Peminjaman();
		$pengembalian = $this -> m_home -> Pengembalian();
		$dBarang = $this -> m_home -> DetilBarang();
	    $dGedung = $this -> m_home -> DetilGedung();
	    $dRuang = $this -> m_home -> DetilRuang();
	    $dPemasok = $this -> m_home -> DetilPemasok();
	    $dUser = $this -> m_home -> DetilUser();
	    $dPeminjam = $this -> m_home -> DetilPeminjam();
	    $dPengambilan = $this -> m_home -> DetilPengambilan();
	    $dPeminjaman = $this -> m_home -> DetilPeminjaman();
	    $dPengembalian = $this -> m_home -> DetilPengembalian();

 		$data = array(
 				'pemasok' => $pemasok,
 				'user' => $user,
 				'gedung' => $gedung,
 				'ruang' => $ruang,
 				'barang' => $barang,
				'peminjam' => $peminjam,
				'pengambilan' => $pengambilan,
				'peminjaman' => $peminjaman,
				'pengembalian' => $pengembalian
 			);
		
 		$angka = $this->m_notif->Angka();
		$notif = $this->m_notif->GetAll();
 		$this->load->view('atribut/HeaderAdmin', array('angka'=>$angka, 'notif'=>$notif));
 		$this->load->view('Admin/home', array('data' => $data, 'dBarang' => $dBarang, 'dGedung' => $dGedung, 'dRuang' => $dRuang, 'dPemasok' => $dPemasok, 'dUser' => $dUser, 'dPeminjam' => $dPeminjam, 'dPengambilan' => $dPengambilan, 'dPeminjaman' => $dPeminjaman, 'dPengembalian' => $dPengembalian));
 		$this->load->view('atribut/FooterAdmin');
 	}
 } ?>