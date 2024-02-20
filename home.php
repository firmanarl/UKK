<?php
session_start();
if (!isset($_SESSION["id_admin"])) {
    header("location:login.php");
} else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assetss/img/favicon.png" rel="icon">
  <link href="assetss/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assetss/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assetss/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assetss/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assetss/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assetss/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assetss/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assetss/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assetss/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assetss/img/logo.png" alt="">
        <span class="d-none d-lg-block">Kasir KU</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!-- End Search Icon-->

        <!-- End Notification Icon -->

        <!-- End Notification Dropdown Items -->

        <!-- End Notification Nav -->

        <!-- End Messages Icon -->

        <!-- End Messages Dropdown Items -->

        <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="logout.php" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">Log Out?</span>
          </a>
        <!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="home.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Form</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="formpenjualan.php">
              <i class="bi bi-circle"></i><span>Penjualan</span>
            </a>
          </li>
          <li>
            <a href="formproduk.php">
              <i class="bi bi-circle"></i><span>Produk</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <!-- End Forms Nav -->

      <!-- End Tables Nav -->

      <!-- End Charts Nav -->

      <!-- End Icons Nav -->

      <!-- End Profile Page Nav -->

      <!-- End F.A.Q Page Nav -->

      <!-- End Contact Page Nav -->

      <!-- End Register Page Nav -->

      <!-- End Login Page Nav -->

      <!-- End Error 404 Page Nav -->

      <!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tabel Penjualan</h5>
              
              <?php 
              if(isset($_GET['cari'])){
              $cari = $_GET['cari'];
              echo "<b>Hasil pencarian : ".$cari."</b>";
              }
              ?>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">PenjualanID</th>
                    <th scope="col">TanggalPenjualan</th>
                    <th scope="col">TotalHarga</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                include 'koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi,"select * from penjualan");
                while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                <td><?php echo $d['PenjualanID']; ?></td>
                <td><?php echo $d['TanggalPenjualan']; ?></td>
                <td><?php echo $d['TotalHarga']; ?></td>
                <td><?php echo "<a href='update.php?id=$d[PenjualanID]'> UPDATE </a> | <a href='deletepenjualan.php?id=$d[PenjualanID]'> DELETE </a>"; ?></td>
                </tr>
                <?php 
                }
                ?>
                </tbody>
              </table>

            </div>
          </div>

          <!-- Antar Tabel -->

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tabel Detail Penjualan</h5>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">DetailID</th>
                    <th scope="col">PenjualanID</th>
                    <th scope="col">ProdukID</th>
                    <th scope="col">JumlahProduk</th>
                    <th scope="col">SubTotal</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                include 'koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi,"select * from detail_penjualan");
                while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                <td><?php echo $d['DetailID']; ?></td>
                <td><?php echo $d['PenjualanID']; ?></td>
                <td><?php echo $d['ProdukID']; ?></td>
                <td><?php echo $d['JumlahProduk']; ?></td>
                <td><?php echo $d['SubTotal']; ?></td>
                <td><?php echo "<a href='update.php?id=$d[DetailID]'> UPDATE </a> | <a href='deletedetail.php?id=$d[DetailID]'> DELETE </a>"; ?></td>
                </tr>
                <?php 
                }
                ?>
                </tbody>
              </table>

            </div>
          </div>

          <!-- Antar Tabel -->

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tabel Produk</h5>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">ProdukID</th>
                    <th scope="col">NamaProduk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                include 'koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi,"select * from produk");
                while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                <td><?php echo $d['ProdukID']; ?></td>
                <td><?php echo $d['NamaProduk']; ?></td>
                <td><?php echo $d['Harga']; ?></td>
                <td><?php echo $d['Stok']; ?></td>
                <td><?php echo "<a href='editproduk.php?id=$d[ProdukID]'> UPDATE </a> | <a href='deleteproduk.php?id=$d[ProdukID]'> DELETE </a>"; ?></td>
                </tr>
                <?php 
                }
                ?>
                </tbody>
              </table>

            </div>
          </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assetss/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assetss/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assetss/vendor/chart.js/chart.umd.js"></script>
  <script src="assetss/vendor/echarts/echarts.min.js"></script>
  <script src="assetss/vendor/quill/quill.min.js"></script>
  <script src="assetss/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assetss/vendor/tinymce/tinymce.min.js"></script>
  <script src="assetss/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assetss/js/main.js"></script>

</body>

</html>
<?php 
}
?>