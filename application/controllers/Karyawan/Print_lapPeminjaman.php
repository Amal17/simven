<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Print_lapPeminjaman extends MY_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('m_lappeminjaman');
 		$this->load->model('m_notif');
 	}

 	public function index()
 	{
	    $tgl_awal = $this -> input -> post('tg_awal');
	    $tgl_akhir = $this -> input -> post('tg_akhir');
	    $data = $this -> m_lappeminjaman -> GetAll($tgl_awal,$tgl_akhir);
	    $angka = $this->m_notif->Angka();
    	$notif = $this->m_notif->GetAll();
 		$this->load->view('atribut/HeaderKaryawan', array('angka'=>$angka, 'notif'=>$notif));
 		$this->load->view('Admin/print_lapPeminjaman', array('data' => $data, 'tgl_awal'=> $tgl_awal, 'tgl_akhir'=> $tgl_akhir));
 		$this->load->view('atribut/FooterKaryawan');
 	}
 } ?>
