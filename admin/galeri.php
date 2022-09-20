<?php 
  include "header.php";

  $galeri = query("SELECT * FROM galeri");
?>
    <!-- end navbar -->
    <!-- content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="box-pengguna">
          <div class="row-header">
          <i class="fa-sharp fa-solid fa-user"></i>Galeri
          </div>
          <div class="row-body">
            
            <!-- table pengguna -->
            <a href="tambah-galeri.php" class="btn-sukses"><i class="fa-sharp fa-solid fa-plus"></i>Tambah</a> 
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1 ?>
                <?php foreach( $galeri as $row ) : ?>
                <tr>

                <td><?= $no ?></td>

                <td> <img src="../upload/img/<?= $row["foto"]; ?>" width="90" class="gambar" > </td>

                <td><?= $row["keterangan"]; ?></td>
                <td>
                  <a href="ubah-galeri.php?id=<?= $row["id"]; ?>" title="Ubah Data"><i class="fa-solid fa-user-pen btn-edit"></i></a> |
                  <a href="hapus-galeri.php?idgaleri=<?= $row["id"]; ?>"title="Hapus Data" onclick="return confirm('yakin ingin menghapus?')" ><i class="fa-solid fa-user-minus btn-hapus"></i></a>
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
    