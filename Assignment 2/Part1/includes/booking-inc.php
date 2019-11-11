<?php

  var_dump($_POST);

  include_once 'dbh-inc.php';

  $client = NULL;
  $service = NULL;
  $staff = NULL;
  $bookingDate = NULL;
  $bookingNO = NULL;

  $action = NULL;

IF ( !EMPTY($_POST['action'])) {
    
    $action = $_POST['action'];
    
  } else {
    echo "<br />Need to create a booking from the web form";
  }
  
  IF ( $action == 'DELETE' OR $action == 'EDIT' ) {
    
    IF ( !EMPTY($_POST['bookingNO'])) {
      $bookingNO = $_POST['bookingNO'];
      
      echo "<br />bookingNO entered in the form is " . $bookingNO;
      
    } else {
      echo "<br />user needs to enter a bookingNO in the form";
    }
  }
  
  IF ( $action == 'DELETE' ) {
    $sql = "DELETE FROM bookings WHERE bookingNo = $bookingNO";
    
    echo "<br />" . $sql;
    
    IF ( mysqli_query($conn, $sql) ) {
      echo "<br />Delete was successful";
      
      header("Location:../viewBookings.php");
      exit();
    } ELSE {
      echo "<br />Delete failed";
    }
  }

IF ( ISSET($_POST['bookForm']) ) {
  
  IF  ( !EMPTY($_POST['client'])) {
    $client = $_POST['client'];
    echo "client ID entered in the form is " . $client;
  } else {
    echo "user needs to enter a client id in the form";
  }
  
  IF  ( !EMPTY($_POST['staff'])) {
    $staff = $_POST['staff'];
    echo "<br />staff ID entered in the form is " . $staff;
  } else {
    echo "<br />user needs to enter a staff id in the form";
  }
  
  IF  ( !EMPTY($_POST['service'])) {
    $serviceID = $_POST['service'];
    echo "<br />service ID entered in the form is " . $serviceID;
  } else {
    echo "<br />user needs to enter a service id in the form";
  }
  
  IF  ( !EMPTY($_POST['bookingDate'])) {
    $bookingDate = $_POST['bookingDate'];
    echo "<br />bookingg date entered in the form is " . $bookingDate;
  } else {
    echo "<br />user needs to enter a date in the form";
  }
  
  IF  ( !EMPTY($_POST['serviceDate'])) {
    $serviceDate = $_POST['serviceDate'];
    echo "<br />service date entered in the form is " . $serviceDate;
  } else {
    echo "<br />user needs to enter a date in the form";
  }

  IF ( $action == 'ADD' ) {
    $sql = "INSERT INTO bookings (userID, staffID, serviceID, bookingDate, serviceDate, statusCode) 
  VALUES ('$client', '$staff', '$serviceID', '$bookingDate', '$serviceDate', 'p');";
  } ELSE IF ( $action == 'EDIT' ) {
    $sql = "UPDATE bookings
            SET bookingDate = '$bookingDate',
                userID = '$client',
                serviceID = '$serviceID',
                serviceDate = '$serviceDate',
                staffID = '$staff'
            WHERE bookingNo = $bookingNO;";
  } else {
    echo "no action set, please create booking from the booking form";
  }
  
  
  echo "<br />" . $sql;

  $result = mysqli_query($conn, $sql);

  if ( $result ) {
    echo "<br />insert was successful";

    $last_id = mysqli_insert_id($conn);
    echo "last id inserted " . $last_id . "<br /><br />";

    header('Location:../viewBookings.php');
  } else {
    echo "insert failed";
  }
  
  
}



