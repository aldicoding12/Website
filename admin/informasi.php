<?php 
  include "header.php";

  $informasi = query("SELECT * FROM informasi");
?>
    <!-- end navbar -->
    <!-- content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="box-pengguna">
          <div class="row-header">
          <i class="fa-sharp fa-solid fa-user"></i>Informasi
          </div>
          <div class="row-body">
            
            <!-- table pengguna -->
            <a href="tambah-informasi.php" class="btn-sukses"><i class="fa-sharp fa-solid fa-plus"></i>Tambah</a> 
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Keterangan</th>
                  <th>Gambar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1 ?>
                <?php foreach( $informasi as $row ) : ?>
                <tr>

                <td><?= $no ?></td>

                <td><?= $row["judul"]; ?></td>
                <td><?= $row["keterangan"]; ?></td>
                <td> <img src="../upload/img/<?= $row["gambar"]; ?>" width="90" class="gambar" > </td>
                <td>
                  <a href="ubah-galeri.php?id=<?= $row["id"]; ?>" title="Ubah Data"><i class="fa-solid fa-user-pen btn-edit"></i></a> |
                  <a href="hapus-jurusan.php?idinformasi=<?= $row["id"]; ?>"title="Hapus Data" onclick="return confirm('yakin ingin menghapus?')" ><i class="fa-solid fa-user-minus btn-hapus"></i></a>
                </td>
                </tr>
                <?php $no++ ?>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
          </div>
          </div>
        </div>
      </div>
    </div>
    <!-- endconten -->
    <?php 
      include "footer.php";
    ?>
    