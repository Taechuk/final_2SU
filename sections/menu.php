<div style="background-color:powderblue;">
    <h3><a href=<?php if(isset($_COOKIE["loggedin"])) {echo 'run.php';} else {echo 'index.php';} ?>>Home</a>  <?php if(isset($_COOKIE["loggedin"])) {echo '<h3><a href="logout.php">Log Out</a></h3>';}?>
</h3>
</div>