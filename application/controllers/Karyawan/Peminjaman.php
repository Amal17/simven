<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Peminjaman extends MY_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
		$this->cekLogin();
	    //validasi jika session dengan level karyawan mengakses halaman ini maka akan dialihkan ke halaman karyawan
	    if ($this->session->userdata('level') == "admin") {
	      redirect('Admin/Admin');
	    }
 		$this->load->model('m_peminjaman');
 		$this->load->model('m_barang');
		$this->load->model('m_notif');
 	}

 	public function index()
 	{
 		$data = $this->m_peminjaman->GetAll();
		$username = $this -> session -> userdata('username');
		$idpeminjam = $this->m_peminjaman->idpeminjam();
		$idpeminjaman = $this->m_peminjaman->idpeminjaman();
		$angka = $this->m_notif->Angka();
    	$notif = $this->m_notif->GetAll();
 		$this->load->view('atribut/HeaderKaryawan', array('angka'=>$angka, 'notif'=>$notif));
 		$this->load->view('Admin/Peminjaman', array('data' => $data, 'username' => $username, 'idpeminjam' => $idpeminjam, 'idpeminjaman' => $idpeminjaman));
 		$this->load->view('atribut/FooterKaryawan');
 	}


 	public function tambah(){
 
            $jumlah=implode(",",$_POST['jumlah_item']);
            $id_penempatan2=implode(",",$_POST['id_penempatan']);

            

 			if(isset($_POST['submit'])){

				$nama 					= $this -> input -> post('nama');
				$jenis_kelamin 			= $this -> input -> post('jenis_kelamin');
				$alamat 				= $this -> input -> post('alamat'); 
				$hp 					= $this -> input -> post('hp');
				$email 					= $this -> input -> post('email');
				$id_peminjaman 			= $this -> input -> post('id_peminjaman'); 
				$penempatan 			= $this -> input -> post('penempatan');  
				$id_penempatan2 		= $id_penempatan2;
				$tanggal 				= $this -> input -> post('tanggal'); 
				$jumlah 				= $jumlah; 
				$tag 					= 'N';
				$lama_pinjam 			= $this -> input -> post('lama_pinjam'); 
				$keperluan_pinjam 		= $this -> input -> post('keperluan_pinjam'); 
				$id_peminjam 			= $this -> input -> post('id_peminjam'); 
				$username 				= $this -> input -> post('username'); 

			$data = array(
					'id_peminjam' 	=> $id_peminjam, 
					'nama' 			=> $nama, 
					'jenis_kelamin' => $jenis_kelamin, 
					'alamat'	 	=> $alamat,
					'hp' 			=> $hp,
					'email' 		=> $email
					); 

			$data1 = array(
					'jumlah' 			=> $jumlah, 
					);

			$data2 = array(
					'tanggal' 			=> $tanggal,
					'id_peminjaman' 	=> $id_peminjaman, 
					'id_penempatan' 	=> $id_penempatan2,  
					'jumlah' 			=> $jumlah 
					);
 
			//print_r($data2);
			$this -> m_peminjaman -> insertPeminjam($data); 
			$this -> m_peminjaman -> insertPeminjaman_array($data2);
			//$this -> m_peminjaman -> updatePenempatan($penempatan, $data1);


			$data3 = $this->m_peminjaman->GetPeminjamanArray();
			 
              	$i = 0;
              	foreach ($data3 as $row) {
	            
	            $jumlah2			=	explode(",",$row['jumlah']); 
               	$id_penempatan2		=	explode(",",$row['id_penempatan']); 
            	$pp = count($id_penempatan2);

                  $indeks=0; 

                  while($indeks < count($id_penempatan2)){ 

					$data4 = array(
						'id_peminjaman' 	=> $id_peminjaman,
						'id_peminjam' 		=> $id_peminjam, 
						'id_penempatan' 	=> $id_penempatan2[$indeks], 
						'jumlah' 			=> $jumlah2[$indeks], 
						'tanggal' 			=> $tanggal,  
						'lama_pinjam' 		=> $lama_pinjam,
						'keperluan_pinjam' 	=> $keperluan_pinjam,
						'id_peminjam' 		=> $id_peminjam,
						'tag' 				=> $tag,
						'username' 			=> $username
					);

					$this -> m_peminjaman -> insertPeminjaman($data4);

					$indeks++; 

                  }

  					
 				} 

 			$this -> m_peminjaman -> updatePenempatan();
 			$this -> m_peminjaman -> updateTagPeminjaman();

			redirect('Cetak');

		}else{
			echo "ELSE";
		}
 	}
 } ?>