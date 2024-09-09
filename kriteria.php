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
                <li><i class="fa fa-sticky-note"></i><a href="kriteria.php"> Kriteria</a></li>
              </ol>
            </div>
          </div>

          <!--START SCRIPT HITUNG-->
          <script>
            function fungsiku() {
              var a = (document.getElementById("kehadiran_param").value).substring(0, 1);
              var b = (document.getElementById("loyalitas_param").value).substring(0, 1);
              var c = (document.getElementById("teamwork_param").value).substring(0, 1);
              var d = (document.getElementById("kedisiplinan_param").value).substring(0, 1);
              var e = (document.getElementById("kreativitas_param").value).substring(0, 1);
              var f = (document.getElementById("masakerja_param").value).substring(0, 1);
              var total = Number(a) + Number(b) + Number(c) + Number(d) + Number(e) + Number(f);
              document.getElementById("kehadiran").value = (Number(a) / total).toFixed(2);
              document.getElementById("loyalitas").value = (Number(b) / total).toFixed(2);
              document.getElementById("teamwork").value = (Number(c) / total).toFixed(2);
              document.getElementById("kedisiplinan").value = (Number(d) / total).toFixed(2);
              document.getElementById("kreativitas").value = (Number(e) / total).toFixed(2);
              document.getElementById("masakerja").value = (Number(f) / total).toFixed(2);
            }
          </script>
          <!--END SCRIPT HITUNG-->


          <!--START SCRIPT INSERT-->
          <?php

          include 'koneksi.php';

          if (isset($_POST['submit'])) {
            $kehadiran = $_POST['kehadiran'];
            $loyalitas = $_POST['loyalitas'];
            $teamwork = $_POST['teamwork'];
            $kedisiplinan = $_POST['kedisiplinan'];
            $kreativitas = $_POST['kreativitas'];
            $masakerja = $_POST['masakerja'];
            if (($kehadiran == "") or
              ($loyalitas == "") or
              ($teamwork == "") or
              ($kedisiplinan == "") or
              ($kreativitas == "") or
              ($masakerja == "")
            ) {
              echo "<script>
              alert('Tolong Lengkapi Data yang Ada!');
              </script>";
            } else {
              $sql = "SELECT * FROM saw_kriteria";
              $hasil = $conn->query($sql);
              $rows = $hasil->num_rows;
              if ($rows > 0) {
                echo "<script>
                alert('Hapus Bobot Lama untuk Membuat Bobot Baru');
                </script>";
              } else {
                $sql = "INSERT INTO saw_kriteria(
                  kehadiran,loyalitas,teamwork,kedisiplinan,kreativitas,masakerja)
                  values ('" . $kehadiran . "',
                  '" . $loyalitas . "',
                  '" . $teamwork . "',
                  '" . $kedisiplinan . "',
                  '" . $kreativitas . "',
                  '" . $masakerja . "')";
                $hasil = $conn->query($sql);
                echo "<script>
                alert('Bobot Berhasil di Inputkan!');
                </script>";
              }
            }
          }
          ?>
          <!-- END SCRIPT INSERT-->


          <!--start inputan-->
          <form class="form-validate form-horizontal" id="register_form" method="post" action="">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label"><b>Kriteria</b></label>
              <div class="col-sm-3">
                <label><b>Bobot</b></label>
              </div>
              <div class="col-sm-2">
                <label><b>Perbaikan Bobot</b></label>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">kehadiran</label>
              <div class="col-sm-3">
                <select class="form-control" name="kehadiran_param" id="kehadiran_param">
                  <option>1. Sangat Rendah</option>
                  <option>2. Rendah</option>
                  <option>3. Cukup</option>
                  <option>4. Tinggi</option>
                  <option>5. Sangat Tinggi</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="kehadiran" id="kehadiran">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">loyalitas</label>
              <div class="col-sm-3">
                <select class="form-control" name="loyalitas_param" id="loyalitas_param">
                  <option>1. Sangat Rendah</option>
                  <option>2. Rendah</option>
                  <option>3. Cukup</option>
                  <option>4. Tinggi</option>
                  <option>5. Sangat Tinggi</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="loyalitas" id="loyalitas">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">teamwork</label>
              <div class="col-sm-3">
                <select class="form-control" name="teamwork_param" id="teamwork_param">
                  <option>1. Sangat Rendah</option>
                  <option>2. Rendah</option>
                  <option>3. Cukup</option>
                  <option>4. Tinggi</option>
                  <option>5. Sangat Tinggi</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="teamwork" id="teamwork">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">kedisiplinan</label>
              <div class="col-sm-3">
                <select class="form-control" name="kedisiplinan_param" id="kedisiplinan_param">
                  <option>1. Sangat Rendah</option>
                  <option>2. Rendah</option>
                  <option>3. Cukup</option>
                  <option>4. Tinggi</option>
                  <option>5. Sangat Tinggi</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="kedisiplinan" id="kedisiplinan">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">kreativitas</label>
              <div class="col-sm-3">
                <select class="form-control" name="kreativitas_param" id="kreativitas_param">
                  <option>1. Sangat Rendah</option>
                  <option>2. Rendah</option>
                  <option>3. Cukup</option>
                  <option>4. Tinggi</option>
                  <option>5. Sangat Tinggi</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="kreativitas" id="kreativitas">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">masa kerja</label>
              <div class="col-sm-3">
                <select class="form-control" name="masakerja_param" id="masakerja_param">
                  <option>1. Sangat Rendah</option>
                  <option>2. Rendah</option>
                  <option>3. Cukup</option>
                  <option>4. Tinggi</option>
                  <option>5. Sangat Tinggi</option>
                </select>
              </div>
               <div class="form-group row">
              <label class="col-sm-2 col-form-label">lembur</label>
              <div class="col-sm-3">
                <select class="form-control" name="kreativitas_param" id="kreativitas_param">
                  <option>1. Sangat Rendah</option>
                  <option>2. Rendah</option>
                  <option>3. Cukup</option>
                  <option>4. Tinggi</option>
                  <option>5. Sangat Tinggi</option>
                </select>
              </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="kreativitas" id="kreativitas">
              </div>
            </div>
              <div class="col-sm-1">
                <input type="text" class="form-control" name="masakerja" id="masakerja">
              </div>
              <div class="col-sm-2">
                <button class="btn btn-outline-success" type="button" id="hitung" onclick="fungsiku()" name="hitung"><i class="fa fa-calculator"></i> Hitung</button>
              </div>
            </div>
            <div class="mb-4">
              <button class="btn btn-outline-primary" type="submit" name="submit"><i class="fa fa-save"></i> Submit</button>
            </div>
          </form>
          <table class="table">
            <thead>
              <tr>
                <th><i class="fa fa-arrow-down"></i> Kehadiran</th>
                <th><i class="fa fa-arrow-down"></i> loyalitas</th>
                <th><i class="fa fa-arrow-down"></i> teamwork</th>
                <th><i class="fa fa-arrow-down"></i> kedisiplinan</th>
                <th><i class="fa fa-arrow-down"></i> kreativitas</th>
                <th><i class="fa fa-arrow-down"></i> masakerja</th>
                <th><i class="fa fa-arrow-down"></i> lembur</th>

                <th><i class="fa fa-cogs"></i> Aksi</th>
              </tr>
            </thead>
            <?php
            $b = 0;
            $sql = "SELECT * FROM saw_kriteria";
            $hasil = $conn->query($sql);
            $rows = $hasil->num_rows;
            if ($rows > 0) {
              while ($row = $hasil->fetch_row()) {
            ?>
                <tr>
                  <td Align="center"><?= $row[1] ?></td>
                  <td Align="center"><?= $row[2] ?></td>
                  <td Align="center"><?= $row[3] ?></td>
                  <td Align="center"><?= $row[4] ?></td>
                  <td Align="center"><?= $row[5] ?></td>
                  <td Align="center"><?= $row[6] ?></td>
                  <td>
                    <div class="btn-group">
                      <a class="btn btn-danger" href="kriteria_hapus.php?id=<?= $row[0] ?>"><i class="fa fa-close"></i></a>
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