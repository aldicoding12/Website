<?php 
  include "header.php";

  $pengguna = query("SELECT * FROM pengguna");
?>
    <!-- end navbar -->
    <!-- content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="box-pengguna">
          <div class="row-header">
          <i class="fa-sharp fa-solid fa-user"></i>Pengguna
          </div>
          <div class="row-body">
            
            <!-- table pengguna -->
            <a href="tambah-pengguna.php" class="btn-sukses"><i class="fa-sharp fa-solid fa-plus"></i>Tambah</a> 
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>level</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1 ?>
                <?php foreach( $pengguna as $row ) : ?>
                <tr>
                <td><?= $no ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["username"]; ?></td>
                <td><?= $row["level"]; ?></td>
                <td>
                  <a href="ubah-pengguna.php?idpengguna=<?= $row["id"]; ?>" title="Ubah Data"><i class="fa-solid fa-user-pen btn-edit"></i></a> |
                  <a href="hapus-pengguna.php?idpengguna=<?= $row["id"]; ?>"title="Hapus Data" onclick="return confirm('yakin ingin menghapus?')" ><i class="fa-solid fa-user-minus btn-hapus"></i></a>
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
    