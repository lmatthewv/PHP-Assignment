 
  <?php
include_once 'head.php';
  include('application.php');

  if( !isset($_SESSION) ) {
    session_start();
  }

if (isset($_SESSION['u_id'])){
					$userID = $_SESSION['u_id'];
          echo "Welcome " . $userID . "<br />";
				}
?>

<header>
  <h1 id="title">
    Body Cafe
  </h1>  

    <?php
      showNav();
    ?>

    <article>
    
    <div class="container-fluid">
      
      <div class="row">
        <div class="col-sm-4">
          <h1>
            Web Page Title
          </h1>
        </div>
        <div class="col-sm-8">
          &nbsp;
        </div>
      </div>
      
      <div class="row"></div>
      
      <div class="row"></div>
      
      <div class="row">
        <div class="col-sm-8">
          <h3>
            Sub Title
          </h3>
        </div>
        <div class="col-sm-4">
          &nbsp;
        </div>
      </div>
      
    </div>
    
    <section class="main-container">
    </article>
    <br /><br />

      <div class="main-wrapper">
        <h2>Bookings</h2>
       <?php
        if (isset($_SESSION['u_id'])){
					$userID = $_SESSION['u_id'];
          ?><ul>
         <li><a href="newBookings.php">Make a booking</a></li>
         <li><a href="viewBookings.php">View Bookings</a></li>
        </ul>
        <?php
				}
      ?>
       </div>
    </section>

<?php
include_once 'footer.php';
?>