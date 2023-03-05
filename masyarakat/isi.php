<?php 
include '../layouts/header.php';
include '../layouts/navbar_isi.php';
?>

 <div class="card-body">
     <table class="table table-bordered">
         <thead>
                  <tr>
                    <th>no</th>
                    <th>Nama Barang</th>                     
                    <th>Peserta Lelang Tertinggi</th>
                    <th>Harga</th>
                    <th>Tanggal Lelang</th>
                    <th>Foto</th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                 $no = 1;
                 include "../koneksi.php";
                 $tb_lelang    =mysqli_query($koneksi, "SELECT * FROM tb_lelang INNER JOIN tb_barang ON tb_lelang.id_barang=tb_barang.id_barang INNER JOIN tb_petugas ON tb_lelang.id_petugas=tb_petugas.id_petugas");
                 while($d_tb_lelang = mysqli_fetch_array($tb_lelang)){
                  $harga_tertinggi = mysqli_query($koneksi, "select max(penawaran_harga) as penawaran_harga FROM history_lelang where id_lelang='$d_tb_lelang[id_lelang]'");
                  $harga_tertinggi = mysqli_fetch_array($harga_tertinggi);
                  $d_harga_tertinggi = $harga_tertinggi['penawaran_harga'];
                  $pemenang = mysqli_query($koneksi, "SELECT * FROM history_lelang where penawaran_harga='$harga_tertinggi[penawaran_harga]'");
                  $d_pemenang = mysqli_fetch_array($pemenang);
                  @$tb_masyarakat = mysqli_query($koneksi, "SELECT * FROM tb_masyarakat where id_user='$d_pemenang[id_user]'");
                  $d_tb_masyarakat = mysqli_fetch_array($tb_masyarakat);
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?=$d_tb_lelang['nama_barang']?></td>
                    <td><?= @$d_tb_masyarakat['nama_lengkap']?></td>
                    <td>Rp. <?= number_format($d_harga_tertinggi)?></td>
                    <td><?=$d_tb_lelang['tgl_lelang']?></td>
                    <td><img src="../administrator/gambar/<?php echo $d_tb_lelang['tb_gambar']; ?>" style="width: 120px;"></td>
                    
                  </tr>
                  </div>               
                    <!-- /.modal-dialog -->
                  </div>
                <?php } ?>