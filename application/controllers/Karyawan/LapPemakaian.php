<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class LapPemakaian extends CI_Controller
 {
  
  function __construct()
  {
    parent::__construct();
    
    $this->load->model('m_lappemakaian');
    $this->load->model('m_barang');
    $this->load->model('m_notif');
  }

  public function index()
  {
    $data = $this->m_lappemakaian->GetAll('0000-00-00','9999-12-31');
    $angka = $this->m_notif->Angka();
    $notif = $this->m_notif->GetAll();
    $this->load->view('atribut/HeaderKaryawan', array('angka'=>$angka, 'notif'=>$notif));
    $this->load->view('Admin/LapPemakaian', array('data' => $data));
    $this->load->view('atribut/FooterKaryawan');
  }

  public function setTanggal(){
    $tgl_awal = $this -> input -> post('tgl_awal');
    $tgl_akhir = $this -> input -> post('tgl_akhir');
    $data = $this -> m_lappemakaian -> GetAll($tgl_awal,$tgl_akhir);
    $angka = $this->m_notif->Angka();
    $notif = $this->m_notif->GetAll();

    $this->load->view('atribut/HeaderKaryawan', array('angka'=>$angka, 'notif'=>$notif));
    $this->load->view('Admin/LapPemakaian', array('data' => $data,'tgl_awal' => $tgl_awal, 'tgl_akhir' => $tgl_akhir));
    $this->load->view('atribut/FooterKaryawan');
  }

  public function resetTanggal(){
    redirect ('LapPemakaian');
  }
  
 } ?>