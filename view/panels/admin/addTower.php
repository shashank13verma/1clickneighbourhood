<div class="addfieldset">
				<fieldset>
					
					<legend><?PHP echo TOWER; ?></legend>
					
					<?php
					//print_r($arrData);die();
					echo "<b><br/>".ADD_TOWER."<br/></b>";
					echo "<br/>"
					?><div id="towerpage">
<form method="post" name=form1 id="form1">
<select name="block">
<option><?php echo SELECT_BLOCK; ?></option>
<?php foreach ($arrData as $value){?>
<option><?php echo $value; ?></option>
<?php }?>
</select>
<input type="text" name="tower"/> 
<input type="button" value="Add Block" onclick="fncAddTower()"/>
</div>
				</fieldset>
				</form>
				</div>
				
				<div class="clr"></div>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<script>
function fncAddTower()
{
	$.ajax({
		type:"POST",
		url:"<?php echo SITE_PATH?>index.php?controller=admin&function=fncAddFlat",
		data:$('#form1').serialize(),
		success: function(response){
			window.location.href="<?php echo SITE_PATH?>index.php?controller=admin&function=adminPanelController";			
		}
	

	});
			
}
</script>