<?php include_once("header.php");?>
<body>
<?php

if($_GET['musicpath'])
{
$music=urldecode($_GET['musicpath']);
shell_exec("sudo killall omxplayer.bin");
$a=`omxplayer -o local "$music"`;

echo "$music";
//$music=$_GET['musicpath'];
//echo"<audio src=$music>";
echo basename($music)." is on playing~<br>";
//echo"<EMBED src=\"$music\" width=320 height=40 type=audio/x-pn-realaudio-plugin controls=ControlPanel loop=true autostart=true volume=100 Initfn=load-types mime-types=mime.types>";
//echo"您的浏览器不支持 audio 标签。";
//echo"<audio src=\"$music\" preload=true>您的浏览器不支持 audio 标签</audio>";
//////echo"<audio controls=\"controls\"  autoplay=\"autoplay\"><source src=\"$music\" type=\"audio/mp3\"></audio>";
//echo"<embed type=audio/mp3 src=$music autostart=true loop=false></embed>";
}
else
{
include_once("functions");
$defaultpath="/media/pi/HAO/kugou";
if($_GET['dirpath'])
$defaultpath=urldecode($_GET['dirpath']);
$dirs=scandir($defaultpath);
echo"目录:<br>";
foreach($dirs as $dir)
        {
$rawpath="$defaultpath"."/".$dir;
$codepath=urlencode($rawpath);
if(is_dir($rawpath))
echo"<a href='webplayer.php?dirpath=$codepath' data-theme='e' data-role='button'>$dir</a><br>";
        }
echo"<hr>歌曲<br>";
foreach($dirs as $dir)
        {
$rawpath="$defaultpath"."/".$dir;
$codepath=urlencode($rawpath);
if(!is_dir($rawpath))
{
if(gontenfile($rawpath)=='mp3')
echo"<a href=\"webplayer.php?musicpath=$codepath\">$dir</a><br>";
}
        }


}
//include_once("footer.php");
?>
</body>
