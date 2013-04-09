			<div class="addfieldset">
				<fieldset>
					
					<legend><?PHP echo COMPLAINT; ?></legend>
					
					<?php
					//print_r($arrData);die();
					echo "<b><br/>".ADD_COMPLAINT."<br/></b>";
					echo "<br/>"
					?><div id="complaintpage">
						<form method="post">
						<table id="addComplaint">
							<tr><td><?php echo DESCRIPTION;?></td><td><input type="text" id="description" name="description"/></td></tr>
							<input type="button" value="Add Complain" onclick="fncDescription()"/>
						</table>
						</form>
					</div>


</fieldset>
</div>
<div class="clr"></div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<script>
function fncDescription(){
	if(!(document.getElementById('description').value)=="" || !(document.getElementById('description').value)== 'NULL')
	{
	$description=document.getElementById('description').value;
	$.ajax({
		type:"POST",
		url:"<?php echo SITE_PATH?>index.php?controller=user&function=fncAddComplaint",
		data:"description="+$description,
		success: function(response){
			window.location.href="<?php echo SITE_PATH?>index.php?controller=user&function=fncUserProfile";
		}
	

	});
	}
	else alert("No details Entered");
}
</script>