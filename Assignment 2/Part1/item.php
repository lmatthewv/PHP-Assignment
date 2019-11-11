<?php
  include_once 'head.php';
  include('application.php');
  require_once("includes/functions.php");

  if( !isset($_SESSION) ) {
    session_start();
  }



  $query = query("SELECT * FROM products WHERE productID = " . $_GET['id'] . " ");
  confirm($query);
  $row = mysqli_fetch_array($query);

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
          <div class="col-sm-3">
            <h1>
              <?php echo $row['productName'] ?> $<?php echo $row['productPrice'] ?>
            </h1>
          </div>
          <div class="col-sm-9">
            &nbsp;
          </div>
        </div>
        
        <div class="row">
          <div class="col-sm-8">
            <img style="height:500px;" src="<?php echo $row['productImage'] ?>" alt="" >
          </div>
          <div class="col-sm-4">
            &nbsp;
          </div>
        </div>
        
        <div class="row">
          <div class="col-sm-3">
            <h2>Description</h2>
          </div>
          <div class="col-sm-9">
            &nbsp;
          </div>
        </div>
        
        <div class="row">
          <div class="col-sm-8">
            <p><?php echo $row['productDescription'] ?></p>
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