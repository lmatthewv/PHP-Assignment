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
            Validation
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
            Validating student enrolment
          </h3>
        </div>
        <div class="col-sm-4">
          &nbsp;
        </div>
      </div>
      
    </div>
      
      <form id="enrolment" action="" method="POST">
        <input id="firstName" name="firstName" type="text" placeholder="First Name"><br><br>
        <input id="lastName" name="lastName" type="text" placeholder="Last Name"><br><br>
        <input id="age" name="age" type="text" placeholder="Age"><br><br>
        <input id="email" name="email" type="email"  placeholder="Email"><br><br>
        <select multiple type="text" id="module" name="module" class="dropdown-toggle" type="button" 
                  data-toggle="dropdown">
          <option selected disabled value="">Modules</option>
          <option value="comp606">Comp 606</option>
          <option value="comp604">Comp 604</option>
          <option value="comp605">Comp 605</option>
          <option value="comp603">Comp 603</option>
          <option value="info602">info 602</option>
          <option value="comp601">Comp 601</option>
        </select><br><br>
        <label>Payment Method</label><br>
        <input type="radio" name="credit" value="credit"> Credit Card<br>
        <input type="radio" name="cash" value="cash"> Cash<br>
        <input type="radio" name="transfer" value="transfer"> Bank Transfer<br><br>
        
        <input id="creditCard" name="creditCard" type="text" placeholder="Credit Card Number"><br><br>
        <label>Stream</label><br>
        <input type="radio" name="streama" value="a"> A<br>
        <input type="radio" name="streamb" value="b"> B<br>
        <input type="radio" name="streamc" value="c"> C<br>
        <input type="radio" name="streamd" value="d"> D<br><br>
        <button type="submit" id="enrol" name="enrol">Enrol</button>
      </form>
      
      
  </article>




  <script>
    
    $().ready(function(){
      $("#enrolment").validate({
        debug: true,
        rules: {

          firstName: {
            required: true,
            maxlength: 30
          },

          lastName: {
            required: true,
            maxlength: 30
          },

          age: {
            required: true,
            number: true
          },
                                 
          module: {
            required: true,
            minlength: 4
            },

          email: {
             email: true
             },

          creditCard: {
            required: true,
            creditcard: true
          }
        },
        messages: {
            firstName: {
                required: "First Name required",
                maxlength: "Maximum length for first name is 30"
              }                      
        }
        
      });
      
    })
  </script>
    
      
      
      
<?php
include_once 'footer.php';
?>