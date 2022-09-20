<?php 
  include "header.php";
  date_default_timezone_set('Asia/Makassar');
  $id = $_GET["id"];

  $data = query("SELECT * FROM jurusan WHERE id = '$id'")[0];

  if ( mysqli_num_rows($data) == 1 ) {
    header("Location:pengguna.php");
  }


  if( isset($_POST["submit"]) ) {

    if( ubahjurusan($_POST) > 0 ) {
      echo "<script>
          alert('Jurusan baru berhasil dubah!');
          document,location.href = 'jurusan.php';
          </script>";
    } else {
      echo "<script>
          alert('Jurusan baru gagal dubah!');
          document,location.href = 'jurusan.php';
          </script>";
    }
  
  }
  
  
?>
<div class="content">
      <div class="container">
        <div class="row">
          <div class="row-header pengguna">
          <i class="fa-sharp fa-solid fa-user"></i>Ubah data Jurusan
          </div>
          <div class="row-body">
            <div class="input-form">
            <div class="input-form">
              <form action="" method="post" enctype="multipart/form-data" >
              <div class="form-gb">
                  <label>
                    Nama
                    <input type="text" name="nama" autocomplete="off" placeholder="Masukkan nama" value=" <?= $data["nama"] ?> " class="input-control">
                  </label>
                </div>

                <div class="form-gb">
                  <label>
                    keteran
                    <textarea name="keterangan" id="keterangan" cols="30" rows="10"  class="input-control"><?= $data["keterangan"] ?> </textarea>
                  </label>
                </div>
                <div class="form-gb">
                  <label>
                    gambar
                    <br>
                    <img src="../upload/img/<?= $data["gambar"] ?>" width="100px"  class="image" >
                    <input type="hidden" name="GambarLama" id="" value="<?= $data["gambar"] ?>" >
                    <input type="hidden" name="id" id="" value="<?= $data["id"] ?>" >
                    <input type="file" name="gambar" autocomplete="off" placeholder="Masukkan Gambar" class="input-control">
                  </label>
                </div>

                    <button type="submit" name="submit" class="btn-tambah">Simpan </button>

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
    </div>
    <!-- endconten -->
    <?php 
      include "footer.php";
    ?>
    