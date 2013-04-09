<div class="addfieldset">
<h3 align="center"><?php echo POST_ANS_HERE; ?></h3>
<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">

<form name="form1" id="form1" method="post">
<td>
<?php

	if(isset($arrData) && (!empty($arrData))){
		foreach($arrData as $value){?>
		
<input type="hidden" value=<?php echo $value['question_id'];?> name="ques_id" id="ques_id" /> <?php }}?>

<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td width="18%"><strong><?php echo NAME; ?></strong></td>
<td width="3%">:</td>
<td width="79%"><input name="a_name" type="text" id="a_name" size="45"></td>
</tr>

<tr>
<td valign="top"><strong><?php echo ANSWER; ?></strong></td>
<td valign="top">:</td>
<td><textarea name="a_answer" cols="45" rows="3" id="a_answer"></textarea></td>
</tr>
<tr>
<td></td><td></td>
<td><input type="button" name="Submit" value="Submit" onclick ="Answer()"/><input type="reset" name="Submit2" value="Reset"></td>


</tr>
</table>
<div class="clr"></div>
</td>
</form>

</table>
<div class="clr"></div>
<br/>
<?php
 
	if(isset($arrData) && (!empty($arrData))){
		foreach($arrData as $value){?>


<table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<input type="hidden" value=<?php echo $value['a_id'];?>/>

<td width="18%" bgcolor="#F8F7F1"><strong><?php echo NAME; ?></strong></td>
<td width="5%" bgcolor="#F8F7F1">:</td>
<td width="77%" bgcolor="#F8F7F1"><?php echo $value['a_name'];?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong><?php echo EMAIL; ?></strong></td>
<td bgcolor="#F8F7F1">:</td>

<td bgcolor="#F8F7F1"><?php echo $value['email_address'];?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong><?php echo ANSWER; ?></strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><?php echo $value['a_answer'];?></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong><?php echo DATE_TIME; ?></strong></td>
<td bgcolor="#F8F7F1">:</td>
<td bgcolor="#F8F7F1"><?php echo $value['a_datetime'];?></td>

</tr>
</table></td>
<div class="clr"></div>
</tr>
</table><br>
<div class="clr"></div>
</div>
<div class="clr"></div>
<div class="clr"></div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<?php }}?>
<script type="text/javascript">
function Answer(){
	if(!(document.getElementById('a_answer').value)=="" || !(document.getElementById('a_answer').value)== 'NULL')
	{
	//alert("here")
	$.ajax({	
		type:"POST",
		url:"<?php echo SITE_PATH;?>index.php?controller=forum&function=fncPostAnswer",
		data:$('#form1').serialize(),
		success:function(response){
			//alert(response);
			window.location.href="<?php echo SITE_PATH?>index.php?controller=forum&function=fncPostAnswer";
 		}
 	});
}
}
</script>