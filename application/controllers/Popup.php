<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Popup extends MY_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->cekLogin();
	    //validasi jika session dengan level karyawan mengakses halaman ini maka akan dialihkan ke halaman karyawan
	    if ($this->session->userdata('level') == "karyawan") {
	      redirect('Karyawan/Karyawan');
	    }
 		$this->load->model('m_pengembalian');
 	}

 	public function index()
 	{
    	//$datass = $this->m_pengembalian->GetPeminjaman();
 		$this->load->view('Admin/Popup');
 	}



 } ?>