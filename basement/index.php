<html>
<head>
<script type="text/javascript">    
var iframeids=["pframe1","pframe2"];
 
//判断浏览器是否支持iframe,yes支持,no则不支持
 
var iframehide="yes";

 function SetCwinHeight(iframeid){
  var iframeid=document.getElementById(iframeid); //iframe id
  if (document.getElementById){
   if (iframeid && !window.opera){
    if (iframeid.contentDocument && iframeid.contentDocument.body.offsetHeight){
     iframeid.height = iframeid.contentDocument.body.offsetHeight + 20;
    }else if(iframeid.Document && iframeid.Document.body.scrollHeight){
     iframeid.height = iframeid.Document.body.scrollHeight + 20;
    }
   }
  }
 } 
 
 
function dyniframesize()
 
{
 
    var dyniframe=new Array();
 
     
 
    for(var i=0;i<iframeids.length;i++)
 
    {
 
        if(document.getElementById)
 
        {
 
            //自动调整iframe高度
 
            dyniframe[dyniframe.length]=document.getElementById(iframeids[i]);
 
            if(dyniframe[i] && !window.opera)
 
            {
 
                dyniframe[i].style.display="block";
 
                if(dyniframe[i].contentDocument && dyniframe[i].contentDocument.body.offsetHeight) //如果用户的浏览器是NetScape
 
                    dyniframe[i].height=dyniframe[i].contentDocument.body.offsetHeight;
 
                else if(dyniframe[i].Document && dyniframe[i].Document.body.scrollHeight)  //如果用户的浏览器是IE
 
                    dyniframe[i].height=dyniframe[i].Document.body.scrollHeight;
 
            }
 
        }
 
        //根据设定的参数来处理不支持iframe的浏览器的显示问题 
 
        if((document.all || document.getElementById) && iframehide=="no")
 
        {
 
            var tempobj=document.all? document.all[iframeids[i]] : document.getElementById(iframeids[i]);
 
            tempobj.style.display="block" ;
 
        }
var iframe=document.getElementById(iframeids[i]);
//var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
//if (iframeWin.document.body) {
//iframe.height = iframeWin.document.documentElement.scrollHeight || iframeWin.document.body.scrollHeight; 
//iframe.height +=1;
SetCwinHeight(iframeids[i]);
   }

 
}
 
 
 
if (window.addEventListener)
 
window.addEventListener("load", dyniframesize, false)
 
else if (window.attachEvent)
 
window.attachEvent("onload", dyniframesize)
 
else
 
window.onload=dyniframesize  
 </script>   
<title>信息科学与技术学院地下室预约登记系统</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!--meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"-->
<link rel="stylesheet" href="includes/style.css" type="text/css" >
</head>
<body>
<div class="container transparent">
<?php
echo '<div class="row">';
echo '<iframe name="pframe1" class="col-xs-12" id="pframe1"  width="100%" frameBorder="0"  onload="dyniframesize()" src="availability.php"></iframe>';
echo '</div>';
echo '<hr>';
//include_once("availability.php");
//include_once("register.html");
 echo '<div class="row">';
echo '<iframe name="pframe2" class="col-xs-12" id="pframe2" width="100%" frameBorder="0" onload="dyniframesize()" src="register.html"></iframe>';
echo '</div>';
?>
</div>
</body>
</html>
