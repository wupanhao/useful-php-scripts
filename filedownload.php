<?php
//header("content-Type: text/html; charset=Utf-8");

if($_GET['filepath'])
{
$path=urldecode($_GET['filepath']);
if(! is_dir($path))
{
	$filepath="$path";
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename='.preg_replace('# #', '',basename($filepath)));//获取带有文件扩展名的文件名
	header('Content-Transf er-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Pragma: public');
	header('Content-Length: ' . filesize($filepath));//获取文件大小
	readfile($filepath);//输出文件
//echo "<a href=$path>$path</a>";
//$handle=fopen("$path","r");
//if(filesize("$path")<1000000){
//$original_content= file_get_contents("$path");
//$encoding =  mb_detect_encoding($original_content, array('ASCII','GB2312','GBK','UTF-8') ) ;
//echo "Encoding:".$encoding."</br>";
//echo nl2br(mb_convert_encoding(file_get_contents("$path"),'UTF-8',$encoding ));
}
//echo filesize("$path");
//while(! feof($handle))
//{
//$line=nl2br(fgets($handle));
//echo $line;
//}
//else
//echo "sorry,the file is so big<br>";
//echo "<br><a href=index.php>index</a><br>";
//echo nl2br(file_get_contents("$path"));
//}
}
else
{
$path="/";
if($_GET['dir'])
{
$path=urldecode($_GET['dir']);
//$files=scandir($path);
}
echo"当前路径:$path<br><hr>";
$files=scandir("$path");
echo"<font size=5>";
echo"已挂载磁盘:<br>";
$mnt="/media/pi/";
$mnts=scandir("$mnt");
//echo "<hr>";
foreach($mnts as $harddisk)
{
$mntdir="dir=".$mnt .$harddisk."/";
if($harddisk[0]!='.')
echo"<a href=filedownload.php?$mntdir>$harddisk</a><br>";
}
echo "<hr>目录<br>";
foreach($files as $file)
{
if(is_dir("$path/$file") )
$dir="dir=" ."$path/$file";
echo "<a href=filedownload.php?$dir>$file</a><br>";
}

echo '<hr>文件<br>';
foreach($files as $file)
{
if(! is_dir("$path/$file") )
{
$filepath="filepath=" . urlencode("$path/$file");
echo "<a href=filedownload.php?$filepath>$file</a><br>";
}

}

echo "<br><a href='javascript:history.back()'>返回</a><br>";
echo "<a href=index.php>index</a><br>";
}
?>
