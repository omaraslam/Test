<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body {
margin: 0;
font-size:16px;
color: #000000;
font-family:Arial, Helvetica, sans-serif;
}
#sliderWrap {
margin: 0 auto;
width: 300px;
}
#slider {
position: absolute;
background-image:url(slider.png);
background-repeat:no-repeat;
background-position: bottom;
width: 300px;
height: 159px;
margin-top: -141px;
}
#slider img {
border: 0;
}
#sliderContent {
margin: 50px 0 0 50px;
position: absolute;
text-align:center;
background-color:#FFFFCC;
color:#333333;
font-weight:bold;
padding: 10px;
}
#header {
margin: 0 auto;
width: 600px;
background-color: #F0F0F0;
height: 200px;
padding: 10px;
}
#openCloseWrap {
position:absolute;
margin: 143px 0 0 120px;
font-size:12px;
font-weight:bold;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
    $(".topMenuAction").click( function() {
        if ($("#openCloseIdentifier").is(":hidden")) {
            $("#slider").animate({ 
                marginTop: "-141px"
                }, 500 );
            $("#topMenuImage").html(’<img src="open.png"/>’);
            $("#openCloseIdentifier").show();
        } else {
            $("#slider").animate({ 
                marginTop: "0px"
                }, 500 );
            $("#topMenuImage").html(’<img src="close.png"/>’);
            $("#openCloseIdentifier").hide();
        }
    });  
});
</script>
</head>

<body>
	<div id="sliderWrap">
    <div id="openCloseIdentifier"></div>
    <div id="slider">
        <div id="sliderContent">
            Isn’t this nice?
        </div>
        <div id="openCloseWrap">
            <a href="#" class="topMenuAction" id="topMenuImage"><img src="open.png" alt="open" /></a>
        </div>
    </div>
</div>
</body>
</html>
