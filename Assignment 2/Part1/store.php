<?php

  require_once("includes/functions.php");

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
              Store
            </h1>
          </div>
          <div class="col-sm-8">
            <h2>Categories: </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-9">
            <h3><a href="category.php?id=1000">Candles</a></h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-9">
            <h3><a href="category.php?id=1001">Soaps</a></h3>
          </div>
        </div>
        
        <div class="row"></div>

      </div>

      <div class="row">
        <?php
          get_products();
        ?>
      </div>

</article>

    
      
      
<?php
include_once 'footer.php';
?>