
<!DOCTYPE html>
<html>
<head>
   <title>File Downloader</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>
<body>

<div class="container">
   <div class="row" >
         <h1>File Downloader<small> Powered by : Ekinghao </small></h1>

   <hr>
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

}

}
else
{
$path="/";
if($_GET['dir'])
{
$path=urldecode($_GET['dir']);
//$files=scandir($path);
}
echo "当前路径:$path<br><hr>";
$files=scandir("$path");
//echo"<font size=5>";
echo "已挂载磁盘:<br>";
$mnt="/media/pi/";
$mnts=scandir($mnt);
//echo "<hr>";
foreach($mnts as $harddisk)
{
$mntdir="dir=".$mnt .$harddisk."/";
if($harddisk[0]!='.')
echo "<a href=filedownload.php?$mntdir>$harddisk</a><br>";
}
        echo "<h3>目录</h3>";
        echo '<div class="list-group">';
foreach($files as $file)
{
if(is_dir("$path/$file") )
$dir="dir="."$path/$file";
echo '<a href="filedownload.php?'.$dir.'" class="list-group-item active">'.$file.'</a><br>';
}
        echo '</div>';
        echo '<h3>文件</h3>';
        echo '<div class="list-group">';
foreach($files as $file)
{
if(! is_dir("$path/$file") )
{
$filepath="filepath=". urlencode("$path/$file");
echo '<a href="filedownload.php?'.$filepath.'" class="list-group-item">'.$file.'</a>';
}

}
        echo '</div>';


//echo "<br><a href='javascript:history.back()'>返回</a><br>";
//echo "<a href=index.php>index</a><br>";
}
?>
        </div>
        </div>


</body>
        </html>
