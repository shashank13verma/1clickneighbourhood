<div id="addflat">
				<fieldset  class="addfieldset">
					
					<legend><?PHP echo FLAT; ?></legend>
					
					<?php
					//print_r($arrData);die();
					echo "<b><br/>".ADD_FLAT."<br/></b>";
					echo "<br/>"
					?><div id="flatpage">
<form name=form1 id="form1">
<select name="block" id="block" onchange="fncAddTower()">
<option><?php echo SELECT_BLOCK; ?></option>
<?php foreach ($arrData as $value){?>
<option><?php echo $value?></option>
<?php }?>
</select>
<Select name="tower">
<option><?php echo SELECT_TOWER; ?></option>
</Select>
<select>
<option><?php echo SELECT_FLOOR; ?></option>
</select>
<input type="text"/> 
<input type="button" value="<?php echo ADD_FLAT; ?>" onclick="fncAddTower()"/>
</form>
</div>
</fieldset>
</div>
<div class="clr"></div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<script>
function fncAddTower()
{
	$block=document.getElementById('block').value;
	$.ajax({
		type:"POST",
		url:"<?php echo SITE_PATH?>index.php?controller=admin&function=fncSelectTower",
		data:'block='+$block,
		success: function(response){
			window.location.href="<?php echo SITE_PATH?>index.php?controller=admin&function=fncSelectFlat";
		}
	

	});
			
}
</script>