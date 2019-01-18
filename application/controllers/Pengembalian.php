<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Pengembalian extends MY_Controller
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
 		$this->load->model('m_barang');
		$this->load->model('m_notif');
 	}

 	public function index()
 	{
 		$data = $this->m_pengembalian->GetAll();
 		$angka = $this->m_notif->Angka();
    	$notif = $this->m_notif->GetAll();
		$this->load->view('atribut/HeaderAdmin', array('angka'=>$angka, 'notif'=>$notif));
 		$this->load->view('Admin/Pengembalian', array('data' => $data));
 		$this->load->view('atribut/FooterAdmin');
 	}


 	public function ubah($id_peminjaman,$id_penempatan,$jumlah){
 		$this -> m_pengembalian -> updatePengembalian($id_penempatan,$jumlah);
 		$this -> m_pengembalian -> updatePeminjaman($id_peminjaman);

		redirect('Pengembalian');
 	}

 	public function kembali(){
 		error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
 		if($_POST['idx']=='')
 		{
 			echo "<script>alert('Harap Pilih Checkbox Dahulu!!!'); history.go(-1)</script>";
 		}
 		else
 		{
 			$jl = count($_POST['idx']); //menghitung jumlah value yang di centang
			for($i=0; $i<$jl; $i++){
	          
	          //$idx = $_POST['idx'][$i];
	          $id_penempatan=$_POST["id_penempatan"][$_POST['idx'][$i]];
	          $keterangan=$_POST["keterangan"][$_POST['idx'][$i]];
	          $id_pengambilan = $_POST['id_pengambilan'];
	          $id_peminjaman = $_POST['id_peminjaman'];
	          $jumlah = $_POST['jumlah'][$_POST['idx'][$i]];
	          $barang = $_POST['barang'][$_POST['idx'][$i]];
	          $jmlh = $_POST['input_id'][$_POST['idx'][$i]];
	          $total = $jmlh-$jumlah;
	          $data = array(
					'id_pengembalian' => $id_pengambilan,
					'id_peminjaman' => $id_peminjaman,
					'id_penempatan' => $id_penempatan,
					'keterangan' => $keterangan,
					'jumlah'=> $jmlh
					);
	          //$ruang='2';
	          $rsk=array(
	          		'id_barang'=>$barang,
	          		'id_ruang'=>2,
	          		'jumlah'=>$jumlah
	          );
	          $hlg=array(
	          		'id_barang'=>$barang,
	          		'id_ruang'=>3,
	          		'jumlah'=>$jumlah
	          );
	          /*echo "A ".$id_pengambilan;
	          echo "B ".$keterangan;
	          echo "C ".$id_penempatan;
	          echo "D ".$id_peminjaman;
	          echo "E ".$jumlah;*/
	          //echo $idx."-";
	          $this -> m_pengembalian -> insertPengembalian($data);
	          if($keterangan=="Tidak Bermasalah")
	          {
	          	$this -> m_pengembalian -> updatePengembalian($id_penempatan,$jumlah);	
	          }
	          elseif ($keterangan=="Rusak")
	          {
	          	  $rusak = $this -> m_pengembalian -> GetRusak($barang);
		 		  foreach ($rusak as $r)
		 		  {
		 		  	$jml = $r['jml'];
		 		  	if($jml==0)
		 		  	{
		 		  		$this -> m_pengembalian -> insertPenempatan($rsk);
		 		  	}
		 		  	else
		 		  	{
		 		  		$tempat = $this -> m_pengembalian -> GetTempat($barang);
		 		  		foreach ($tempat as $r)
		 		  		{
		 		  			$id = $r['id_penempatan'];
		 		  			$this -> m_pengembalian -> updatePenempatan($id_penempatan,$jmlh);
		 		  			$this -> m_pengembalian -> updatePengembalian($id_penempatan,$total);
		 		  		}
		 		  	}
		 		  }
	          }
	          elseif ($keterangan=="Hilang")
	          {
	          	  $rusak = $this -> m_pengembalian -> GetHilang($barang);
		 		  foreach ($rusak as $r)
		 		  {
		 		  	$jml = $r['jml'];
		 		  	if($jml==0)
		 		  	{
		 		  		$this -> m_pengembalian -> insertPenempatan($hlg);
		 		  	}
		 		  	else
		 		  	{
		 		  		$tempat = $this -> m_pengembalian -> GetTempatHilang($barang);
		 		  		foreach ($tempat as $r)
		 		  		{
		 		  			$id = $r['id_penempatan'];
		 		  			$this -> m_pengembalian -> updatePenempatan($id_penempatan,$jmlh);
		 		  			$this -> m_pengembalian -> updatePengembalian($id_penempatan,$total);
		 		  		}
		 		  	}
		 		  }
	          }
	          
	 		  $this -> m_pengembalian -> updatePeminjaman($id_peminjaman,$id_penempatan);
	 		  $cek = $this -> m_pengembalian -> GetKembali($id_peminjaman);
	 		  foreach ($cek as $r)
	 		  {
	 		  	$jml = $r['jml'];
	 		  	if($jml==0)
	 		  	{
	 		  		$this -> m_pengembalian -> updateKembali($id_peminjaman);
	 		  	}
	 		  }

	      	}
	      	redirect('Pengembalian');
 		}
 		//redirect('Pengembalian');
      
 	}

 } ?>