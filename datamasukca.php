<?php 
    require_once 'db/conn.php';
    $results = $crud->getCourse();
    $results1 = $crud->getAdmin();
?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Data Pendaftar</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/poltek.png" rel="icon">
  <link href="assets/img/poltek.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/stylef.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha - v4.1.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">POLINEMA</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="course.php">Kembali</a></li>
          <li><a class="nav-link scrollto" href="tukper.php">Tukar Pelajar</a></li>
          <li><a class="nav-link scrollto" href="seminar.php">Seminar</a></li>
          <li><a class="getstarted scrollto" href="index.php">Home</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
  
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div style="text-align:center;" class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Selamat datang Admin!</h1>
          <h2>Akses admin memperbolehkan anda untuk melihat, mengedit, dan menghapus data.</h2>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Tabel Pendaftar</h2>
        </div>

        <div class="row content d-flex justify-content-center">
          <div class="col-lg-6">
            <p style="text-align: center;">
              Berikut adalah data pendaftar :
            </p>
        </div>
        <table class="table container-md">
        <tr>
            <th>#</th>
            <th>Nama Mahasiswa</th>
            <th>IPK</th>
            <th>Nama Course</th>
            <th>Harga Course</th>
            <th>Actions</th>
        </tr>
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
              <tr>
                  <td><?php echo $r['id_courseint'] ?></td>
                  <td><?php echo $r['nama_mhs'] ?></td>
                  <td><?php echo $r['ipkc'] ?></td>
                  <td><?php echo $r['nama_crs'] ?></td>
                  <td><?php echo $r['harga_crs'] ?></td>
                  <td>
                      <a href="viewdatamasukca.php?id=<?php echo $r['id_courseint'] ?>" class="btn btn-primary" style="background-color:white; border-color: #37517e; color:#37517e;">View</a> &nbsp;
                      <a href="editdatamasukca.php?id=<?php echo $r['id_courseint'] ?>" class="btn btn-warning" style="background-color:#37517e; border-color: #37517e; color:white;">Edit</a> &nbsp;
                      <a onclick="return confirm('Are you sure?');" href="deldatamasukca.php?id=<?php echo $r['id_courseint'] ?>" class="btn btn-danger">Delete</a>
                  </td>
              </tr>
        <?php }?>
    </table>
        <br>
        <br>
      </div>
    </section><!-- End About Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Polinema</h3>
            <p>
              Jl. Soekarno Hatta No.9 <br>
              Jatimulyo, Kec. Lowokwaru, Kota Malang<br>
              Jawa Timur 65141 <br><br>
              <strong>Phone:</strong> (0341) 404424 - 404425<br>
              <strong>Email:</strong> @polinema.ac.id<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Kunjungi media sosial Polinema :</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>