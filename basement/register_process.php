<?php
$debug=true;
$debug=false;
if(empty($_POST['date']) || $_SERVER['REQUEST_METHOD']=='POST'){
include_once("check_functions.php");
include_once("includes/sql_connect.php");
$team_name=mysqli_real_escape_string($mysql,$_POST['team_name']);
$reason=mysqli_real_escape_string($mysql,$_POST['reason']);
$date=mysqli_real_escape_string($mysql,$_POST['date']);
$start_time=mysqli_real_escape_string($mysql,$_POST['start_time']);
$end_time=mysqli_real_escape_string($mysql,$_POST['end_time']);
$user_name=mysqli_real_escape_string($mysql,$_POST['user_name']);
$student_ID=mysqli_real_escape_string($mysql,$_POST['student_ID']);
$tel=mysqli_real_escape_string($mysql,$_POST['tel']);
$rom=mysqli_real_escape_string($mysql,$_POST['rom']);
$passwd=$_POST['passwd'];
if(empty($team_name)||empty($reason)||empty($date)||empty($start_time)||empty($end_time)||empty($user_name)||empty($student_ID)||empty($rom)){
	//if(judge())
	echo "请把信息填写完整<br>";
	$error_message.="信息不完整\n";
}
else if(!member_check($team_name,$passwd))
{	echo "口令有误！<br>";
	$error_message.="口令有误！\n";
}
else{
	check_in_time($start_time,$end_time);
	teamname_judge($team_name);
	rom_judge($rom);
	date_right($date);
	date_available($date);
}
if(!empty($error_message)){
	echo $error_message;
}
else{
$start_array=explode(':', $start_time);
$end_array=explode(':', $end_time);
$start=(int)($start_array[0]*6+$start_array[1]/10);
$end=(int)($end_array[0]*6+$end_array[1]/10);
if($debug){
var_dump($start_array);
var_dump($end_array);
echo $start;
echo " ---";
echo $end;
}
$q="SELECT team_name,start,end FROM register WHERE date='$date' AND rom='$rom'";
//var_dump($q);
$r=@mysqli_query($mysql,$q);
$flag=true;
if($r){
while($row=mysqli_fetch_array($r,MYSQLI_ASSOC)){
//var_dump($row);
//var_dump($row['start']);
//var_dump($row['end']);
//echo "<br>";
//var_dump($start);
//var_dump($end);
//echo "<br>";
//var_dump(check_time($row['start'],$row['end'],$start,$end));
//$judge=check_time($row['start'],$row['end'],$start,$end);
//echo $judge;
if(!check_time($row['start'],$row['end'],$start,$end)){
$flag=false;
echo "抱歉,当前时间段与";
echo $row['team_name'];
echo "冲突,请选择其余空闲时间段";
break;
}
//echo "登陆成功,正在转向首页";
//echo '<head> <meta http-equiv="Refresh" content="1;url=http://172.16.122.8"> </head>';
		}		//end while
if($flag){
$q="INSERT INTO register(team_name,reason,date,start,end,user_name,student_ID,tel,rom,create_at) VALUES('$team_name','$reason','$date','$start','$end','$user_name','$student_ID','$tel','$rom',NOW())";
$r=@mysqli_query($mysql,$q);
if(!$r)
	echo "插入数据出错,请重新填写表单或联系管理员".$r.mysqli_error($mysql);
else{
	echo "信息登记成功。(请以下图表格最终显示为准）<br>
		请按时使用并爱护地下室。——信科团学宣";
	include_once("availability.php");
echo "<script language=JavaScript>parent.mainFrame.location.reload();</script>";//可以刷新别的页面而不跳转
		}
	}
}//end $r
else{
$r=@mysqli_query($mysql,$q);
if(!$r)
	echo "插入数据出错,请重新填写表单或联系管理员".$r.mysqli_error($mysql);
else{
	echo "信息登记成功。(请以下图表格最终显示为准）<br>
		请按时使用并爱护地下室。——信科团学宣";
echo "<script language=JavaScript>parent.mainFrame.location.reload();</script>";//可以刷新别的页面而不跳转
			}
		}
	} //end if !$error_message
}//end post
else
echo "请求错误,请使用POST协议哦(昊昊么么哒)";
?>
