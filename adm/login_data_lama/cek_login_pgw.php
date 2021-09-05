
<?php
session_start();
include '../koneksi/koneksi.php';
 
// Login
 if(isset($_POST['login'])){
 $id = $_POST['id_pegawai'];
 $password = $_POST['password'];
 
    $query = mysql_query("SELECT id_pegawai, password FROM pegawai WHERE id_pegawai='$id' AND password='$password'");
    $r     = mysql_fetch_array($query);
    if($r){
      $_SESSION['id_pegawai']=$id;//id pegawai dimasukkan kedalam session
      header("Location:../admin_page/home.php");
    } else {
      ?>
      <script type="text/javascript">
        alert("Anda tidak berhasil Login");
        document.location="index.php";
      </script>
      <?php
    }
}