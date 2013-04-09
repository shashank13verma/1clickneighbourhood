<div class="addfieldset">
<form id="forum" name="forum"> 
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form id="form1" name="form1" method="post" action="add_topic.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3" bgcolor="#E6E6E6"><strong><?php echo CREATE_NEW_TOPIC; ?></strong> </td>
</tr>
<tr>
<td width="14%"><strong><?php echo TOPIC; ?></strong></td>
<td width="2%">:</td>
<td width="84%"><input name="topic" type="text" id="topic" size="50" /></td>
</tr>
<tr>
<td valign="top"><strong><?php echo DETAILS; ?></strong></td>
<td valign="top">:</td>
<td><textarea name="detail" cols="50" rows="3" id="detail"></textarea></td>
</tr>
<tr>
<td><strong><?php echo NAME; ?></strong></td>
<td>:</td>
<td><input name="name" type="text" id="name" size="50" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="button" name="button" value="Submit" onclick="postForum()"/> <input type="reset" value="Reset" /></td>
</tr>
</table>
</td>

</tr>

</table>
</form>
</div>
<div class="clr"></div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<script type="text/javascript">
function postForum(){
	
	if(!(document.getElementById('topic').value)=="" || !(document.getElementById('topic').value)== 'NULL')
	{
	//$description=document.getElementById('description').value;
	$.ajax({
		
		type:"POST",
		url:"<?php echo SITE_PATH;?>index.php?controller=forum&function=fncPostForum",
		data:$('#forum').serialize(),
		success:function(response){
			window.location.href="<?php echo SITE_PATH?>index.php?controller=forum&function=fncviewForum";
 		}
 	});
	}
	else alert("Enter all the details");
}

</script>