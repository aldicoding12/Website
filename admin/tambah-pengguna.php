<?php 
  include "header.php";
  date_default_timezone_set('Asia/Makassar');
  if( isset($_POST["submit"]) ) {

    if( tambah($_POST) > 0 ) {
      echo "<script>
          alert('user baru berhasil ditambahkan!');
          document,location.href = 'pengguna.php';
          </script>";
    } else {
      echo mysqli_error($conn);
    }
  
  }
  
  
?>
    <!-- end navbar -->
    <!-- content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="row-header pengguna">
          <i class="fa-sharp fa-solid fa-user"></i>Tambah Pengguna
          </div>
          <div class="row-body">
            <div class="input-form">
              <form action="" method="post">
              <div class="form-gb">
                  <label>
                    Nama
                    <input type="text" name="nama" autocomplete="off" placeholder="Masukkan nama" class="input-control">
                  </label>
                </div>

                <div class="form-gb">
                  <label>
                    Username
                    <input type="text" name="username" autocomplete="off" placeholder="Masukkan Username" class="input-control">
                  </label>
                </div>

                <div class="form-gb">
                  <label>
                    Password
                    <input type="password" name="password" autocomplete="off" placeholder="Masukkan Password" class="input-control">
                  </label>
                </div>

                <div class="form-gb">
                  <label>
                    Konfirmasi
                    <input type="password" name="konfirmasi" autocomplete="off" placeholder="Masukkan Password" class="input-control">
                  </label>
                </div>

                <div class="form-gb">
                  <label>
                   Level
                    <select name="level" class="input-control">
                      <option value="">Pilih</option>
                      <option value="Admin" name="Admin" >Admin</option>
                      <option value="Super Admin" name="Super Admin">Super Admin</option>
                    </select>

                    <button type="submit" name="submit" class="btn-tambah">Tambah</button>

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
    