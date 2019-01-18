<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Cetak extends MY_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('m_cetak');
 		$this->load->model('m_notif');
 	}

 	public function index()
 	{

 		$data = $this->m_cetak->GetAll();
 		$angka = $this->m_notif->Angka();
    	$notif = $this->m_notif->GetAll();
 		$peminjam = $this->m_cetak->GetPeminjam();
 		$this->load->view('atribut/HeaderAdmin',array('angka'=>$angka,'notif'=>$notif));
 		$this->load->view('Admin/Print', array('data' => $data,'peminjam' => $peminjam));
 		
 	}
 } ?>
