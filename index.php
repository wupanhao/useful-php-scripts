<html>
<head><title>index</title></head>
<link rel="shortcut icon" href="/image/bitbug_favicon.ico" />
<body>

<font size=6>
<br>
<?php
$path=trim(shell_exec("pwd"))."/";
function gontenfile($filestr){

$gonten= explode('.',$filestr); //用点号分隔文件名到数组

$gonten = array_reverse($gonten); //把上面数组倒序

return $gonten[0]; //返回倒序数组的第一个值

}
//echo '<img src="/image/imagenvshengjie.jpg" />';

	echo "欢迎使用<br>Author:东皇昊一<br>";
	$arrar=scandir("$path");
	//$arr=explode(" ",$arrar);
	//foreach($arrar as $filenamer)
	//echo "<p align=center>";
	foreach($arrar as $filename)
	//{echo($filename);}
	//var_dump($arrar);
	if(gontenfile($filename)=='html' || gontenfile($filename)=='php' )
{
	//basename($filename)
	echo("<a href=$filename>$filename</a><br>");
	//echo substr($filename,-4);
//	echo basename($filename);
}
?>
</font>
</body>
</html>
