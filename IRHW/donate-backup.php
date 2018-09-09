<?php

require_once("main.php");
require_once("process.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no"/>
<title>楠梓大使命教會</title>
<link href="images/logo-icon.png" rel="SHORTCUT ICON">
<link href="css/main.css" rel="stylesheet" type="text/css" media="screen" />
<link href="css/flexslider.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script defer src="js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/main2.js"></script>
<script>
$(document).ready(function() {
if(navigator.userAgent.match(/Android|iPhone|iPad/i)) {
       $("#bg").css("height",window.screen.availHeight);
}

$('.flexslider').flexslider({
        animation: "slide",
        controlNav: false, //關閉導航
		directionNav: false,
		slideshowSpeed: 4000,
        itemMargin: 0,
		
        start: function(slider){
          $('body').removeClass('loading');
        }
});

	 $("#com .pic").click(function(){
		$.ajax({
           url: 'project_content.php',
           cache: false,
           dataType: 'html',
           type:'POST',
           data: {id:$(this).attr("id")},
           error: function(xhr) {
                 alert('發生錯誤!請找車車');
           },
           success: function(r) {
			       $.alertframe(r);
		   }
		   
        }); //ajax
	 });

});
 
   $.transimg=function(p,t){
       $(".main-pic").attr("src",p);
	   $("img.p-img").attr("id","");
	   $(t).attr("id","imgactive");
   };

	$.alertframe=function(content){
		 $('body').prepend("<div id='bg' style='background:rgba(0,0,0, 0.3);position:fixed;width:100%;height:100%;z-index:10;opacity:0;' onclick='$.closeframe(),event.cancelBubble=true;'><div id='project-frame' onclick='event.cancelBubble=true'>"+content+"</div></div>");		 
		 setTimeout(function(){
			//$('body').css({"margin-right":window.innerWidth-$('body').width(),"overflow":"hidden"});
		    $('div#bg').css({"transition":"opacity .3s","opacity":1});
		    $('div#project-frame').css({"transition":"opacity .3s","opacity":1});
		    $('div#project-frame').animate({"margin-top":"-250px"},300);
		 });
	};
   $.closeframe=function(){
		$('div#bg').css({"transition":"opacity .3s","opacity":0});		
		$('div#project-frame').animate({"margin-top":"-265px"},300,'swing',function(){
			//$('body').css({"margin-right":"","overflow":""});
			$('div#project-frame').css({"transition":"opacity .3s","opacity":0});
			$("div#bg").remove();			
		});	   
   };
   
   $.hover=function(t){
	   $(".b2-pic",t).css({"border-left":"1px solid #eda56b","border-top":"1px solid #eda56b","border-bottom":"1px solid #eda56b"});
	   $(".b2-title",t).css({"border-right":"1px solid #eda56b","border-top":"1px solid #eda56b","border-bottom":"1px solid #eda56b"});
   }

</script>

<style>
body{
	margin:0;
	/*background:#2b2b2b;
	*/
    background:url(images/bg10.jpg) no-repeat;
	background-size:cover;
	background-position:center;
	background-attachment: fixed;
	
}
.banner-frame{
	position:absolute;
	z-index:1;
	left:50%;
	margin-left:-500px;
}

.logo-frame{
	width:1000px;
	background:rgba(255,255,255,0.8);
	border-bottom:1px solid #e8e8e8;
	margin:0 auto;
}
.social-icon{
	display:inline-block;
	float:right;
	margin:25px 45px 0px 0px;
}
.menu-frame{
	width:1000px;
	background:rgba(255,255,255,0);
	margin:0 auto;
	height:30px;
	text-align:right;
}
.menu-frame a{
	display:inline-block;
	color:#fff;
	width:120px;
	height:30px;
	line-height:30px;
	font-size:14px;
	padding-left:15px;
	border-left:3px solid transparent;
	transition:linear .1s;
	text-align:center;
}
.menu-frame a:hover{
	color:#eb7e31;
}

.main-table{
	width:1000px;
	box-shadow:0px 3px 10px -1px rgba(20%,20%,20%,0.7);
}

.tr3 h1{
	text-shadow: 2px 1px 3px #cccccc;
	color: #4A4542;
}

.tr3{
	background:#fff;
	padding:30px;
}
.tr3 .pic{
	display:inline-block;
	width:210px;	
	margin-left:28px;
	margin-bottom:40px;
	cursor:pointer;
}
.tr3 .pic img{
	box-shadow:3px 3px 8px -1px rgba(20%,20%,20%,0.7);
	opacity:0.8;
	transition:opacity linear .05s;
}
.tr3 .pic img:hover{
	opacity:1;
}
.tr4{
	background:#e8e8e8;
	padding:30px 30px 10px 30px;	
}
.tr4 img{
	margin-left:15px;
	margin-bottom:15px;
	transition: linear .1s;
}
.tr4 img:hover{
	opacity:0.8;
}
#volunteer{
	background:url(photo/home/volunteer.jpg) no-repeat;
	background-size:cover ;
	background-position:center;	
}
#character{
	background:url(photo/home/character.jpg) no-repeat;
	background-size:cover ;
	background-position:center;	
}
#read{
	background:url(photo/home/read.jpg) no-repeat;
	background-size:cover ;
	background-position:center;	
}
#care{
	background:url(photo/home/care.jpg) no-repeat;
	background-size:cover ;
	background-position:center;	
}
.main-title{
	background:rgba(255,255,255,0);
	text-align:center;
	margin-top:95px;
	color:#fff; /*6c94bd*/
	padding:3px;
}
.title{
	margin:5px 0px 0px 0px;	
}
#project-frame{
	width:1000px;
	height:500px;
	background:#fff;
	top:50%;
	left:50%;
	position:fixed;
	margin-top:-265px;
	margin-left:-500px;
	border-radius:6px;
	opacity:0;
	font-size:14px;
}
.p-title{
	font-size:20px;
	font-weight:bold;
}
.main-pic{
	box-shadow:3px 3px 8px -1px rgba(20%,20%,20%,0.7);
}
.p-img{
	cursor:pointer;
	display:inline-block;
	margin-right:12px;
	border-radius:1px;
	border:2px solid #aaa;
	transition:linear 0.2s;
}
.p-img:hover{
	border:2px solid #eb7d2f;
}
#imgactive{
	border:2px solid #eb7d2f;
}
.footer{
	background:rgba(0,0,0,0.6);
	color:#fff;
	padding:30px;
}
.footer .icon-btn a{
	margin-right:4px;
}
@media screen and (max-width: 835px) {
body{
    background:#fff;
}
#bg{
	width:100%;
	position:fixed;
	background:url(images/bg3.jpg) no-repeat;
	background-size:cover;
	background-position:top;
	height:100%;
	z-index:-1;
}
.flexslider{
	margin-top:50px;
}
#block1{
	padding-top:40px;
	background-color: white;
	box-shadow: 
	        5px 0 10px -5px transparent inset, /*右边阴影*/
			0 -5px 10px -5px transparent inset, /*底部阴影*/
			0 8px 18px -5px #111 inset, /*顶部阴影*/
			-5px 0 10px -5px transparent inset; /*左边阴影*/	
}
#block1 .pic{
	display:block;
	margin-bottom:30px;
	width:80%;
}
#block1 .pic img{
	box-shadow:0px 0px 10px 1px rgba(0%,0%,0%,0.4);
}
#block1 input[type="text"]{
	width: 100px;
	border-radius: 4px;
	border:1px solid black;
	padding: 3px;
}
#block1 input[type="submit"]{
	background:#4A4542; 
	color: #ffffff;
	padding: 5px 8px 5px 8px;
	border: 0px;
	font-size: 20px;
	font-weight: bold;
	margin-top: 10px;
	border-radius: 4px;
	width: 150px;
	height: 40px;
}
#block1 input[type="submit"]:hover{
	background:#A09690; 
	color: #ffffff;
}
#block1 .btn {
  font-family: "微軟正黑體";
  cursor: pointer;
}
#block1 .ct {
  transition: background-color 0.4s;
}
#block1 p span{font-size: 16px;}
#block1 td{font-size: 18px;}
.title1{width: 70%;}
.main-title{
	color:#fff; /*6c94bd*/
	padding:13px;
	margin-top:0px;
	font-size:20px;
	background:rgba(255,255,255,0.2);
}
#block2{
	background:#f0f2f5;
	padding-top:30px;
}
.b2-pic{
	border-left:1px solid #e8e8e8;
	border-top:1px solid #e8e8e8;
	border-bottom:1px solid #e8e8e8;
	transition:ease-out .1s;
}

.b2-title{
	border-right:1px solid #e8e8e8;
	border-top:1px solid #e8e8e8;
	border-bottom:1px solid #e8e8e8;
	background:rgba(255,255,255,1);
	font-size:18px;
	padding:0 10% 0 10%;
	transition:ease-out .1s;
}
#block3{
	padding-top:30px;
	padding-bottom:10px;
}
#block3 img{
	display:block;
	margin-bottom:20px;	
}
.footer{
		box-shadow: 
	        5px 0 10px -5px transparent inset, /*右边阴影*/
			0 -5px 10px -5px transparent inset, /*底部阴影*/
			0 8px 10px -5px #aaa inset, /*顶部阴影*/
			-5px 0 10px -5px transparent inset; /*左边阴影*/
	background:#e1e3e6;
	color:#5b8cb5;
	font-size:12px;
}
.info{
	font-size:14px;
	
}
.info tr{
	height:30px;	
}
.icon-btn{
	margin-top:10px;	
}
}
.donate td,tr{
	height: 40px;
	padding:0px 10px 0px 10px;
}
.donate input[type="submit"]{
	background:#4A4542; 
	color: #ffffff;
	padding: 10px 15px 10px 15px;
	border: 0px;
	font-size: 28px;
	font-weight: bold;
	margin-top: 10px;
	border-radius: 4px;
	width: 210px;
	height: 60px;
}
.donate input[type="submit"]:hover{
	background:#A09690; 
	color: #ffffff;
}
.donate{
	width: 800px;
	padding: 20px;
	margin: 0 auto;
	margin-bottom: 100px;
}
.donate p{text-align: center;}
.btn {
  font-family: "微軟正黑體";
  cursor: pointer;
}
.ct {transition: background-color 0.4s;}
.title1{
	background-color: #4A4542;
	color: white;
	padding-top: 5px;
	padding-bottom: 5px;
	border-radius: 5px;
	text-align: center;
}
.donate p span{font-size: 16px;}
.tr3 table{
	border-collapse: collapse;
	width:500px;
	margin: 0 auto;
}
.tr3 input[type="text"]{
	width: 200px;
	border-radius: 4px;
	border:1px solid black;
	padding: 3px;
}
</style>
</head>

<body>
<div id="com">
<div class="banner-frame">
<div class="menu-frame"><a href="donate.php">我要奉獻</a><a href="">教會</a><a href="">新聞</a><a href="">活動專區</a><a href="">我是新朋友</a><a href="praywall">禱告牆</a></div>
<div class="logo-frame">
 <a href="index.php"><img src="images/logo-main-black.png" width="400" /></a>
 <div class="social-icon">
  <a href="https://www.facebook.com/NZGCC/?fref=ts" target="_blank"><img src="images/icon/icon-fb-line.png" width="62" /></a>
  <a href="https://www.instagram.com/nzgcc/" target="_blank"><img src="images/icon/icon-insta-line.png" width="62" /></a>
 </div>
</div>

</div>

<table class="main-table" align="center" cellpadding="0" cellspacing="0" border="0">

<tr>
<td>
<div class="flexslider">
  <ul class="slides">
    <li><a href="#"><img src="photo/banner/test5.JPG" width="1000" height="400" /></a></li>
    <li><a href="#"><img src="photo/banner/test4.JPG" width="1000" height="400"/></a></li>
    <li><a href="#"><img src="photo/banner/test3.JPG" width="1000" height="400" /></a></li>
    <li><a href="#"><img src="photo/banner/test.JPG" width="1000" height="400"/></a></li>
    <li><a href="#"><img src="photo/banner/test2.JPG" width="1000" height="400" /></a></li>
    
  </ul>
</div>
</td>
</tr>

<td class="tr3">
  <div class="donate">
    <form method="post" action="https://acq.esunbank.com.tw/ACQTrans/esuncard/txnf014s" id="form1"> 
    <div class="title1">線上信用卡奉獻</div>
     	<p><br/>
	    	<table>
	    		<tr><td align="right">我要奉獻：</td><td>新台幣 <input type="text" id="TA" required/>&nbsp;元整</td></tr>
	    		<tr><td align="right">奉獻人姓名：</td><td><input type="text" id="dname"/></td></tr>
	    		<tr><td align="right">聯絡電話：</td><td><input type="text" id="phone"/></td></tr>
	    	</table><br/>
	    </p>     
	    <p><input type="submit" value="下一步" class="btn ct" onclick="dd();"><br/><span>(玉山銀行線上信用卡付費)</span></p>	  
    </form>
  </div>
</td>
</tr>
<tr>
<td class="tr4" align="center">
<a href="http://www.goodnews.org.tw/" target="_blank"><img src="images/link/1.jpg" width="204" height="94" /></a>
<a href="http://www.kmmc.tw/" target="_blank"><img src="images/link/2.JPG" width="204" height="94" /></a>
<a href="http://www.goodtv.tv/" target="_blank"><img src="images/link/3.jpg" width="204" height="94" /></a>
<a href="http://krtnews.tw/" target="_blank"><img src="images/link/4.jpg" width="204" height="94" /></a>
<a href="http://www.cosmiccare.org/" target="_blank"><img src="images/link/5.jpg" width="204" height="94" /></a>
<a href="https://www.breadoflife.taipei/" target="_blank"><img src="images/link/6.jpg" width="204" height="94" /></a>
<a href="http://www.prayer.org.tw/" target="_blank"><img src="images/link/7.JPG" width="204" height="94" /></a>
</td>
</tr>
<tr>
<td class="footer" align="center">
  <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
  <tr valign="top">
  <td style="font-size:14px;">Copyright © 2016 楠梓大使命教會  All rights reserved</td>
  <td><img src="images/icon/home_white.png" width="23" /></td><td>高雄市楠梓區海專路169號</td>
  </tr>
  <tr>
  <td rowspan="4" class="icon-btn"><a href="https://www.facebook.com/NZGCC/?fref=ts" target="_blank"><img src="images/icon/fb-icon.png" width="30" /></a> <a href="https://www.instagram.com/nzgcc/" target="_blank"><img src="images/icon/ins-icon.png" width="30" /></a> <a href="https://plus.google.com/u/0/114022699123875703179" target="_blank"><img src="images/icon/gplus-icon.PNG" width="30" /></a></td>
  </tr>
  <tr>
    <td><img src="images/icon/phone_white.png" width="23" /></td><td>07-3643075</td>
  </tr>
  <tr>
    <td><img src="images/icon/email_white.png" width="23" /></td><td>e120601295@gmail.com</td>
  </tr>
  </table>
</td>
</tr>
</table>
</div>


<div id="pho">
<div id="bg"></div><!--bg-->

<div id="top-banner" align="center">
<img id="menu_btn" src="images/icon/menu-icon.png" width="30" onclick="event.cancelBubble=true"/>
楠梓大使命教會
</div>

<div id="menu_p">
<div class="menu_banner" align="center" >
<img id="back_btn" src="images/icon/back.png" width="30"/>
<span onclick="javascript:location.href='https://www.nzgcc.com'"><img src="images/banner_logo.png" width="50" align="absmiddle"/> 楠梓大使命教會</span>
</div>
<div id="menu_p_list">
<a href="#">教會</a>
<a href="#">新聞</a>
<a href="#">活動專區</a>
<a href="praywall.php">禱告牆</a>
<a href="#">我是新朋友</a>
<a href="donate.php" style="color:white;background:#FFA500;">我要奉獻</a>
<a href="#">找到我們</a>
</div>
</div>

<div class="flexslider">
  <ul class="slides">
    <li><a href="#"><img src="photo/banner/test5.JPG" width="100%" /></a></li>
    <li><a href="#"><img src="photo/banner/test4.JPG" width="100%" /></a></li>
    <li><a href="#"><img src="photo/banner/test3.JPG" width="100%" /></a></li>
    <li><a href="#"><img src="photo/banner/test.JPG" width="100%" /></a></li>
    <li><a href="#"><img src="photo/banner/test2.JPG" width="100%" /></a></li>
    
  </ul>
</div>

<div id="block1" align="center">
    <form method="post" action="https://acq.esunbank.com.tw/ACQTrans/esuncard/txnf014m" id="form2">
   <div class="title1">線上信用卡奉獻</div>
     	<p><br/>
	    	<table>
	    		<tr><td align="right">我要奉獻：</td><td>新台幣 <input type="text" id="TA1" required/>&nbsp;元整</td></tr>
	    		<tr><td align="right">奉獻人姓名：</td><td><input type="text" id="dname1"/></td></tr>
	    		<tr><td align="right">聯絡電話：</td><td><input type="text" id="phone1"/></td></tr>
	    	</table><br/>
	    </p>     
	    <p><input type="submit" value="下一步" class="btn ct" onclick="dd1();"><br/><span>(玉山銀行線上信用卡付費)</span></p><br/>
    </form>
</div>

<div id="block3" align="center">
<a href="http://www.goodnews.org.tw/" target="_blank"><img src="images/link/1.jpg" width="204" height="94" /></a>
<a href="http://www.kmmc.tw/" target="_blank"><img src="images/link/2.JPG" width="204" height="94" /></a>
<a href="http://www.goodtv.tv/" target="_blank"><img src="images/link/3.jpg" width="204" height="94" /></a>
<a href="http://krtnews.tw/" target="_blank"><img src="images/link/4.jpg" width="204" height="94" /></a>
<a href="http://www.cosmiccare.org/" target="_blank"><img src="images/link/5.jpg" width="204" height="94" /></a>
<a href="https://www.breadoflife.taipei/" target="_blank"><img src="images/link/6.jpg" width="204" height="94" /></a>
<a href="http://www.prayer.org.tw/" target="_blank"><img src="images/link/7.JPG" width="204" height="94" /></a>
</div>

<div class="footer">
 <table width="80%" class="info" cellpadding="0" cellspacing="0" border="0">
 <tr><td><img src="images/icon/home_blue.png" width="23" /></td><td>高雄市楠梓區海專路169號</td></tr>
 <tr><td><img src="images/icon/phone_blue.png" width="23" /></td><td>07-3643075</td></tr>
 <tr><td><img src="images/icon/email_blue.png" width="23" /></td><td>e120601295@gmail.com</td></tr>
 </table>
 <hr />
 <img src="images/logo-main-footer.PNG" width="70%" />
 <div>Copyright © 2016 楠梓大使命教會  All rights reserved</div>
 <div class="icon-btn"><a href="https://www.facebook.com/NZGCC/?fref=ts" target="_blank"><img src="images/icon/fb-icon-blue.png" width="30" /></a> <a href="https://www.instagram.com/nzgcc/" target="_blank"><img src="images/icon/ins-icon-blue.png" width="30" /></a> <a href="https://plus.google.com/u/0/114022699123875703179" target="_blank"><img src="images/icon/gplus-icon-blue.png" width="30" /></a></div>
</div>
</div>
</body>
</html>