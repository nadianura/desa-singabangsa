<?php error_reporting(0); ?>
<?php include"../koneksi/koneksi.php";
session_start();
if(!isset($_SESSION['id_jurnalis'])){
    ?>
    <script >
        alert("Maaf Anda Tidak Memiliki Hak Akses Untuk Halaman Ini !");
        document.location="../jrn/";
    </script>
    <?php
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Form Input Berita</title>
<!--<link rel='stylesheet' href='css/style.css'>-->
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

 <link rel="shortcut icon" href="../../images/logo.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
<style>
.font{
	font-family: 'Roboto', sans-serif;
}

.font2{
    font-family: 'Open Sans', sans-serif;
}

input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit], [type=reset] {
    width: 15%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

input[type=reset]:hover {
    background-color: #45a049;
}

button {
    background-color: #d50000;
    border: none;
    color: white;
    padding: 5px 5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	border-radius:5px;
}

body,html{
	margin:0px; padding:0px; /*hilangkan margin dan padding */
	color:black; /*warna huruf*/
	background:#ffff; /*warna background*/
}
#container{
	width:1000px; /*lebar container*/
	margin-left:auto; /*margin kiri otomatis (supaya posisi di tengah)*/
	margin-right:auto; /*margin kanan otomatis (supaya posisi di tengah)*/
	margin-top:20px; /*margin atas 10px*/
	background-color:#f1f8e9; /*warna background*/
}
#header{
	padding:10px; /*mengatur padding */
	background:#ddd; /*warna background*/
	text-align:center;
}
#nav{
	padding:5px 10px; /*padding atas dan bawah 5px, kiri dan kanan 10px*/
	background:#ede7f6; /*warna background*/
	text-align:center; /*posisi text di tengah*/
}
#nav ul{
	margin:0px; padding:0px;  /*hilangkan margin dan padding*/
	list-style:none; /*hilangkan list-style */
}
#nav li{
	display:inline; /*tampilkan secara inline */
}
#main{
	float:left; /*posisi di kiri*/
	width:960px; /*lebar*/
	padding:10px; /*mengatur padding*/
	min-height:400px; /*tinggi minimal*/
    background:rgba(0,0,0,0.1);
	margin-right: 10px;
	margin-left: 10px;
	border-radius: 15px;
}
.judul{
	color:red; /*warna huruf*/
	font-family: 'Acme', sans-serif; /*font yang digunakan*/
}
.berhasil{
	color:white;
	background-color:green;
	display:inline;
}
.gagal{
	color:white;
	background-color:red;
	display:inline;
}
.judulberita{
	font-size:25px;
	color:green;
    font-family: 'Merriweather Sans', sans-serif;
}
#footer{
	clear:both; /*menghilangkan float*/
	background:#cc9; /*mengatur warna background*/
	text-align:center; /*mengatur perataan text*/
}

</style>

</head>
<body>
<div id="container">
	