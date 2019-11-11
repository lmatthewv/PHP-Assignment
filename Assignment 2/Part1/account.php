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
	 <div class="main-wrapper">
		<h2>Account</h2>
	 </div>
	 <?php
				//if not logged in
				if (!isset($_SESSION['u_id'])){
					//tell the user
					echo 'You are not logged in';
				}		
				?>
	 <ul>
			<li>
				<?php
				//if logged in display the users info
				if (isset($_SESSION['u_id'])){
					echo $_SESSION['u_firstName'];
				}
				?>
			</li>
			<li>
				<?php
				if (isset($_SESSION['u_id'])){
					echo $_SESSION['u_lastName'];
				}		
				?>
			</li>
			<li>
				<?php
				if (isset($_SESSION['u_id'])){
					echo $_SESSION['u_email'];
				}		
				?>
			</li>
			<li>
				<?php
				if (isset($_SESSION['u_id'])){
					echo $_SESSION['u_phone'];
				}		
				?>
			</li>
			<li>
				<?php
				if (isset($_SESSION['u_id'])){
					echo $_SESSION['u_username'];
				}		
				?>
			</li>
		<ul>
</section>

<?php
include_once 'footer.php';
?>

