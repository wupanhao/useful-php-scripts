<!DOCTYPE html>
<html>
<head>
   <title>Index</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

</head>
<body>
<div class="container">
    <h1 class = "center-block">Index<small> Powered by : EkingHao</small></h1>
<?php
if($_GET['dir'])
$pwd =urldecode( $_GET['dir']);
else
$pwd = '.';
#$pwd = trim(shell_exec("pwd")).'/';

echo '<h3>'.$pwd.'</h3>';
$items = scandir($pwd);
#var_dump($items);
echo '<h3 class="list-group">Dirs</h3>';
foreach($items as $item)
{
#echo $item;
if(is_dir($pwd.'/'.$item))
echo '<a href="?dir='.urlencode($pwd.'/'.$item).'" class="list-group-item active" >'.$item.'</a><br>';
}

echo '<h3 class="list-group">Files</h3>';
foreach($items as $item)
{
#echo $item;
if( (!is_dir($item)) &&  (substr($item,-4)=='html' || substr($item,-4)=='.php'))
echo '<a href="'.$pwd.'/'.$item.'" class="list-group-item" >'.$item.'</a><br>';
}
?>

</div>
</body>
</html>
