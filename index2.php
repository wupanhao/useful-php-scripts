<!DOCTYPE html>
<html>
<head>
   <title>简易web应用</title>
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

      <h1>简易web应用<small> Powered by : Ekinghao </small></h1>

<hr>
   <!--nav class="navbar navbar-default" role="navigation">
     <div class="navbar-header">
         <a class="navbar-brand" href="#">实用web应用</a>
      </div>
</nav-->
      <div class="collapse navbar-collapse" id="example-navbar-collapse">
         <ul class="nav navbar-nav">
            <!--li><a class="btn btn-default"  href="prize.html">抽奖</a></li>
            <li><a class="btn btn-default" href="advanced_sort.html">排序</a></li>
            <li><a class="btn btn-default" href="counter.html">计数器</a></li-->
<?php
$path=trim(shell_exec("pwd"))."/";
$arrar=scandir("$path");
foreach($arrar as $filename){
	if(substr($filename,-4)=="html" || substr($filename,-4)==".php")
		echo '<li><a class="btn btn-default" href="'.$filename.'">'.$filename.'</a></li>';
}
?>	
            <!--li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Java
                  <b class="caret"></b>
               </a>
               <ul class="dropdown-menu">
                  <li><a href="#">jmeter</a></li>
                  <li><a href="#">EJB</a></li>
                  <li><a href="#">Jasper Report</a></li>
                  <li class="divider"></li>
                  <li><a href="#">分离的链接</a></li>
                  <li class="divider"></li>
                  <li><a href="#">另一个分离的链接</a></li>
               </ul>
            </li-->
         </ul>
      </div>

         <nav class="navbar navbar-default" role="navigation">

               <div class="navbar-header">
               <a class="navbar-brand" href="#">给手机看的==</a>
               </div>

               <ul class="nav navbar-nav">

<?php   
$path=trim(shell_exec("pwd"))."/";
$arrar=scandir("$path");
foreach($arrar as $filename){
        if(substr($filename,-4)=="html" || substr($filename,-4)==".php")
                echo '<li><a  href="'.$filename.'">'.$filename.'</a></li>';
}
echo '<li><a href="basement/index.php"> 地下室预约登记系统</a></li>';
?> 
                  <!--li><a  href="prize.html">抽奖</a></li>
                  <li><a  href="advanced_sort.html">排序</a></li>
                  <li><a  href="counter.html">计数器</a></li-->
               </ul>

      </nav>

   </div>
</div>
<script type="text/javascript">




</script>
</body>
</html>
