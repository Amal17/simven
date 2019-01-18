<?php defined('BASEPATH')OR exit('akses ga ada');
/**
 * 
 */
 class Import extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 		$this->load->model('m_import');
 		$this->load->model('m_notif');
 	}

 	public function index()
 	{
 		$angka = $this->m_notif->Angka();
		$notif = $this->m_notif->GetAll();
		
 		$this->load->view('atribut/HeaderAdmin', array('angka'=>$angka, 'notif'=>$notif));
 		$this->load->view('Admin/Import');
 		$this->load->view('atribut/FooterAdmin');
 	}

 	public function tambah(){

 		if(isset($_POST['import']))
 		{
 			$nama_file_baru = 'data.xlsx';
	        $this->load->view('PHPExcel/PHPExcel');

	        $excelreader = new PHPExcel_Reader_Excel2007();
			$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
			$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);


			$numrow = 1;
			foreach($sheet as $row){
				// Ambil data pada excel sesuai Kolom
				$id_jenisbarang = $row['A']; // Ambil data NIS
              	$tanggal_beli = $row['B']; // Ambil data nama
              	$stok = $row['C']; // Ambil data jenis kelamin
              	$id_pemasok = $row['D']; // Ambil data telepon
              	$harga_satuan = $row['E']; // Ambil data alamat
              	$harga_total = $row['F']; // Ambil data alamat
				
				// Cek jika semua data tidak diisi
				if(empty($id_jenisbarang) && empty($tanggal_beli) && empty($stok) && empty($id_pemasok) && empty($harga_satuan) && empty($harga_total))
					continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
				
				// Cek $numrow apakah lebih dari 1
				// Artinya karena baris pertama adalah nama-nama kolom
				// Jadi dilewat saja, tidak usah diimport
				if($numrow > 1){
					// Proses simpan ke Database
					$data = array(
					'id_jenisbarang'=> $id_jenisbarang, 
					'tanggal_beli' 	=> $tanggal_beli, 
					'stok' 			=> $stok,  
					'id_pemasok'	=> $id_pemasok,
					'harga_satuan' 	=> $harga_satuan,
					'harga_total' 	=> $harga_total
					);
					//$sql->execute(); // Eksekusi query insert
					$this -> m_import -> import($data);
				}
				
				$numrow++; // Tambah 1 setiap kali looping
			}
			redirect('Pengadaan');

		}else{
			echo "ELSE";
		}
 	}

 } ?>