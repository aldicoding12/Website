<?php 
  include "header.php";
  date_default_timezone_set('Asia/Makassar');
  $id = $_GET["idpengguna"];

  $data = query("SELECT * FROM pengguna WHERE id = '$id'")[0];

  if ( mysqli_num_rows($data) == 1 ) {
    header("Location:pengguna.php");
  }


  if( isset($_POST["ubah"]) ) {

    if( ubah($_POST) > 0 ) {
      echo "<script>
          alert('user baru berhasil dubah!');
          document,location.href = 'pengguna.php';
          </script>";
    } else {
      echo "<script>
          alert('user baru gagal dubah!');
          document,location.href = 'pengguna.php';
          </script>";
    }
  
  }
  
  
?>
<div class="content">
      <div class="container">
        <div class="row">
          <div class="row-header pengguna">
          <i class="fa-sharp fa-solid fa-user"></i>Ubah data pengguna
          </div>
          <div class="row-body">
            <div class="input-form">
              <form action="" method="post">
              <div class="form-gb">
              <input type="hidden" name="updated_at" autocomplete="off"  class="input-control" value="<?= $data["updated_at"] ?>">
              <input type="hidden" name="id" autocomplete="off"  class="input-control" value="<?= $data["id"] ?>">
          
                  <label>
                    Nama
                    <input type="text" name="nama" autocomplete="off" placeholder="Masukkan nama" class="input-control" value="<?= $data["nama"] ?>">
                  </label>
                </div>

                <div class="form-gb">
                  <label>
                    Username
                    <input type="text" name="username" autocomplete="off" placeholder="Masukkan Username" class="input-control" value="<?= $data["username"] ?>">
                  </label>
                </div>

                <div class="form-gb">
                  <label>
                   Level
                    <select name="level" class="input-control">
                      <option value="Admin" <?php if ( $data["level"] == "Admin" ) 'selected' ?> >Admin</option>
                      <option value="Super Admin" <?php if ( $data["level"] == "Super Admin" ) 'selected' ?> >Super Admin</option>
                    </select>

                    <button type="submit" name="ubah" class="btn-tambah">Ubah</button>

                  </label>
                </div>
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
    