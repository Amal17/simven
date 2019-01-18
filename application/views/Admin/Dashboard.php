<html>
  <head>
    <title>Login MultiLevel || KiosCoding.com</title>
  </head>
  <body>
      <center>
        <h1>Membuat Login MultiLevel Menggunakan Session Codeigniter || KiosCoding.com</h1><br />
        <h2>SELAMAT DATANG ANDA TELAH BERHASIL LOGIN SEBAGAI MANAGER</h2>
        <h3> Username Anda Adalah <?php echo $this->session->userdata('username'); ?></h3><br /><br />
        <a href="<?php echo site_url('authentication/auth/logout'); ?>">Keluar</a>
      </center>
    </form>
  </body>
</html>