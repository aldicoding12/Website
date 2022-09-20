<?php 
  include "header.php";
  date_default_timezone_set('Asia/Makassar');
  if( isset($_POST["submit"]) ) {

    if( galeri($_POST) > 0 ) {
      echo "<script>
          alert('Galeri baru berhasil ditambahkan!');
          document,location.href = 'galeri.php';
          </script>";
    } else {
      echo "<script>
      alert('Galeri baru Gagal ditambahkan!');
      document,location.href = 'galeri.php';
      </script>";
    }
  
  }
  
  
?>
    <!-- end navbar -->
    <!-- content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="row-header pengguna">
          <i class="fa-sharp fa-solid fa-user"></i>Tambah Galeri
          </div>
          <div class="row-body">
            <div class="input-form">
              <form action="" method="post" enctype="multipart/form-data" >
                <div class="form-gb">
                  <label>
                    keterangan
                    <input type="text" name="keterangan" autocomplete="off" placeholder="Masukkan Keterangan" class="input-control">
                  </label>
                </div>

                <div class="form-gb">
                  <label>
                    gambar
                    <input type="file" name="gambar" autocomplete="off" placeholder="Masukkan Gambar" class="input-control">
                  </label>
                </div>

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
    