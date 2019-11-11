<?php
  include_once 'head.php';
  include('application.php');

  if( !isset($_SESSION) ) {
    session_start();
  }

?>

<header>
  <?php
    if (isset($_SESSION['u_id'])){
        $userID = $_SESSION['u_id'];
        echo "Welcome " . $userID . "<br />";
      }
  ?>
  <h2>
    Body Cafe
  </h2>  
</header>
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
    </article>
      
      
<?php
include_once 'footer.php';
?>