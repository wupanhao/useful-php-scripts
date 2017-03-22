<!DOCTYPE html>
<html>
<head>
   <title>Music Player</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>
<body>

<div class="container">
   <div class="row" >
         <h1>Music Player<small> Powered by : Ekinghao </small></h1>

   <hr>
   <a href="webplayer.php?cmd=killall" class="btn btn-primary btn-lg" role="button">
        Stop   </a>
<?php
if($_GET['cmd']=="killall")
  shell_exec("killall omxplayer.bin");
else if($_GET['musicpath'])
{
$music=urldecode($_GET['musicpath']);
shell_exec("killall omxplayer.bin");
$cmd="omxplayer -o local \"".$music."\"";
//shell_exec('mpg123 -a hw:2,0 "'.$music.'"');
shell_exec($cmd);
echo $music.$cmd;
//$music=$_GET['musicpath'];
//echo"<audio src=$music>";
echo basename($music)." is on playing~<br>";

}
else
{
$defaultpath="/home/pi/kugou";
if($_GET['dirpath'])
$defaultpath=urldecode($_GET['dirpath']);
$dirs=scandir($defaultpath);
        echo "<h3>contents:</h3>";
   echo '<div class="list-group">';

foreach($dirs as $dir)
        {
$rawpath="$defaultpath"."/".$dir;
$codepath=urlencode($rawpath);
if(is_dir($rawpath))
echo '<a href="webplayer.php?dirpath='.$codepath.'" class="list-group-item active" >'.$dir.'</a><br>';
        }
        echo '</div>';
        echo"<h3>lists:</h3>";
   echo '<div class="list-group">';
foreach($dirs as $dir)
        {
$rawpath="$defaultpath"."/".$dir;
$codepath=urlencode($rawpath);
if(!is_dir($rawpath))
{
if(substr($rawpath,-3)=='mp3')
echo '<a href="webplayer.php?musicpath='.$codepath.'" class="list-group-item">'.$dir.'</a>';
}

}
        echo '</div>';

}
//include_once("footer.php");
?>
</body>
        </html>

