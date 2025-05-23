<?php include 'insertion.php' ?>
<?php include 'party_insertion.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>ButterCup Events</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <!-- <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: TheEvent
    Theme URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
  ======================================================= -->
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
        <a href="#intro" class="scrollto"><img src="img/logo.png" alt="" title=""></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#schedule">Order</a></li>
          <!-- <li><a href="#venue">Venue</a></li> -->
          <li><a href="#hotels">Bookings</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#footer">Contact</a></li>
          <li class="buy-tickets"><a href="">Logout</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0">Event Management<br>System</h1>
      <p class="mb-4 pb-0">Make any occasion unforgettable</p>
    </div>
  </section>

  <main id="main">

    <!--==========================
      About Section
    ============================-->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2>Who we are and what we do</h2>
            <p>ButterCup is a 360 degree agency having 18 years of experience working in the areas of Events Management. Being the best event management company we strive to create high quality and out of the box productions for our clients.</p>
          </div>
          <div class="col-lg-3">
            <h3>Minaam Ahmad</h3>
            <p>CEO</p>
          </div>
          <div class="col-lg-3">
            <h3>Ahmad Azhar</h3>
            <p>Managing Director</p>
          </div>
        </div>
      </div>
    </section>

  
    <!--==========================
      Schedule Section
    ============================-->
    <section id="schedule" class="section-with-bg">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Events Booking</h2>
          <p>Here is our event planes</p>
        </div>

        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" href="index.php" >Wedding Event</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="party.php" >Party Event</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cooprate.php">Cooperate Event</a>
          </li>
        </ul>


        <div class="tab-content row justify-content-center">

          <!-- Schdule Day 1 -->
          <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">

            <h3 class="sub-heading"> <b> Book your wedding Event</b></h3>

              <div class="form">
                <div id="errormessage"></div>
                <form action="" method="post">
                  <!-- 0 -->
                  <div class="form-row">

                    <div class="form-group col-md-6">
                      <input type="text" class="form-control" name="cust_name" id="cust_name" placeholder="Enter the name"  data-msg="Please enter numbers" required />
                      <div class="validation"></div>
                    </div>

                    <div class="form-group col-md-6">
                      <input type="text" class="form-control" name="cust_ph" id="cust_ph" placeholder="Enter ph#" data-rule="number" data-msg="Please enter numbers" required />          
                      <div class="validation"></div>
                    </div>
                  </div>

                  <!-- 1 -->
                  <div class="form-row">

                    <div class="form-group col-md-6">
                      <select type="text" name="venu_type" class="form-control" id="venu_type" required>
                        <option value="">Select Venue</option>
                        <option value="Indoor">Indoor</option>
                        <option value="Outdoor">Outdoor</option>
                      </select>
                      <div class="validation"></div>
                    </div>

                    <div class="form-group col-md-6">
                      <select type="text" name="meal_pakg" class="form-control" id="meal_pakg" required>
                        <option value="">Select Meal Package</option>
                        <option value="Standard">Standard</option>
                        <option value="Special">Special</option>
                        <option value="Premium">Premium</option>
                      </select>
                      <div class="validation"></div>
                    </div>
                  </div>


                  <!-- 2 -->
                  <div class="form-row">
                    
                    <div class="form-group col-md-6">
                      <select type="text" name="stag_decor" class="form-control" id="stag_decor" required>
                        <option value="">Select Stage Decoration</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                      <div class="validation"></div>
                    </div>

                    <div class="form-group col-md-6">
                      <input type="number" class="form-control" name="pno" id="pno" placeholder="Enter No of People" data-rule="number" data-msg="Please enter numbers" required />
                      <div class="validation"></div>
                    </div>
                  </div>


                  <!-- 3 -->
                  <div class="form-row">
                    
                    <div class="form-group col-md-6">
                      <input type="time" class="form-control" name="time" id="time" placeholder="Please Select Time" data-rule="number" data-msg="Please enter numbers" required />
                      <div class="validation"></div>
                    </div>


                    <div class="form-group col-md-6">
                      <input type="date" class="form-control" name="date" id="date" required />
                      <div class="validation"></div>
                    </div>
                  </div>

                 

                  
                 
                  
                  <div class="text-center"> 
                    <!-- <label for="">Book Event</label> -->
                   <input type="submit" value="submit" name="submit" >
                </form>
              </div>

           

          </div>
          <!-- End Schdule Day 1 -->

     
 
        </div>

      </div>

    </section>

    
    <!--==========================
      Hotels Section
    ============================-->
    <section id="hotels" class="section-with-bg wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Your Bookings</h2>
          <p>Here are your event Bookings</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="img/hotels/1.jpg" alt="Hotel 1" class="img-fluid">
              </div>
              <h3><a href="#">Wedding Event</a></h3>
              <p>Booking Date</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="img/hotels/2.jpg" alt="Hotel 2" class="img-fluid">
              </div>
              <h3><a href="#">Party Event</a></h3>
              <p>Booking Date</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="img/hotels/3.jpg" alt="Hotel 3" class="img-fluid">
              </div>
              <h3><a href="#">Cooperate Event</a></h3>
              <p>Booking Date</p>
            </div>
          </div>

        </div>
      </div>

    </section>

    <!--==========================
      Gallery Section
    ============================-->
    <section id="gallery" class="wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Gallery</h2>
          <p>Check our gallery from the recent events</p>
        </div>
      </div>

      <div class="owl-carousel gallery-carousel">
        <a href="img/gallery/1.jpg" class="venobox" data-gall="gallery-carousel"><img src="img/gallery/1.jpg" alt=""></a>
        <a href="img/gallery/2.jpg" class="venobox" data-gall="gallery-carousel"><img src="img/gallery/2.jpg" alt=""></a>
        <a href="img/gallery/3.jpg" class="venobox" data-gall="gallery-carousel"><img src="img/gallery/3.jpg" alt=""></a>
        <a href="img/gallery/4.jpg" class="venobox" data-gall="gallery-carousel"><img src="img/gallery/4.jpg" alt=""></a>
        <a href="img/gallery/5.jpg" class="venobox" data-gall="gallery-carousel"><img src="img/gallery/5.jpg" alt=""></a>
        <a href="img/gallery/6.jpg" class="venobox" data-gall="gallery-carousel"><img src="img/gallery/6.jpg" alt=""></a>
        <a href="img/gallery/7.jpg" class="venobox" data-gall="gallery-carousel"><img src="img/gallery/7.jpg" alt=""></a>
        <a href="img/gallery/8.jpg" class="venobox" data-gall="gallery-carousel"><img src="img/gallery/8.jpg" alt=""></a>
      </div>

    </section>


  
    <!--==========================
      Buy Ticket Section
    ============================-->
    <section id="buy-tickets" class="section-with-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h2>Meal Packages</h2>
          <p>These dishes will be include in our meal according to the given packages</p>
        </div>

        <div class="row">
          <div class="col-lg-4">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Standard Meal</h5>
                <h6 class="card-price text-center">850/-</h6>
                <h5 class="card-title text-center">per head</h5>

                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Mutton/ Chicken</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Rice</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Drinks(Cold Drinks, Water)</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Soup</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Salad</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Desert</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Cake</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="standard-access">Buy Now</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Special Meal</h5>
                <h6 class="card-price text-center">1400/-</h6>
                <h5 class="card-title text-center">per head</h5>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Mutton/ Chicken</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Rice</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Drinks(Cold Drinks, Water)</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Cake</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Soup</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Salad</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Desert</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="pro-access">Buy Now</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Pro Tier -->
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Premium Meal</h5>
                <h6 class="card-price text-center">2900/-</h6>
                <h5 class="card-title text-center">per head</h5>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Mutton/ Chicken</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Rice</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Drinks(Cold Drinks, Water)</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Cake</li>
                  <li><span class="fa-li"><i class="fa fa-times"></i></span>Soup</li>
                  <li><span class="fa-li"><i class="fa fa-times"></i></span>Salad</li>
                  <li><span class="fa-li"><i class="fa fa-times"></i></span>Desert</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="premium-access">Buy Now</button>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Modal Order Form -->
      <div id="buy-ticket-modal" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Order Meal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="#">
                <div class="form-group">
                  <input type="text" class="form-control" name="your-name" placeholder="Your Name">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="your-email" placeholder="Your Email">
                </div>
                <div class="form-group">
                  <select id="ticket-type" name="ticket-type" class="form-control" >
                    <option value="">-- Select Your Order Type --</option>
                    <option value="standard-access">Simple Meal</option>
                    <option value="pro-access">Special Meal</option>
                    <option value="premium-access">Premium Meal</option>
                  </select>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn">Buy Now</button>
                </div>
              </form>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

    </section>

 
  </main>


  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <img src="img/logo.png" alt="TheEvenet">
            <p>ButterCup is a 360 degree agency having 18 years of experience working in the areas of Events Management. Being the best event management company we strive to create high quality and out of the box productions for our clients.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>


          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Model Town <br>
              Lahore, 86-P<br>
              Pakistan <br>
              <strong>Phone:</strong> +92 3096901413<br>
              <strong>Phone:</strong> +92 3096901413<br>
              <strong>Email:</strong> ButterCup@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>ButterCup Events</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
        -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
</body>

</html>
