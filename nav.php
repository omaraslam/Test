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
<?php
function createMenu($parId){
	$q="select 
		c.cat_id,
		c.parent_id,
		cd.cat_name
	from
		".PREFIX."categories c,
		".PREFIX."categories_description cd
	where
		(c.cat_id=cd.cat_id)
	and
		(c.parent_id='$parId')";
	$r=execute($q);
	while($row_cat=mysql_fetch_array($r)){
		$q_s="select c.cat_id, cd.cat_name from ".PREFIX."categories c, ".PREFIX."categories_description cd where (c.cat_id=cd.cat_id) and c.parent_id='$row_cat[cat_id]'";
		$r_s=execute($q_s);
		$noRows=mysql_num_rows($r_s);
		if($noRows > 0){?>
			<li><a href="products.php?cat_id=<?php echo $row_cat['cat_id'];?>" class='WhiteNormal'><?php echo $row_cat['cat_name'];?></a>
                <ul>
                	<li><?php createMenu($row_cat['cat_id']);?></li>
                </ul>
            </li>
		<?php }else{?>
        	<li><a href="products.php?cat_id=<?php echo $row_cat['cat_id'];?>" class='WhiteNormal'><?php echo $row_cat['cat_name'];?></a></li><?php 
		}
	}//end while
}?>
<tr><td align="left" class="bgimg_left_001 Heading_01">Categories</td></tr>
<tr>
    <td align="left" valign="top" bgcolor="#000000" class="pad">
        <table cellspacing="0" cellpadding="0" border="0" align="left" width="140">
            <tr><td align="left" valign="top">
            	<div class="suckerdiv">
            	<ul id="suckertree1">
				<?php			 
					createMenu(0);
				?>
                </ul>
                </div>
			</td>
			</tr>
		</table>
	</td>
</tr>
<tr><td>&nbsp;</td></tr>