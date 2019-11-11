   <?php

  date_default_timezone_set('Pacific/Auckland');
  include_once 'head.php';
  include('application.php');

  if( !isset($_SESSION) ) {
    session_start();
  }

  $bookingNO = NULL;
  $bookingDate = NULL;
  $userID = NULL;
  $serviceID = NULL;
  $staffID = NULL;
  $serviceDate = NULL;
  $status = NULL;

  if (isset($_SESSION['u_id'])){
            $userID = $_SESSION['u_id'];
            echo "Welcome " . $userID . "<br />";
          }

  include_once 'includes/dbh-inc.php';

  $services_dd = "SELECT * FROM services;";
  $serviceOptionsAvail = NULL;
  $servicesResults = mysqli_query($conn, $services_dd);

  $staff_dd =  "SELECT * 
                FROM users u, userLogon ul
                Where u.userID = ul.userID AND ul.userType = 'S';";
  $staffOptionsAvail = NULL;
  $staffResults = mysqli_query($conn, $staff_dd);


  $currDate = date('Y-m-d');
  echo "current date is " . $currDate;

  IF ( ISSET($_POST['editBook']) ) {

    $editBook = $_POST['editBook'];
    echo "<br />edit booking button was clicked" . $editBook;
    $action = 'EDIT';
    IF ( ISSET($_POST['bookingNO']) ) {
      require_once('includes/dbh-inc.php');

      $bookingNO = $_POST['bookingNO'];
      echo "<br />bookingNO is " . $bookingNO;

      $sql = "SELECT *
              FROM bookings
              WHERE bookingNO = $bookingNO;";

      echo"<br / >" . $sql;

      $result = mysqli_query($conn, $sql);

      IF (mysqli_num_rows($result) === 1 ) {

        $row = mysqli_fetch_assoc($result);

        $bookingDate = $row['bookingDate'];
        $userID = $row['userID'];
        $serviceID = $row['serviceID'];
        $staffID = $row['staffID'];
        $serviceDate = $row['serviceDate'];
        $status = $row['statusCode'];
      }

    }

  } else {
    $action = 'ADD';
  }

  IF ( $bookingDate == NULL ) {
    $bookingDate = $currDate;
  }

?>
<header>
  <h2>
    Body Cafe
  </h2>  

  
  <section>
    <?php
      showNav();
    ?>

    <article>
    
    <div class="container-fluid">
      
      <div class="row">
        <div class="col-sm-4">
          <h1>
            Bookings
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
          <h3 id="title">
            Make a Booking
          </h3>
        </div>
        <div class="col-sm-4">
          &nbsp;
        </div>
      </div>
      
    </div>
    
    </article>
    <br /><br />
  </section>

<article class="main-container">
	 <div class="container-fluid" id="makeBooking">
		<h2>Bookings</h2>
		<form id="bookingForm" name="bookingForm" class="signup-form" action="includes/booking-inc.php" method="POST">
      
      <input type="hidden" id="action" name="action" value="<?php echo $action; ?>">
      
      <?php
        IF ( $action = 'EDIT' ) {
      ?>
          <input type="hidden" id="bookingNO" name="bookingNO" value="<?php echo $bookingNO ?>">      
      <?php
        }
      ?>
      
			<div class="form-group row">
        <label for="client" class="col-sm-2 col-form-label">Client</label>
        <div class="col-sm-4">
          <input type="text" name="client" placeholder="Client" id="client" class="form-control" 
                 value="<?php echo $userID; ?>" readonly>
        </div>       
      </div>
      
      <div class="form-group row">
        <label for="client" class="col-sm-2 col-form-label">Service</label>
        <div class="col-sm-4">
          <select type="text" name="service" class="form-control" class="dropdown-toggle" type="button" 
                  data-toggle="dropdown" required="true" value="<?php echo $serviceID; ?>">
            <option selected disabled value="">Services</option>
            <?php
              while ($servicesRow = mysqli_fetch_assoc($servicesResults) ) {

              $serviceNOdd = $servicesRow['serviceID'];
              $serviceName = $servicesRow['serviceName'];

              if ( $servicesRow['serviceID'] === $serviceNOdd) {
                $serviceOptionsAvail = "<option value='$serviceNOdd' selected>" 
                  . $serviceName . "</option>";
              } else {
                $serviceOptionsAvail = "<option value='$serviceNOdd'>" . $serviceName . "</option>";
              }
                echo $serviceOptionsAvail;
              }
            ?>
            </select>
        </div>       
      </div>
      
      <div class="form-group row">
        <label for="client" class="col-sm-2 col-form-label">Staff</label>
        <div class="col-sm-4">
          <select type="text" name="staff" class="form-control" class="dropdown-toggle" 
                  type="button" data-toggle="dropdown" required="true" value="<?php echo $staffID; ?>">
            <option selected disabled value="">Staff</option>
            
            <?php
              while ($staffRow = mysqli_fetch_assoc($staffResults) ) {

                $staffNOdd = $staffRow['userID'];
                $staffFirstName = $staffRow['firstName'];
                $staffLastName = $staffRow['lastName'];

                if ( $staffRow['userID'] === $staffNOdd) {
                  $staffOptionsAvail = "<option value='$staffNOdd' selected>" 
                    . $staffFirstName .  " " . $staffLastName . "</option>";
                } else {
                  $staffOptionsAvail = "<option value='$staffNOdd'>" . $staffFirstName . "</option>";
                }
                echo $staffOptionsAvail;
              }
            ?>
          </select>
        </div>
      </div>
      
			<div class="form-group row">
        <label for="client" class="col-sm-2 col-form-label">Booking Date</label>
        <div class="col-sm-4">
          <input type="date" id="theDate" class="form-control" name="bookingDate" value="<?php echo $currDate; ?>">
        </div>       
      </div>
      
      <div class="form-group row">
        <label for="client" class="col-sm-2 col-form-label">Service Date</label>
        <div class="col-sm-4">
          <input type="date" class="form-control" id="serviceDate" name="serviceDate" value="<?php echo $serviceDate; ?>">
        </div>       
      </div>
      
      <div class="form-group row">
        <div class="cil-sm-6 text-center">
          <button type="submit" id="bookForm" name="bookForm" class="btn btn_success">Book Now</button>
        </div>
      </div>  
		</form>
	 </div>
</article>

<?php
  include_once 'footer.php';
?>