<?php
  include_once 'includes/dbh-inc.php';
  require_once("includes/functions.php");

  include_once 'head.php';
  include('application.php');

  if( !isset($_SESSION) ) {
    session_start();
  }

  if(isset($_GET['add'])) {
    
    $query = query("SELECT * FROM products WHERE productID=" . $_GET['add']);
    confirm($query);
    
    while($row = mysqli_fetch_array($query)) {
      
        if($row['productQuantity'] != $_SESSION['product_' . $_GET['add']]) {
          if(isset($_SESSION['product_' . $_GET['add']])) {
            $_SESSION['product_' . $_GET['add']]+=1;
          } else {
            $_SESSION['product_' . $_GET['add']]=1;
          }
          
        } else {
          
          echo "We only have" . $row['productQuanitity'] . " " . "available";
          //redirect("checkout.php");
          
        }
      
      }
    
    }

if(isset($_GET['remove'])) {
  $_SESSION['product_' . $_GET['remove']]--;
  if($_SESSION['product_' . $GET['remove']] < 1) {
    redirect("checkout.php");
  }
}

function cart() {
  foreach ($_SESSION as $name => $value) {
    if ($value > 0) {
      if (substr($name, 0, 8) == "product_") {
        $length = strlen($name - 8);
        $id = substr($name, 8, $length);
        
        $query = query("SELECT * FROM products WHERE productID = " . $id . " ");
        confirm($query);
        while($row = mysqli_fetch_array($query)) {
          
?>
          
          <div class="row">
          <h3>
            <?php echo $row[productName] ?>
          </h3>
        </div>
        <div class="row">
          <h3>
            <?php echo $row[productID] ?>
          </h3>
        </div>
        <div class="row">
          <h3>
            Quanitity: <?php echo $value ?>
          </h3>
        </div>

<?php
          
        }
        
      }
    }
  }
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
              Cart
            </h1>
          </div>
          <div class="col-sm-8">
            &nbsp;
          </div>
        </div>

        <div class="row">
          <h3>
            Quanitity: <?php echo $_SESSION['product_' . $_GET['add']]+=1; ?>
          </h3>
        </div>

      </div>
    </article>
      
      
<?php
include_once 'footer.php';
?>