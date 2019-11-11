 
  <?php
include_once 'head.php';
  include('application.php');

  if( !isset($_SESSION) ) {
    session_start();
  }

?>

<header>
  <h2>
    Body Cafe
  </h2>  

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
	 <div class="main-wrapper">
		<h2>Signup</h2>
		<!-- forms for signing in -->
		<form class="signup-form" action="includes/signup-inc.php" method="POST">
			<input type="text" name="firstName" placeholder="Firstname">
			<input type="text" name="lastName" placeholder="Lastname">
			<input type="text" name="email" placeholder="E-mail">
			<input type="text" name="phone" placeholder="Phone Number">
			<input type="text" name="uid" placeholder="Username">
			<input type="password" name="pwd" placeholder="Password">
			<button type="submit" name="submit">Sign up</button>
		</form>
	 </div>
</section>

<?php
include_once 'footer.php';
?>