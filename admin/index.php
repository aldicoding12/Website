<?php 
  include "header.php";
?>
    <!-- end navbar -->
    <!-- content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="row-header ">
          <i class="fa-sharp fa-solid fa-house"></i>Dashboard
          </div>
          <div class="row-body">
            <h3>Selamat Datang <?= $_SESSION["nama"]; ?> </h3>
          </div>
        </div>
      </div>
    </div>
    <!-- endconten -->
    <?php 
      include "footer.php";
    ?>
    