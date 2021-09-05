
<?php
session_start();
include '../koneksi/koneksi.php';
 
// Login
 if(isset($_POST['login'])){
 $id = $_POST['id_jurnalis'];
 $password = $_POST['password'];

    $query = mysqli_query($conn,"SELECT id_jurnalis, password FROM jurnalis WHERE id_jurnalis='$id' AND password='$password'");
    $r     = mysqli_fetch_array($query);
    if($r){
      $_SESSION['id_jurnalis']=$id;//id jurnalis dimasukkan kedalam session
      header("Location:../jurnalis_page/home.php");
    } else {
      ?>
      <script type="text/javascript">
        alert("Anda tidak berhasil Login");
        document.location="index.php";
      </script>
      <?php
    }
}