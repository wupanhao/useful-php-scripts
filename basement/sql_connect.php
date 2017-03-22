<?php
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
$mysql=@mysqli_connect("localhost","root","wph123789","basement") or die(mysqli_connect_error());
mysqli_set_charset($mysql,"utf8");
//$query="SELECT username from users;";
//$r=@mysqli_query($mysql,$query);
//while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
//echo $row['username']."<br>";
?>
