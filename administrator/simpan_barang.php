<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$nama_barang = $_POST['nama_barang'];
$tgl = $_POST['tgl'];
$harga_awal = $_POST['harga_awal'];
$deskripsi_barang = $_POST['deskripsi_barang'];
$tb_gambar = $_FILES['tb_gambar']['name'];

//Cek File
if (strlen($tb_gambar)>0) {
  //upload Photo
  if (is_uploaded_file($_FILES['tb_gambar']['tmp_name'])) {
      move_uploaded_file ($_FILES['tb_gambar']['tmp_name'], "gambar/".$tb_gambar);
  }
}
 
// menginput data ke database
mysqli_query($koneksi,"insert into tb_barang values('','$nama_barang','$tgl','$harga_awal','$deskripsi_barang','$tb_gambar')");

// mengalihkan halaman kembali ke index.php
header("location:barang.php?info=simpan");

?>