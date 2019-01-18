<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Pengambilan extends MY_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
		$this->cekLogin();
	    //validasi jika session dengan level karyawan mengakses halaman ini maka akan dialihkan ke halaman karyawan
	    if ($this->session->userdata('level') == "karyawan") {
	      redirect('Karyawan/Karyawan');
	    }
 		$this->load->model('m_pengambilan');
 	}

 	public function index()
 	{
 		$data = $this->m_pengambilan->GetAll();
		$username = $this->session->userdata('username');
		$idmax = $this->m_pengambilan->idMax();
		$this->load->view('atribut/HeaderAdmin');
 		$this->load->view('Admin/pengambilan', array('data' => $data, 'username' => $username, 'idmax' => $idmax));
 		$this->load->view('atribut/FooterAdmin');
 	}


 	public function tambah(){
 
            $jumlah=implode(",",$_POST['jumlah_item']);
            $id_penempatan2=implode(",",$_POST['id_penempatan']);

            

 			if(isset($_POST['submit'])){

				$nama_pengambil			= $this -> input -> post('nama_pengambil'); 
				$id_pengambilan 		= $this -> input -> post('id_pengambilan'); 
				$id_penempatan 			= $this -> input -> post('id_penempatan'); 
				//$id_barang 				= $id_barang;
				$id_penempatan2 		= $id_penempatan2;
				$tanggal 				= $this -> input -> post('tanggal_ambil'); 
				$jumlah 				= $jumlah; 
				$keperluan 				= $this -> input -> post('keperluan'); 
				$id_peminjam 			= $this -> input -> post('id_peminjam'); 
				$username 				= $this -> input -> post('username'); 
				$tag 					= 'N';
 

			$data2 = array(
					'tanggal_ambil'		=> $tanggal,
					'id_pengambilan' 	=> $id_pengambilan, 
					'id_penempatan' 	=> $id_penempatan2,  
					'jumlah_ambil' 		=> $jumlah, 
					);




			//print_r($data2);
			//$this -> m_peminjaman -> insertPeminjam($data);
			//$this -> m_peminjaman -> insertPeminjaman($data1);
			$this -> m_pengambilan -> insertPengambilan_array($data2);


			$data3 = $this->m_pengambilan->GetPengambilanArray();
			 
              	$i = 0;
              	foreach ($data3 as $row) {

	            $jumlah2			=	explode(",",$row['jumlah_ambil']); 	            
               	$id_penempatan2		=	explode(",",$row['id_penempatan']); 

            	$pp = count($id_penempatan2);

                  $indeks=0; 

                  while($indeks < count($id_penempatan2)){ 

					$data4 = array(
						'id_pengambilan' 	=> $id_pengambilan,
						'pengambil' 		=> $nama_pengambil, 
						'id_penempatan' 	=> $id_penempatan2[$indeks], 
						'tanggal_ambil' 	=> $tanggal,   
						'keperluan' 		=> $keperluan, 
						'username' 			=> $username,
						'id_penempatan' 	=> $id_penempatan2[$indeks], 
						'jumlah_ambil' 		=> $jumlah2[$indeks],
						'tag' 				=> $tag,
					);

					$this -> m_pengambilan -> insertPengambilan($data4);
					$indeks++; 

                  }

  					
 				} 
 			 

 			$this -> m_pengambilan -> updatePenempatan();
 			$this -> m_pengambilan -> updateTagPengambilan();

			redirect('Pengambilan');
		}else{
			echo "ELSE";
		}
 	}
 } ?>