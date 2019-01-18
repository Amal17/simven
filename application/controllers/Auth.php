<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function cekAkun()
  {
    //load m_login
    $this->load->model('m_login');

    //membuat validasi login
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $query = $this->m_login->cekAkun($username, $password);

    if ($query === 1) {
      return "User Tidak Ditemukan!";
    }
    else if ($query === 3) {
      return "Password Salah!";
    }
    else {
      //membuat session dengan nama userdata
      $userData = array(
        'username' => $query->username,
        'level' => $query->level,
        'logged_in' => TRUE
      );
      $this->session->set_userdata($userData);
      return TRUE;
    }
  }

  public function login()
  {
    //melakukan pengalihan halaman sesuai dengan levelnya
    if ($this->session->userdata('level') == "karyawan"){redirect('Karyawan/Karyawan');}
    if ($this->session->userdata('level') == "admin"){redirect('Admin/Admin');}

    //proses login dan validasi nya
    if ($this->input->post('submit')) {
      $this->load->model('m_login');
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $error = $this->cekAkun();
      if ($this->form_validation->run() && $error === TRUE) {
        $data = $this->m_login->cekAkun($this->input->post('username'), $this->input->post('password'));

        //jika bernilai TRUE maka alihkan halaman sesuai dengan level nya
        if($data->level == 'admin'){
          redirect('Admin/Admin');
        }
        else if($data->level == 'karyawan'){
          redirect('Karyawan/Karyawan');
        }
      }

      //Jika bernilai FALSE maka tampilkan error
      else{
        echo "<script>alert('Gagal Login Pastikan Username dan Password anda Benar !!!');</script>";
        $this->load->view('login');
      }
    }
    //Jika tidak maka alihkan kembali ke halaman login
    else{
      $this->load->view('login');
    }
  }


  public function logout()
  {
    //Menghapus semua session (sesi)
    $this->session->sess_destroy();
    redirect('auth/login');
  }
}