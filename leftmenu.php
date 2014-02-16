
<script type="text/javascript">
var menuids=["suckertree1"] //Enter id(s) of SuckerTree UL menus, separated by commas

function buildsubmenus(){
for (var i=0; i<menuids.length; i++){
  var ultags=document.getElementById(menuids[i]).getElementsByTagName("ul")
    for (var t=0; t<ultags.length; t++){
    ultags[t].parentNode.getElementsByTagName("a")[0].className="subfolderstyle"
		if (ultags[t].parentNode.parentNode.id==menuids[i]) //if this is a first level submenu
			ultags[t].style.left=ultags[t].parentNode.offsetWidth+"px" //dynamically position first level submenus to be width of main menu item
		else //else if this is a sub level submenu (ul)
		  ultags[t].style.left=ultags[t-1].getElementsByTagName("a")[0].offsetWidth+"px" //position menu to the right of menu item that activated it
    ultags[t].parentNode.onmouseover=function(){
    this.getElementsByTagName("ul")[0].style.display="block"
    }
    ultags[t].parentNode.onmouseout=function(){
    this.getElementsByTagName("ul")[0].style.display="none"
    }
    }
		for (var t=ultags.length-1; t>-1; t--){ //loop through all sub menus again, and use "display:none" to hide menus (to prevent possible page scrollbars
		ultags[t].style.visibility="visible"
		ultags[t].style.display="none"
		}
  }
}

if (window.addEventListener)
window.addEventListener("load", buildsubmenus, false)
else if (window.attachEvent)
window.attachEvent("onload", buildsubmenus)
</script>
<?
function createMenu($parId){
	$q="select 
		c.cat_id,
		c.parent_id,
		cd.cat_name
	from
		".CATEGORY." c,
		".CATEGORY_DESCRIPTION." cd
	where
		(c.cat_id=cd.cat_id)
	and
		(c.parent_id='$parId')";
	$r=execute($q);
	while($row_cat=mysql_fetch_array($r)){
		$q_s="select c.cat_id, cd.cat_name from ".CATEGORY." c, ".CATEGORY_DESCRIPTION." cd where (c.cat_id=cd.cat_id) and c.parent_id='$row_cat[cat_id]'";
		$r_s=execute($q_s);
		$noRows=mysql_num_rows($r_s);
		if($noRows > 0){?>
			<li><a href="products.php?bingo=<?php echo $row_cat['cat_id'];?>" class='WhiteNormal'><?php echo $row_cat['cat_name'];?></a>
                <ul>
                	<li ><?php createMenu($row_cat['cat_id']);?></li>
                </ul>
            </li>
		<?php }else{?>
        	<li><a href="products.php?bingo=<?php echo $row_cat['cat_id'];?>" class='WhiteNormal'><?php echo $row_cat['cat_name'];?></a></li><?php 
		}
	}//end while
}?>

<table cellspacing="0" cellpadding="0" border="0" align="center" width="181">
    <!--LEFT MENU!-->
    <tr><td align="left" valign="middle"><img src="images/img-004.png" width="181" height="36" border="0" name="img-004" id="img-004" alt="Categories" title="Categories" align="top" /></td></tr>
    <tr>
        <td align="center" valign="middle" width="181">
            <table cellspacing="0" cellpadding="0" border="0" align="center" width="181" bgcolor="#67a4c2">
                <tr>
                    <td align="left" valign="middle" width="181">
                    	<div class="suckerdiv">
                        <ul id="suckertree1">
                        <?php			 
                            createMenu(0);
                        ?>
                        </ul>
                        </div>
                        <!--<table cellspacing="0" cellpadding="0" border="0" align="center" width="175">
                            <tr><td align="left" valign="middle" class="text_12_black under_line td_height47"><img src="images/img-005.gif" width="40" height="12" align="absmiddle" border="0" alt="arrow" name="img-005" />&nbsp;&nbsp;Category 1</td></tr>
                            <tr><td align="left" valign="middle" class="text_12_black under_line td_height47"><img src="images/img-005.gif" width="40" height="12" align="absmiddle" border="0" alt="arrow" name="img-005" />&nbsp;&nbsp;Category 2</td></tr>
                            <tr><td align="left" valign="middle" class="text_12_black under_line td_height47"><img src="images/img-005.gif" width="40" height="12" align="absmiddle" border="0" alt="arrow" name="img-005" />&nbsp;&nbsp;Category 3</td></tr>
                            <tr><td align="left" valign="middle" class="text_12_black under_line td_height47"><img src="images/img-005.gif" width="40" height="12" align="absmiddle" border="0" alt="arrow" name="img-005" />&nbsp;&nbsp;Category 4</td></tr>
                            <tr><td align="left" valign="middle" class="text_12_black under_line td_height47"><img src="images/img-005.gif" width="40" height="12" align="absmiddle" border="0" alt="arrow" name="img-005" />&nbsp;&nbsp;Category 5</td></tr>
                            <tr><td align="left" valign="middle" class="text_12_black under_line td_height47"><img src="images/img-005.gif" width="40" height="12" align="absmiddle" border="0" alt="arrow" name="img-005" />&nbsp;&nbsp;Category 6</td></tr>
                            <tr><td align="left" valign="middle" class="text_12_black under_line td_height47"><img src="images/img-005.gif" width="40" height="12" align="absmiddle" border="0" alt="arrow" name="img-005" />&nbsp;&nbsp;Category 7</td></tr>
                        </table>-->
                    </td>
                </tr>
                <tr><td align="center" valign="middle" class="td_height27"></td></tr>
                <tr><td align="center" valign="middle" class="td_height_15"></td></tr>
            </table>
        </td>
    </tr>
</table>