<?php 
if(isset($_COOKIE["loggedin"])) 
{
    unset($_COOKIE["loggedin"]);
    setcookie('loggedin', null, -1);
}

echo "<script>location.href='index.php';</script>";
?>