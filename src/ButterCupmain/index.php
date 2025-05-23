<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /login/login.php");
    exit();
}

$showAlert = isset($_GET['submitted']);
$loginSuccess = isset($_GET['login']) && $_GET['login'] === 'success';

$submittedForm = $_GET['submitted'] ?? null;
$loginSuccess = isset($_GET['login']) && $_GET['login'] === 'success';


?>



<?php
$showAlert = isset($_GET['submitted']) ? true : false;
?>
<?php include 'insertion.php' ?>
<?php include 'party_insertion.php' ?>
<?php include 'copevent_insert.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>ButterCup Events</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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


</head>

<body>


  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#intro" class="scrollto"><img src="img/logo2.png" alt="" title=""></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#schedule">Order</a></li>
          <li><a href="#hotels">Bookings</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#footer">Contact</a></li>
          <li class="buy-tickets"><a href="logout.php">Logout</a></li>
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
          <div class="col-lg-3">
            <h2>Who we are and what we do</h2>
            <p>ButterCup is a 360 degree agency having 18 years of experience working in the areas of Events Management. Being the best event management company we strive to create high quality and out of the box productions for our clients.</p>
          </div>
          <div class="col-lg-3">
            <h3>Muhammad Gulfham</h3>
            <p>CEO</p>
          </div>
          <div class="col-lg-3">
            <h3>Muhammad Gulfhamr</h3>
            <p>Managing Director</p>
          </div>
          <div class="col-lg-3">
            <h3>Muhammad Gulfham</h3>
            <p>Finance Officer</p>
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
            <a class="nav-link active" href="#day-1" role="tab" data-toggle="tab">Wedding Event</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#day-2" role="tab" data-toggle="tab">Party Event</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#day-3" role="tab" data-toggle="tab">Cooperate Event</a>
          </li>
        </ul>


        <div class="tab-content row justify-content-center">

          <!-- Schdule Day 1 -->
          <div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">

            <h3 class="sub-heading"> <b> Book your wedding Event</b></h3>

            <div class="form">
              <div id="errormessage"></div>
              <form action="wedding_submit.php" method="post">
                <!-- 0 -->
                <div class="form-row">

                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="cust_name" id="cust_name" placeholder="Enter the name" data-msg="Please enter numbers" required />
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
                  <input type="submit" value="submit" name="submit">
                </div>
              </form>
            </div>



          </div>
          <!-- End Schdule Day 1 -->

          <!-- Schdule Day 2 -->
          <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-2">

            <h3 class="sub-heading"> <b> Book your Party Event</b></h3>

            <div class="form">
              <div id="errormessage"></div>
              <form action="party_submit.php" method="post">
                <!-- 0 -->
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter the name" data-msg="Please enter numbers" required />
                    <div class="validation"></div>
                  </div>

                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Enter ph#" data-rule="number" data-msg="Please enter numbers" required />
                    <div class="validation"></div>
                  </div>
                </div>

                <!-- 1 -->
                <div class="form-row">

                  <div class="form-group col-md-6">
                    <select type="text" name="venu_type" class="form-control" id="venu_type" required>
                      <option value="">Select Party Type</option>
                      <option value="Birthday Party">Birthday Party</option>
                      <option value="School/College Event">School/College Event</option>
                      <option value="Anniversary Party">Anniversary Party</option>
                    </select>
                    <div class="validation"></div>
                  </div>

                  <div class="form-group col-md-6">
                    <select type="text" name="meal_type" class="form-control" id="meal_type" required>
                      <option value="">Select Meal</option>
                      <option value="Break Fast">Break Fast</option>
                      <option value="Lunch">Lunch</option>
                      <option value="Dinner">Dinner</option>
                    </select>
                    <div class="validation"></div>
                  </div>
                </div>


                <!-- 2 -->
                <div class="form-row">

                  <div class="form-group col-md-6">
                    <select type="text" name="select_deco" class="form-control" id="select_deco" required>
                      <option value="">Select Stage Decoration</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                    <div class="validation"></div>
                  </div>

                  <div class="form-group col-md-6">
                    <input type="number" class="form-control" name="people_no" id="people_no" placeholder="Enter No of People" data-rule="number" data-msg="Please enter numbers" required />
                    <div class="validation"></div>
                  </div>
                </div>


                <!-- 3 -->
                <div class="form-row">

                  <div class="form-group col-md-6">
                    <select type="text" name="meal_pkg" class="form-control" id="meal_pkg" required>
                      <option value="">Select Meal Package</option>
                      <option value="Standard">Standard</option>
                      <option value="Special">Special</option>
                      <option value="Premium">Premium</option>
                    </select>
                    <div class="validation"></div>
                  </div>


                  <div class="form-group col-md-6">
                    <input type="time" class="form-control" name="time" id="time" placeholder="Please Select Time" data-rule="number" data-msg="Please enter numbers" required />
                    <div class="validation"></div>
                  </div>
                </div>


                <div class="form-row">
                  <div class="form-group col-md-12">
                    <input type="date" class="form-control" name="date" id="date" required />
                    <div class="validation"></div>
                  </div>



                </div>

                <div class="row">
                  <div class="form-group col-md-12">
                    <div class="text-center">
                      <input type="submit" value="Submit" name="done">
                    </div>
                  </div>

                </div>








              </form>
            </div>

          </div>
          <!-- End Schdule Day 2 -->



          <!-- Schdule Day 3 -->
          <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-3">

            <h3 class="sub-heading"> <b> Book your Cooperate Event</b></h3>

            <div class="form">
              <div id="errormessage"></div>
              <form action="corporate_submit.php" method="post">

                <!-- 0 -->
                <div class="form-row">




                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="cname" id="cname" placeholder="Enter the name" data-msg="Please enter numbers" required />
                    <div class="validation"></div>
                  </div>

                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="phoneno" id="phoneno" placeholder="Enter ph#" data-rule="number" data-msg="Please enter numbers" required />
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
                    <select type="text" name="meal_type" class="form-control" id="meal_type" required>
                      <option value="">Select Meal</option>
                      <option value="Break Fast">Break Fast</option>
                      <option value="Lunch">Lunch</option>
                      <option value="Dinner">Dinner</option>
                    </select>
                    <div class="validation"></div>
                  </div>





                </div>


                <!-- 2 -->
                <div class="form-row">

                  <div class="form-group col-md-6">
                    <select type="text" name="stage_deco" class="form-control" id="stage_deco" required>
                      <option value="">Select Stage Decoration</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                    <div class="validation"></div>
                  </div>



                  <div class="form-group col-md-6">
                    <input type="number" class="form-control" name="no_ppl" id="no_ppl" placeholder="Enter No of People" data-rule="number" data-msg="Please enter numbers" required />
                    <div class="validation"></div>
                  </div>



                </div>


                <!-- 3 -->
                <div class="form-row">

                  <div class="form-group col-md-6">
                    <select type="text" name="meal_pkg" class="form-control" id="meal_pkg" required>
                      <option value="">Select Meal Package</option>
                      <option value="Standard">Standard</option>
                      <option value="Special">Special</option>
                      <option value="Premium">Premium</option>
                    </select>
                    <div class="validation"></div>
                  </div>





                  <div class="form-group col-md-6">
                    <input type="date" class="form-control" name="date" id="date" required />
                    <div class="validation"></div>
                  </div>
                </div>






                <div class="text-center">
                  <input type="submit" value="Submit" name="insert">
                </div>
              </form>
            </div>

          </div>
          <!-- End Schdule Day 3 -->


        </div>






      </div>

      </div>

    </section>


    <!--==========================
      Hotels Section
    ============================-->
    <?php
$username = $_SESSION['username'];

$bookings = [];

// Wedding events
<<<<<<< HEAD
$wedding_q = mysqli_query($conn, "SELECT * FROM wedding_event WHERE username='$username'");
=======
$wedding_q = mysqli_query($conn, "SELECT * FROM wedding_event WHERE username='$username' AND status='approved'");
>>>>>>> cb1bb785e6077a83d742549adc68d47fae6f423f
while ($row = mysqli_fetch_assoc($wedding_q)) {
    $bookings[] = [
        'type' => 'Wedding Event',
        'image' => 'https://media.istockphoto.com/id/479977238/photo/table-setting-for-an-event-party-or-wedding-reception.jpg?s=612x612&w=0&k=20&c=yIKLzW7wMydqmuItTTtUGS5cYTmrRGy0rXk81AltdTA=',
        'date' => $row['date'],
        'time' => $row['time'],
        'people' => $row['pno'],
        'venue' => $row['venu_type'],
        'meal' => $row['meal_pakg'],
        'stage' => $row['stag_decor'],
        'phone' => $row['cust_ph']
    ];
}

// Party events
<<<<<<< HEAD
$party_q = mysqli_query($conn, "SELECT * FROM party_type WHERE username='$username'");
=======
$party_q = mysqli_query($conn, "SELECT * FROM party_type WHERE username='$username' AND status='approved'");
>>>>>>> cb1bb785e6077a83d742549adc68d47fae6f423f
while ($row = mysqli_fetch_assoc($party_q)) {
    $bookings[] = [
        'type' => 'Party Event',
        'image' => 'https://media.istockphoto.com/id/479977238/photo/table-setting-for-an-event-party-or-wedding-reception.jpg?s=612x612&w=0&k=20&c=yIKLzW7wMydqmuItTTtUGS5cYTmrRGy0rXk81AltdTA=',
        'date' => $row['date'],
        'time' => $row['time'],
        'people' => $row['people_no'],
        'venue' => $row['venu_type'],
        'meal' => $row['meal_pkg'],
        'stage' => $row['select_deco'],
        'phone' => $row['phone_no']
    ];
}

// Corporate events
<<<<<<< HEAD
$cop_q = mysqli_query($conn, "SELECT * FROM cop_event WHERE username='$username'");
=======
$cop_q = mysqli_query($conn, "SELECT * FROM cop_event WHERE username='$username' AND status='approved'");
>>>>>>> cb1bb785e6077a83d742549adc68d47fae6f423f
while ($row = mysqli_fetch_assoc($cop_q)) {
    $bookings[] = [
        'type' => 'Corporate Event',
        'image' => 'https://media.istockphoto.com/id/479977238/photo/table-setting-for-an-event-party-or-wedding-reception.jpg?s=612x612&w=0&k=20&c=yIKLzW7wMydqmuItTTtUGS5cYTmrRGy0rXk81AltdTA=',
        'date' => $row['date'],
        'time' => '', // No time in table
        'people' => $row['no_ppl'],
        'venue' => $row['venu_type'],
        'meal' => $row['meal_pkg'],
        'stage' => $row['stage_deco'],
        'phone' => $row['phoneno']
    ];
}
?>

<section id="hotels" class="section-with-bg wow fadeInUp">
  <div class="container">
    <div class="section-header">
      <h2>Your Bookings</h2>
      <p>Here are your approved event bookings</p>
    </div>

    <?php if (count($bookings) === 0): ?>
      <div class="text-center">
        <p><strong>You have no bookings right now.</strong></p>
      </div>
    <?php else: ?>
      <div class="row">
        <?php foreach ($bookings as $event): ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="hotel shadow-sm border p-2 rounded bg-white h-100">
              <div class="hotel-img mb-2">
                <img src="<?= htmlspecialchars($event['image']) ?>" alt="<?= htmlspecialchars($event['type']) ?>" class="img-fluid rounded">
              </div>
              <h4><?= htmlspecialchars($event['type']) ?></h4>
              <ul class="list-unstyled small">
                <li><strong>Date:</strong> <?= htmlspecialchars($event['date']) ?></li>
                <?php if ($event['time']): ?>
                  <li><strong>Time:</strong> <?= htmlspecialchars($event['time']) ?></li>
                <?php endif; ?>
                <li><strong>Venue:</strong> <?= htmlspecialchars($event['venue']) ?></li>
                <li><strong>Meal Package:</strong> <?= htmlspecialchars($event['meal']) ?></li>
                <li><strong>Stage Decoration:</strong> <?= htmlspecialchars($event['stage']) ?></li>
                <li><strong>No. of People:</strong> <?= htmlspecialchars($event['people']) ?></li>
                <li><strong>Phone:</strong> <?= htmlspecialchars($event['phone']) ?></li>
              </ul>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
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
        <a href="" class="venobox" data-gall="gallery-carousel"><img src="img/gallery2/1.jpg" alt=""></a>
        <a href="" class="venobox" data-gall="gallery-carousel"><img src="img/gallery2/2.jpg" alt=""></a>
        <a href="" class="venobox" data-gall="gallery-carousel"><img src="img/gallery2/3.jpg" alt=""></a>
        <a href="" class="venobox" data-gall="gallery-carousel"><img src="img/gallery2/4.jpg" alt=""></a>
        <a href="" class="venobox" data-gall="gallery-carousel"><img src="img/gallery2/6.jpg" alt=""></a>
        <a href="" class="venobox" data-gall="gallery-carousel"><img src="img/gallery2/8.jpg" alt=""></a>
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
<<<<<<< HEAD
                <h6 class="card-price text-center">50€</h6>
=======
                <h6 class="card-price text-center">850/-</h6>
>>>>>>> cb1bb785e6077a83d742549adc68d47fae6f423f
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
                  <button type="button" class="btn" data-toggle="modal" data-target="#" data-ticket-type="standard-access">Buy Now</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Special Meal</h5>
<<<<<<< HEAD
                <h6 class="card-price text-center">100€</h6>
=======
                <h6 class="card-price text-center">1400/-</h6>
>>>>>>> cb1bb785e6077a83d742549adc68d47fae6f423f
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
                  <button type="button" class="btn" data-toggle="modal" data-target="#" data-ticket-type="pro-access">Buy Now</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Pro Tier -->
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Premium Meal</h5>
<<<<<<< HEAD
                <h6 class="card-price text-center">250€</h6>
=======
                <h6 class="card-price text-center">2900/-</h6>
>>>>>>> cb1bb785e6077a83d742549adc68d47fae6f423f
                <h5 class="card-title text-center">per head</h5>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Mutton/ Chicken</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Rice</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Drinks(Cold Drinks, Water)</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Cake</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Soup</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Salad</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Desert</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target="#" data-ticket-type="premium-access">Buy Now</button>
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
                  <select id="ticket-type" name="ticket-type" class="form-control">
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
          </div>
        </div>
      </div>

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
            <img src="img/logo2.png" alt="TheEvenet">
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
              Bermingum  <br>
              Stret 1, shop # 86<br>
              UK <br>
              <strong>Phone:</strong> +44 7563 131077<br>
              <strong>Phone:</strong> +44 7563 131077<br>
              <strong>Email:</strong> ButterCup@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="https://twitter.com/home" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="https://www.facebook.com/" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="https://www.instagram.com/" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="https://myaccount.google.com/" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="https://www.linkedin.com/in/" class="linkedin"><i class="fa fa-linkedin"></i></a>
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
        Designed by <b style="color:red;">Gulfham</b>
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


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
<?php if ($loginSuccess): ?>
Swal.fire({
  icon: 'success',
  title: 'Login Successful!',
  text: 'Welcome back to the dashboard.',
  confirmButtonColor: '#3085d6'
});
<?php endif; ?>

<?php if ($submittedForm === 'wedding'): ?>
Swal.fire({
  icon: 'success',
  title: 'Wedding Event Submitted!',
  text: 'Your wedding event has been booked successfully.',
  confirmButtonColor: '#3085d6'
});
<?php elseif ($submittedForm === 'party'): ?>
Swal.fire({
  icon: 'success',
  title: 'Party Event Submitted!',
  text: 'Your party event has been booked successfully.',
  confirmButtonColor: '#3085d6'
});
<?php elseif ($submittedForm === 'corporate'): ?>
Swal.fire({
  icon: 'success',
  title: 'Corporate Event Submitted!',
  text: 'Your corporate event has been booked successfully.',
  confirmButtonColor: '#3085d6'
});
<?php endif; ?>
</script>


<!-- Owl Carousel -->
<link rel="stylesheet" href="lib/owlcarousel/assets/owl.carousel.min.css">
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<script>
$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
    loop: true,
    margin: 15,
    nav: true,
    dots: false,
    responsive:{
      0:{ items:1 },
      600:{ items:2 },
      1000:{ items:3 }
    }
  });
});
</script>



</body>

</html>