<?php
$pdo = new PDO("sqlite:/var/www/bm.db");
//获取数据表列表#仅显示自建表，系统表不显示。
//$indexs = $pdo->query("select * from register where id='1'")->fetchAll(PDO::FETCH_ASSOC );
//打印
var_dump($pdo->query("insert into  tt values(2,'ekinghao')"));
var_dump($pdo->query("select * from  register"));
var_dump($pdo->query("insert  into tt values (2,3,4,5)"));
//var_dump($tables,$indexs);
?>
