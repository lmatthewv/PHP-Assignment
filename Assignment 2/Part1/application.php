<?php

if( !isset($_SESSION) ) {
  session_start();
}

function showNav(){
  ?>
  
  <nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="viewBookings.php">Bookings</a></li>
				<li><a href="account.php">My Account</a></li>
				<li><a href="store.php">Store</a></li>
			</ul>
			<div class="nav-login">
				<?php
					//if the user is logged in
					if (isset($_SESSION['u_id'])) {
						//create a sign out button
						echo '<form action="includes/logout-inc.php" method="POST">
							<button type="submit" name="submit">Logout</button>
							</form>';
					} else {
						//if not then have a form for username/email and password, 
						//and a sign in button
						echo '<form action="includes/login.php" method="POST">
						<input type="text" name="uid" placeholder="Username/e-mail">
						<input type="password" name="pwd" placeholder="Password">
						<button type="submit" name="submit">Login</button>
						</form>
						<a href="signup.php">Sign up</a>';
					}
				?>				
				
			</div>
		</div>
	</nav>
</header>

<?php
}

?>