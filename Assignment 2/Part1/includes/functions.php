<?php

  include_once 'dbh-inc.php';

  function query($sql) {
    global $conn;
    return mysqli_query($conn, $sql);
  }


  function confirm($result){

    global $conn;

    if(!$result) {
      die("QUERY FAILED " . mysqli_error($conn));
    }

  }



  function get_products() {
          
      $query = query("SELECT * FROM products");
      confirm($query);

      $rows = mysqli_num_rows($query); // Get total number of rows from the database

      while($row = mysqli_fetch_array($query)) {

      ?>

        <div class="col-sm-3 col-lg-3 col-md-3">
            <div class="thumbnail product">
                <a href="item.php?id=<?php echo $row['productID']?>"><img style="height:90px" src="<?php echo $row['productImage']?>" alt=""></a>
                <div class="caption">
                    <h4 class="pull-right">&#36;<?php echo $row['productPrice']?></h4>
                    <h4><a href="item.php?id=<?php echo $row['productID']?>"><?php echo $row['productName']?></a>
                    </h4>
                     <a class="btn btn-primary" style="margin-bottom:20px;" target="_blank" href="cart.php?add=<?php echo $row['productID']?>">Add to cart</a>
                </div>
            </div>
        </div>

      <?php
      }
    
  }

  function get_category() {
    
    $query = query("SELECT * FROM products WHERE productCategoryID = " . $_GET['id'] . " ");
    confirm($query);
    
    $rows = mysqli_num_rows($query); // Get total number of rows from the database
    
    while($row = mysqli_fetch_array($query)) {

    ?>

      <div class="col-sm-3 col-lg-3 col-md-3">
          <div class="thumbnail product">
              <a href="item.php?id=<?php echo $row['productID']?>"><img style="height:90px" src="<?php echo $row['productImage']?>" alt=""></a>
              <div class="caption">
                  <h4 class="pull-right">&#36;<?php echo $row['productPrice']?></h4>
                  <h4><a href="item.php?id=<?php echo $row['productID']?>"><?php echo $row['productName']?></a>
                  </h4>
                   <a class="btn btn-primary" style="margin-bottom:20px;" target="_blank" href="cart.php?add=<?php echo $row['productID']?>">Add to cart</a>
              </div>
          </div>
      </div>

    <?php
    }
  }

?>