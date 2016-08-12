<?php
$defaultdir="/media/pi";
if($_GET['absolutepath'])
$defaultdir=$_GET['absolutepath'];
if($_GET['submiting'])
{
$newdir=$_GET['currentdir']."/".$_GET['makedir'];
if(!is_dir($newdir)){
echo"尝试创建目录：$newdir<br>";
shell_exec(" mkdir $newdir");
//echo"创建目录成功，正在跳转";
}
else
echo"目录$newdir"."已存在，无法创建！";
//include_once("footer.php");
function gontenfile($filestr){

$gonten= explode('.',$filestr); //用点号分隔文件名到数组

$gonten = array_reverse($gonten); //把上面数组倒序

return $gonten[0]; //返回倒序数组的第一个值

}
$default_dir="/media/pi/HAO/kugou";
if($_POST[currentdir])
$default_dir=$_POST[currentdir];
if($_POST['submit'])
{
echo "上传信息：<br>";
if($_FILES['myfile']['error']==0)
{
if(isset($_POST['lujing']))
	{
if(isset($defaultdir))
$default_dir=$defaultdir;
//$upload_file=$default_dir . $_POST['lujing'] ."/". iconv("UTF-8","GBK",$_FILES['myfile'$
$upload_file=$default_dir ."/". $_POST['lujing'] ."/". $_FILES['myfile']['name'];
	}
else
//$upload_file=$default_dir ."upload_temp/". iconv("UTF-8","gbk",$_FILES['myfile']['name'$
$upload_file=$default_dir ."upload_temp/". $_FILES['myfile']['name'];
move_uploaded_file($_FILES['myfile']['tmp_name'],$upload_file);
echo "上传成功~<br>";
echo "文件名：" . $_FILES['myfile']['name']."<br>";
echo "临时文件名：" . $_FILES['myfile']['tmp_name']."<br>";
echo "文件大小：" . $_FILES['myfile']['size']."字节<br>";
echo "文件类型：" . $_FILES['myfile']['type']."<br>";
//echo "文件名：" . $_FILES['myfile']['error']."<br>";
echo "保存文件夹：".$_POST['lujing']."<br>";
//if(gontenfile())
$name="name=" ."$default_dir"."/".urlencode($_POST[lujing]);
if(gontenfile($upload_file)=='mp3')
echo "去听一听吧~<a href=playlist.php?$name>$name</a><br>";
else
	{
//echo gontenfile($name);
$dirname="dir="."$default_dir"."/".urlencode($_POST[lujing]);
echo "去看一看吧~<a href=filereader.php?$dirname>$dirname</a><br>";
	}
}
else
{
echo "上传失败！错误代码:".$_FILES['myfile']['error'];
echo "<br><a href=index.php>首页</a>";
}
}
//echo iconv("UTF-8","gbk",$_FILES["myfile"]["name"]);
//echo mb_convert_encoding($_FILES["myfile"]["name"],"UTF-8","gbk//TRANSLIT");
//upload_dir=
//$default_dir="/home/kugou/";
//if(isset($_POST['lujing']))
//$upload_file=$default_dir . $_POST['lujing'] ."/". iconv("UTF-8","GBK",$_FILES['myfile']['name']);
//$upload_file=$default_dir . $_POST['lujing'] ."/". $_FILES['myfile']['name'];
//else
//$upload_file=$default_dir ."upload_temp/". iconv("UTF-8","gbk",$_FILES['myfile']['name']);
//$upload_file=$default_dir ."upload_temp/". $_FILES['myfile']['name'];
//move_uploaded_file($_FILES['myfile']['tmp_name'],$upload_file);
//}

else
{
$path="/media/pi/HAO/kugou";
if(isset($defaultdir))
$path=$defaultdir;
//$path="/home/kugou";
//$default_dir="/home/kugou/upload_temp";
$dir_list=scandir("$path");
//echo "请选择上传路径<select name='lujin' size='1'>";
//foreach($dir_list as $dir)
//{
//if($dir[0]!='.')
//echo "<option value='$dir' >$dir";
//}
echo ("<form method='post' action=upload.php enctype='multipart/form-data'>");
echo "</select><br>";
echo"<input type=hidden name=currentdir value=$defaultdir>";
echo "请选择上传文件<input type='file' name='myfile'><br>";
echo "请选择上传路径<select name='lujing' size='1'>";
foreach($dir_list as $dir)
{
$dirpath=$defaultdir."/".$dir;
//echo"$dirpath<br>";
if($dir[0]!='.' and (is_dir("$dirpath")))
echo "<option value='$dir' >$dir";
}
//echo "<input >"
echo "<br><input type='submit' name='submit' value='提交'>" .'                 ';
echo "<input type='reset' >";
echo "</form>";
}
}
else
{
$dirs=scandir($defaultdir);
echo "当前目录：$defaultdir<br><hr>";
include_once("upload.php");
echo "<hr>";
foreach ($dirs as $dir)
	{
//echo"$dir<br>";
$absolutepath=$defaultdir."/".$dir;
//echo"$absolutepath<br>";
if(is_dir($absolutepath))
echo"<a href=fileupload.php?absolutepath=$absolutepath >$dir</a><br>";
	}
if($_GET['absolutepath'])
	{
//echo"<hr><br>";
echo"<br>";
echo"<form action=fileupload.php method=GET>";
echo"<input type=text name=makedir>";
echo"<input type=hidden name=currentdir value=$defaultdir>";
echo"<input type=submit name=submiting value=新建目录></form>";
	}
}
?>
