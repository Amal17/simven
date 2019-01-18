<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    //memanggil function dari MY_Controller
    $this->cekLogin();
    //validasi jika session dengan level karyawan mengakses halaman ini maka akan dialihkan ke halaman karyawan
    if ($this->session->userdata('level') == "admin") {
      redirect('Admin/Admin');
    }
$this->load->model('m_home');
$this->load->model('m_import');
        $this->load->model('m_notif');
}

  public function index()
    {
        $angka = $this->m_notif->Angka();
        $notif = $this->m_notif->GetAll();
        $pemasok = $this -> m_home -> Pemasok();
        $user = $this -> m_home -> User();
        $gedung = $this -> m_home -> Gedung();
        $ruang = $this -> m_home -> Ruang();
        $barang = $this -> m_home -> Barang();
        $peminjam = $this -> m_home -> Peminjam();
        $pengambilan = $this -> m_home -> Pengambilan();
        $peminjaman = $this -> m_home -> Peminjaman();
        // $pengembalian = $this -> m_home -> Pengembalian();
        $pengembalian = 0;
        $dBarang = $this -> m_home -> DetilBarang();
        $dGedung = $this -> m_home -> DetilGedung();
        $dRuang = $this -> m_home -> DetilRuang();
        $dPemasok = $this -> m_home -> DetilPemasok();
        $dUser = $this -> m_home -> DetilUser();
        $dPeminjam = $this -> m_home -> DetilPeminjam();
        $dPengambilan = $this -> m_home -> DetilPengambilan();
        $dPeminjaman = $this -> m_home -> DetilPeminjaman();
        // $dPengembalian = $this -> m_home -> DetilPengembalian();
        $dPengembalian = 0;

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
        
        $this->load->view('atribut/HeaderKaryawan', array('angka'=>$angka, 'notif'=>$notif));
        $this->load->view('Admin/home', array('data' => $data, 'dBarang' => $dBarang, 'dGedung' => $dGedung, 'dRuang' => $dRuang, 'dPemasok' => $dPemasok, 'dUser' => $dUser, 'dPeminjam' => $dPeminjam, 'dPengambilan' => $dPengambilan, 'dPeminjaman' => $dPeminjaman, 'dPengembalian' => $dPengembalian));
        $this->load->view('atribut/FooterKaryawan');
    }
}