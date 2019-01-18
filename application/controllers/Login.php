<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Login extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('m_login');
 	}

 	public function index()
 	{
 		$data = $this->m_login->GetAll();
 		$this->load->view('login', array('data' => $data));
 	}

 } ?>