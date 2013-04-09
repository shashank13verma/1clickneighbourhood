<div class="addfieldset">
				<fieldset>
					
					<legend><?PHP ECHO NOTICE ?></legend>
					
					<?php
					//print_r($arrData);die();
					echo "<b><br/>Add Notice<br/></b>";
					echo "<br/>"
					?><div id="noticepage">
						<form method="post">
						<table id="addnotice">
							<tr><td><?php ECHO DESCRIPTION;?></td><td><input type="text" id="description" name="description"/></td></tr>
							<input type="button" value="Add Notice" onclick="fncNotice()"/>
						</table>
						</form>
						
					</div>
</fieldset>
</div>
<div class="clr"></div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

<script>
function fncNotice(){
	if(!(document.getElementById('description').value)=="" || !(document.getElementById('description').value)== 'NULL')
	{
	$description=document.getElementById('description').value;
	$.ajax({
		type:"POST",
		url:"<?php echo SITE_PATH?>index.php?controller=admin&function=fncAddNotice",
		data:"description="+$description,
		success: function(response){
			window.location.href="<?php echo SITE_PATH?>index.php?controller=admin&function=adminPanelController";		
		}
	

	});
	}
	else alert("No details Entered");
}
</script>