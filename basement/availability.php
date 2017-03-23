<!DOCTYPE html>
<html>
<head>
   <title>地下室预约记录</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>
<body>
<div class="container">
   <div class="row" >
<div >

<h1>信息科学与技术学院地下室预约记录</h1>

<?php
$today=date("Y-m-d");
$roms=array("东厅","西厅","中厅");
$days=array('0','1','2','3','4','5','6','7','8','9');
echo '<table name="basement_status" id="basement_status" border="1" class="table">';
echo '<div class="date"><tr><td></td>';

foreach ($days as $day) {
	$date=date("Y-m-d",strtotime("+$day day"));
	echo '<td>'.$date.'</td>';
}
	echo '</tr>';
$pdo = new PDO("sqlite:/var/www/bm.db");
//获取数据表列表#仅显示自建表，系统表不显示。
//$rows = $pdo->query("select * from register")->fetchAll(PDO::FETCH_ASSOC );
//获取索引列表


foreach ($roms as $rom) {
	echo '<tr><td>'.$rom.'</td>';
	foreach ($days as $day) {
	$date=date("Y-m-d",strtotime("+$day day"));
	echo '<td>';
	$q="SELECT team_name,start,end FROM register WHERE date='$date' AND rom='$rom' order by start";
	//$r=@mysqli_query($mysql,$q);
	$rows = $pdo->query($q)->fetchAll(PDO::FETCH_ASSOC );
	
	foreach($rows as $row){
		//var_dump($row);
		$time=mktime((int)($row['start']/6),($row['start']%6)*10,0);
		$start_time=date('H:i',$time);
		$time=mktime((int)($row['end']/6),($row['end']%6)*10,0);
		$end_time=date('H:i',$time);
		echo '【'.$row['team_name'].'】'.$start_time.'~'.$end_time.'<br>';
			}
		
	echo '</td>';
	}
	echo "</tr>";

}
echo '<br>';
echo '</table>';
echo '</div>';
//include_once("register.html");
?>
</div>
</div>
</body>
</html>
