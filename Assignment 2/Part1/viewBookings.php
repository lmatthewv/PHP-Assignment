 
<?php

  include_once 'head.php';
  include('application.php');

  if( !isset($_SESSION) ) {
    session_start();
  }

  $noRows = 0;

  if (isset($_SESSION['u_id'])){
            $userID = $_SESSION['u_id'];
            echo "Welcome " . $userID . "<br />";
          

    include_once 'includes/dbh-inc.php';

    $sql = "SELECT * FROM bookings WHERE userID = $userID";
    echo $sql . "<br />";

    $result = mysqli_query($conn, $sql);
    if( mysqli_num_rows($result) > 0 ){
      echo "<br />some results returned";

      $noRows = mysqli_affected_rows($conn);
      echo "<br />number of rows in select " . $noRows;

    } else {
      echo "no bookings yet.";
    }
  }

?>

<header>
  <h1 id="title">
    Body Cafe
  </h1>

  

    <?php
      showNav();
    ?>
  <section>
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
          <h3>
            View Bookings
          </h3>
        </div>
        <div class="col-sm-4">
          &nbsp;
        </div>
      </div>
    
    <br /><br />
  </section>
    
    <div class="row">
      <div class="col-sm-12">
        &nbsp;
      </div>
    </div>
    
    <form method="POST" action="newBookings.php">
      <div class="row">
        <div class="col-sm-8">
          <p>Click <button id="bookNow" name="bookNow" value="ADD" class="btn btn-success">Book Now</button> to book a new appointment</p>
        </div>
        <div class="col-sm-4">
          &nbsp;
        </div>
      </div>
    </form>
    
      
    <div class="row">
      <div class="col-sm-8">
        <h3>Your Bookings (<?php echo $noRows; ?>):</h3>
      </div>
      <div class="col-sm-4">
        &nbsp;
      </div>
    </div>
      
      <!-- Data Headings -->
      
      <div class="row">
        <div class="col-sm-1">&nbsp;</div>
        <div class="col-sm-1">Booking No</div>
        <div class="col-sm-2">Booking Date</div>
        <div class="col-sm-1">Service</div>
        <div class="col-sm-1">Staff</div>
        <div class="col-sm-2">Service Date</div>
        <!--<div class="col-sm-2">Service Time</div>-->
        <div class="col-sm-1">Status</div>
        
        <div class="col-sm-2">&nbsp;</div>
      </div>
      
      <!-- SELECT Results -->
      
        
        <?php
      if (isset($_SESSION['u_id'])){
        
				$userID = $_SESSION['u_id'];
        $rowCount = 0;
        
        while ( $row = mysqli_fetch_assoc($result)) {
          $rowCount++;
        ?>
      <div class="row">
        <div class="col-sm-1"><?php echo $rowCount ?></div>
        <div class="col-sm-1"><?php echo $row['bookingNo'] ?></div>
        <div class="col-sm-2"><?php echo $row['bookingDate'] ?></div>
        <div class="col-sm-1"><?php echo $row['serviceID'] ?></div>
        <div class="col-sm-1"><?php echo $row['staffID'] ?></div>
        <div class="col-sm-2"><?php echo $row['serviceDate'] ?></div>
        <!--<div class="col-sm-1"><?php// echo $row['serviceTime'] ?></div>-->
        <div class="col-sm-1"><?php echo $row['statusCode'] ?></div>
        
        <form method="POST" action="newBookings.php">
          <div class="col-sm-1"><button id="editBook" name="editBook" value="EDIT" type="submit" 
                                        class="btn btn-success btn-sm">Edit</button></div>
          <input type="hidden" id="bookingNO" name="bookingNO" value="<?php echo $row['bookingNo'] ?>">
        </form>
        
        <form method="POST" action="includes/booking-inc.php">
          <div class="col-sm-1">
            <button id="action" name="action" value="DELETE" type="submit" 
                    class="btn btn-sm btn-success" onclick="return deleteCheck()">Delete</button>
          </div>
          
          <input type="hidden" id="bookingNO" name="bookingNO" value="<?php echo $row['bookingNo'] ?>">
        </form>
        
       </div>
        
        <?php
          }
          mysqli_close($conn);
      }
        ?>  
   </div>

</article>

</section>



<?php
include_once 'footer.php';
?>