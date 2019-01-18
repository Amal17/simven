<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Print_lapInventaris extends MY_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('m_lapinventaris');
 		$this->load->model('m_notif');
 	}

 	public function index()
 	{
 		$angka = $this->m_notif->Angka();
    	$notif = $this->m_notif->GetAll();
 		$data = $this->m_lapinventaris->GetAll();
 		$this->load->view('atribut/HeaderAdmin', array('angka'=>$angka, 'notif'=>$notif));
 		$this->load->view('Admin/print_lapInventaris', array('data' => $data));
 		
 	}
 } ?>
