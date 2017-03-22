<?php
$error_message="";
function check_time($old_starttime,$old_endtime,$new_starttime,$new_endtime)
    {
    if (
         (($new_starttime>$old_starttime)&&($new_starttime<$old_endtime))
       ||(($new_starttime<=$old_starttime)&&($new_endtime>=$old_endtime))
       ||(($new_endtime>$old_starttime)&&($new_endtime<$old_endtime))
     )
    return false;
    else return true;
}
function check_in_time($starttime,$endtime)
{
  global $error_message;
  if (strstr($starttime,":")!=false)
     {
    // $start_hour_s=$starttime;

     $start=explode(":",$starttime);
     $start_hour=(int)$start[0];
    // var_dump($start_hour);
     $start_minute=(int)$start[1];
    // var_dump($start_minute);
     $startminute=$start_hour*60+$start_minute;
     if(($start_hour>=24)||($start_hour<0)||($start_minute<0)||($start_minute>=60))
     $error_message.="请输入正确的时间！<br>";
     }
     else
     $error_message.="时间格式输入错误！<br>";


  if (strstr($endtime,":")!=false)
     {
     $end=explode(":",$endtime);
     $end_hour=(int)$end[0];
     //var_dump($end_hour);
     $end_minute=(int)$end[1];
     //var_dump($end_minute);
     $endminute=$end_hour*60+$end_minute;
     if(($end_hour>=24)||($end_hour<0)||($end_minute<0)||($end_minute>=60))
         $error_message.="请输入正确的时间！<br>";
     }
     else
     $error_message.="时间格式输入错误！<br>";

   if ( (($endminute-$startminute)>180)||(($endminute-$startminute)<10) )
   $error_message.="申请的时间段不得少于10分钟且不多于3个小时！<br>";
}

function teamname_judge($tn){
global $error_message;
$teamname=array('主席团','办公室','宣传部','公关部','权益部','学业部','文艺部','体育部','组织部','新闻部','学竞部','实践部','辩论队','各球队','其他类');
if(!in_array($tn, $teamname))
$error_message.="团体名出错啦<br>";
}

function rom_judge($rn){
    global $error_message;
$romname=array("东厅","中厅","西厅");
if(!in_array($rn, $romname))
$error_message.="房间名出错啦<br>";
}
function date_right($date)
{
global $error_message;
$is_date=strtotime($date)?strtotime($date):false;

 if($is_date===false)
 {
     $error_message.="时间格式出错啦<br>";
     }
     else
     {
     $date_new=explode("-",$date);
     $y=(int)$date_new[0];
     $m=(int)$date_new[1];
     $d=(int)$date_new[2];
     $ny=array(31,28,31,30,31,30,31,31,30,31,30,31);
     $ry=array(31,29,31,30,31,30,31,31,30,31,30,31);
     if(($y%4==0&&$y%100!=0)||$y%400==0)
     {
     if($m<=12&&$m>=1)
     {
     if($d>$ry[$m-1])
     $error_message.="日期不合法<br>";
     }
     else
     $error_message.="日期不合法<br>";
     }
     else
     {
     if($m<=12&&$m>=1)
     {
     if($d>$ny[$m-1])

     $error_message.="日期不合法<br>";
     }
     else
     $error_message.="日期不合法<br>";
     }
     }
     }

function date_available($date)
{
global $error_message;
//$today=date('Y-m-d');
//$deadline=date('Y-m-d',strtotime("+10 days"));
$flag=0;
for($i=0;$i<=9;$i++)
{
if($date==date('Y-m-d',strtotime("+$i day")))
{
$flag=1;
break;
}
else
continue;
}
if ($flag==0)
$error_message.="最多只能提前十天预约！<br>";

}
function member_check($team,$pw)
{
$passwd=array('主席团'=>'cistzxt','办公室'=>'cistbgs','宣传部'=>'cistxcb','公关部'=>'cistggb','权益部'=>'cistqyb','学业部'=>'cistxyb','文艺部'=>'cistwyb','体育部'=>'cisttyb','组织部'=>'cistzzb','新闻部'=>'cistxwb','学竞部'=>'cistxjb','实践部'=>'cistsjb','辩论队'=>'cistbld','各球队'=>'cistgqd','其他类'=>'cistadmin');
return $passwd["$team"]==$pw;
}
?>
