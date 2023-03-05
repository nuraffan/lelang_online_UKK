<?php 
// koneksi database
include '../koneksi.php';

// menangkap data yang di kirim dari form
$nama_barang = $_POST['nama_barang'];
$tgl = $_POST['tgl'];
$harga_awal = $_POST['harga_awal'];
$deskripsi_barang = $_POST['deskripsi_barang'];
$tb_gambar = $_FILES['tb_gambar']['name'];

// menginput data ke database
mysqli_query($koneksi,"insert into tb_barang values('','$nama_barang','$tgl','$harga_awal','$deskripsi_barang','$tb_gambar')");

// mengalihkan halaman kembali ke index.php
header("location:barang.php?info=simpan");

?>