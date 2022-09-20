<?php 
  include "header.php";
  date_default_timezone_set('Asia/Makassar');

  if( isset($_POST["ubah"]) ) {

    if( ubahpassword($_POST) > 0 ) {
      echo "<script>
          alert('Password  berhasil dubah!');
          document,location.href = 'pengguna.php';
          </script>";
    } else {
      echo "<script>
          alert('Password gagal dubah!');
          document,location.href = 'pengguna.php';
          </script>";
    }
  
  }
  
  
?>
<div class="content">
      <div class="container">
        <div class="row">
          <div class="row-header pengguna">
          <i class="fa-sharp fa-solid fa-user"></i>Ubah Password Pengguna
          </div>
          <div class="row-body">
            <div class="input-form">
              <form action="" method="post">
              <div class="form-gb">
              <input type="hidden" name="updated_at" autocomplete="off"  class="input-control" value="<?= $data["updated_at"] ?>">
                  <label>
                    Password Lama
                    <input type="text" name="password-lama" autocomplete="off" placeholder="Masukkan nama Lama" class="input-control">
                  </label>
                </div>

                <div class="form-gb">
                  <label>
                    Password Baru
                    <input type="password" name="password-baru" autocomplete="off" placeholder="Masukkan Username Password baru" class="input-control">
                  </label>
                </div>

                <div class="form-gb">
                  <label>
                    Konfirmasi Password Baru
                    <input type="text" name="konfirmasi" autocomplete="off" placeholder="Masukkan Username Password baru" class="input-control">
                  </label>
                </div>
                <button type="submit" name="ubah" class="btn-tambah">Ubah</button>
              </form>
            </div>
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
    