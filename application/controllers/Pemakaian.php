<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Pemakaian extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 	}

 	public function index()
 	{
 		$this->load->view('atribut/HeaderAdmin');
 		$this->load->view('admin/pemakaian');
 		$this->load->view('atribut/FooterAdmin');
 	}
 } ?>