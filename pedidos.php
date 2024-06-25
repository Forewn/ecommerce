<!DOCTYPE html>
<html lang="en">

<head>
  <title>Minishop - Free Bootstrap 4 Template by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="./lib/sweetalert2/sweetalert2.css">
	<script src="./lib/sweetalert2/sweetalert2.min.js"></script>
</head>

<body class="goto-here">
  <header>
    <?php include "./modulos/nav.php" ?>
  </header>

  <table class="table">
    <thead>
      <tr>
        <th scope="col"># Pedido</th>
        <th scope="col">Fecha</th>
        <th scope="col">Status</th>
        <th scope="col">Factura</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if(isset($_SESSION['usuario'])){
          require "./php/conn.php";
          $stmt = $conn->prepare("SELECT id_factura, fecha, pagado FROM factura WHERE
          cedula_usuario = (SELECT Cedula FROM usuarios WHERE Usuario = ?)");
          $stmt->bind_param('s', $_SESSION['usuario']);
          $stmt->execute();
          $stmt->bind_result($id, $fecha, $status);
          while($stmt->fetch()){
            $stat = ($status == 1)? "<button type='button' class='btn btn-success'>Confirmada</button>" : "<button type='button' class='btn btn-warning'>En espera</button>";
            echo "
            <tr>
              <th scope='row'>{$id}</th>
              <td>{$fecha}</td>
              <td>".$stat."</td>
              <td><div class='btn btn-success' onclick='facturar({$id}, {$status});'><i class='bi bi-floppy2-fill'></i></div></td>
            </tr>
            ";
          }
        }
      ?>
    </tbody>
  </table>


  <section class="ftco-gallery">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 heading-section text-center mb-4 ftco-animate">
          <h2 class="mb-4">Follow Us On Instagram</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
            blind texts. Separated they live in</p>
        </div>
      </div>
    </div>
    <div class="container-fluid px-0">
      <div class="row no-gutters">
        <div class="col-md-4 col-lg-2 ftco-animate">
          <a href="images/gallery-1.jpg" class="gallery image-popup img d-flex align-items-center"
            style="background-image: url(images/gallery-1.jpg);">
            <div class="icon mb-4 d-flex align-items-center justify-content-center">
              <span class="icon-instagram"></span>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-lg-2 ftco-animate">
          <a href="images/gallery-2.jpg" class="gallery image-popup img d-flex align-items-center"
            style="background-image: url(images/gallery-2.jpg);">
            <div class="icon mb-4 d-flex align-items-center justify-content-center">
              <span class="icon-instagram"></span>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-lg-2 ftco-animate">
          <a href="images/gallery-3.jpg" class="gallery image-popup img d-flex align-items-center"
            style="background-image: url(images/gallery-3.jpg);">
            <div class="icon mb-4 d-flex align-items-center justify-content-center">
              <span class="icon-instagram"></span>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-lg-2 ftco-animate">
          <a href="images/gallery-4.jpg" class="gallery image-popup img d-flex align-items-center"
            style="background-image: url(images/gallery-4.jpg);">
            <div class="icon mb-4 d-flex align-items-center justify-content-center">
              <span class="icon-instagram"></span>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-lg-2 ftco-animate">
          <a href="images/gallery-5.jpg" class="gallery image-popup img d-flex align-items-center"
            style="background-image: url(images/gallery-5.jpg);">
            <div class="icon mb-4 d-flex align-items-center justify-content-center">
              <span class="icon-instagram"></span>
            </div>
          </a>
        </div>
        <div class="col-md-4 col-lg-2 ftco-animate">
          <a href="images/gallery-6.jpg" class="gallery image-popup img d-flex align-items-center"
            style="background-image: url(images/gallery-6.jpg);">
            <div class="icon mb-4 d-flex align-items-center justify-content-center">
              <span class="icon-instagram"></span>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <footer class="ftco-footer ftco-section">
    <div class="container">
      <div class="row">
        <div class="mouse">
          <a href="#" class="mouse-icon">
            <div class="mouse-wheel"><span class="ion-ios-arrow-up"></span></div>
          </a>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Minishop</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4 ml-md-5">
            <h2 class="ftco-heading-2">Menu</h2>
            <ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Shop</a></li>
              <li><a href="#" class="py-2 d-block">About</a></li>
              <li><a href="#" class="py-2 d-block">Journal</a></li>
              <li><a href="#" class="py-2 d-block">Contact Us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Help</h2>
            <div class="d-flex">
              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
              </ul>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">FAQs</a></li>
                <li><a href="#" class="py-2 d-block">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Have a Questions?</h2>
            <div class="block-23 mb-3">
              <ul>
                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San
                    Francisco, California, USA</span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                <li><a href="#"><span class="icon icon-envelope"></span><span
                      class="text">info@yourdomain.com</span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;
            <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with
            <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com"
              target="_blank">Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>
      </div>
    </div>
  </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#F96D00" />
    </svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <script src="./js/facturar.js"></script>

</body>

</html>