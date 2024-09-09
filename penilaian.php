<!doctype html>
<html lang="en">

<?php
include 'components/head.php';
?>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <?php
    include 'components/sidebar.php';
    ?>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5">

      <?php
      include 'components/navbar.php';
      ?>

      <section id="main-content">
        <section class="wrapper">
          <!--overview start-->
          <div class="row">
            <div class="col-lg-12">
              <ol class="breadcrumb">
                <li><i class="fa fa-list-ol"></i><a href="penilaian.php"> Penilaian</a></li>
              </ol>
            </div>
          </div>

          <!--START SCRIPT INSERT-->
          <?php

          include 'koneksi.php';

          if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $kehadiran = substr($_POST['kehadiran'], 1, 1);
            $loyalitas = substr($_POST['loyalitas'], 1, 1);
            $teamwork = substr($_POST['teamwork'], 1, 1);
            $kedisiplinan = substr($_POST['kedisiplinan'], 1, 1);
            $kreativitas = substr($_POST['kreativitas'], 1, 1);
            $masakerja = substr($_POST['masakerja'], 1, 1);
            if ($kehadiran == "" || $loyalitas == "" || $teamwork == "" || $kedisiplinan == "" || $kreativitas == "" || $masakerja == "") {
              echo "<script>
              alert('Tolong Lengkapi Data yang Ada!');
              </script>";
            } else {
              $sql = "SELECT*FROM saw_penilaian WHERE nama='$nama'";
              $hasil = $conn->query($sql);
              $rows = $hasil->num_rows;
              if ($rows > 0) {
                $row = $hasil->fetch_row();
                echo "<script>
                alert('Aplikasi $nama sudah ada!');
                </script>";
              } else {
                //insert name
                $sql = "INSERT INTO saw_penilaian(
                nama,kehadiran,loyalitas,teamwork,kedisiplinan,kreativitas,masakerja)
                values ('" . $nama . "',
                '" . $kehadiran . "',
                '" . $loyalitas . "',
                '" . $teamwork . "',
                '" . $kedisiplinan . "',
                '" . $kreativitas . "',
                '" . $masakerja . "')";
                $hasil = $conn->query($sql);
                echo "<script>
                alert('Penilaian Berhasil di Tambahkan!');
                </script>";
              }
            }
          }
          ?>
          <!-- END SCRIPT INSERT-->

          <!--start inputan-->
          <form method="POST" action="">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Alternatif</label>
              <div class="col-sm-4">
                <select class="form-control" name="nama">
                  <?php
                  //load nama
                  $sql = "SELECT * FROM saw_aplikasi";
                  $hasil = $conn->query($sql);
                  $rows = $hasil->num_rows;
                  if ($rows > 0) {
                    while ($row = mysqli_fetch_array($hasil)) :; {
                      } ?> <option><?php echo $row[0]; ?></option>
                  <?php endwhile;
                  } ?>
                </select>
              </div>
            </div>
           <div class="form-group row">
              <label class="col-sm-2 col-form-label">kehadiran</label>
              <div class="col-sm-4">
                 <select class=" form-control" name="kehadiran">
                  <option>(1) Sangat Tidak Setuju</option>
                  <option>(2) Tidak Setuju</option>
                  <option>(3) Netral</option>
                  <option>(4) Setuju</option>
                  <option>(5) Sangat Setuju</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">loyalitas</label>
              <div class="col-sm-4">
                <select class=" form-control" name="loyalitas">
                   <option>(1) Sangat Tidak Setuju</option>
                  <option>(2) Tidak Setuju</option>
                  <option>(3) Netral</option>
                  <option>(4) Setuju</option>
                  <option>(5) Sangat Setuju</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">teamwork</label>
              <div class="col-sm-4">
                <select class=" form-control" name="teamwork">
                   <option>(1) Sangat Tidak Setuju</option>
                  <option>(2) Tidak Setuju</option>
                  <option>(3) Netral</option>
                  <option>(4) Setuju</option>
                  <option>(5) Sangat Setuju</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">kedisiplinan</label>
              <div class="col-sm-4">
                <select class=" form-control" name="kedisiplinan">
                 <option>(1) Sangat Tidak Setuju</option>
                  <option>(2) Tidak Setuju</option>
                  <option>(3) Netral</option>
                  <option>(4) Setuju</option>
                  <option>(5) Sangat Setuju</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">kreativitas</label>
              <div class="col-sm-4">
                <select class=" form-control" name="kreativitas">
                  <option>(1) Sangat Tidak Setuju</option>
                  <option>(2) Tidak Setuju</option>
                  <option>(3) Netral</option>
                  <option>(4) Setuju</option>
                  <option>(5) Sangat Setuju</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">masakerja</label>
              <div class="col-sm-4">
                <select class=" form-control" name="masakerja">
                  <option>(1) Sangat Tidak Setuju</option>
                  <option>(2) Tidak Setuju</option>
                  <option>(3) Netral</option>
                  <option>(4) Setuju</option>
                  <option>(5) Sangat Setuju</option>
                </select>
              </div>
            </div>
            <div class="mb-4">
              <button type="submit" name="submit" class="btn btn-outline-primary"><i class="fa fa-save"></i> Submit</button>
            </div>
          </form>
          <table class="table">
            <thead>
              <tr>
                <th><i class="fa fa-arrow-down"></i> No</th>
                <th><i class="fa fa-arrow-down"></i> Alternatif</th>
                <th><i class="fa fa-arrow-down"></i> kehadiran</th>
                <th><i class="fa fa-arrow-down"></i> loyalitas</th>
                <th><i class="fa fa-arrow-down"></i> teamwork</th>
                <th><i class="fa fa-arrow-down"></i> kedisiplinan</th>
                <th><i class="fa fa-arrow-down"></i> kreativitas</th>
                <th><i class="fa fa-arrow-down"></i> masakerja</th>
                <th><i class="fa fa-cogs"></i> Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $b = 0;
              $sql = "SELECT*FROM saw_penilaian ORDER BY nama ASC";
              $hasil = $conn->query($sql);
              $rows = $hasil->num_rows;
              if ($rows > 0) {
                while ($row = $hasil->fetch_row()) {
              ?>
                  <tr>
                    <td align="center"><?php echo $b = $b + 1; ?></td>
                    <td><?= $row[0] ?></td>
                    <td align="center"><?= $row[1] ?></td>
                    <td align="center"><?= $row[2] ?></td>
                    <td align="center"><?= $row[3] ?></td>
                    <td align="center"><?= $row[4] ?></td>
                    <td align="center"><?= $row[5] ?></td>
                    <td align="center"><?= $row[6] ?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-danger" href="penilaian_hapus.php?nama=<?= $row[0] ?>">
                          <i class="fa fa-close"></i></a>
                      </div>
                    </td>
                  </tr>
              <?php }
              } else {
                echo "<tr>
                    <td>Data Tidak Ada</td>
                <tr>";
              } ?>
            </tbody>
          </table>
        </section>
      </section>
    </div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>