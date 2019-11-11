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
      
      <br /><br />

        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
          <div class="slides"></div>
          <h3 class="title"></h3>
          <a class="prev">‹</a>
          <a class="next">›</a>
          <a class="close">×</a>
          <a class="play-pause"></a>
          <ol class="indicator"></ol>
        </div>

        <div id="blueimp-gallery-carousel" class="blueimp-gallery blueimp-gallery-carousel">
          <div class="slides"></div>
          <h3 class="title"></h3>
          <a class="prev">‹</a>
          <a class="next">›</a>
          <a class="play-pause"></a>
        </div>
        
        <div id="links">
          <a href="img/aroma.jpg" title="Aroma"><img src="img/aroma - thumbnail.jpg" alt="Aroma"></a>
          <a href="img/bed.jpg" title="Bed"><img src="img/bed - thumbnail.jpg" alt="Bed"></a>
          <a href="img/face.jpg" title="Face"><img src="img/face - thumbnail.jpg" alt="Face"></a>
        </div>

    </article>
  
<?php
include_once 'footer.php';
?>