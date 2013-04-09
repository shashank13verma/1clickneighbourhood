<div id="addFlat">
				<fieldset  class="addfieldset">
					
					<legend><?PHP echo FLAT ?></legend>
					
					<?php
					//print_r($arrData);die();
					echo "<b><br/>".ADD_FLAT."<br/></b>";
					echo "<br/>"
					?><div id="flatpage">
<form method="post" name=form1 id="form1">
<?php foreach ($arrData as $key=>$value){
if($key==0){
	?>


<input type="button" name="block" id="block" value="<?php echo $value['block']?>"/>
<?php }}
?>

<select name="tower">
<option><?php echo SELECT_TOWER; ?></option>
<?php 
	if($key==1){
foreach ($value as $key=>$value){?>
<option><?php echo $value?></option>
<?php }}?>
</select>
<Select  name="floor" >
<option><?php echo SELECT_FLOOR; ?></option>
<option><?php echo ONE; ?></option> 
<option><?php echo TWO; ?></option> 
<option><?php echo THREE; ?></option> 
<option><?php echo FOUR; ?></option> 
<option><?php echo FIVE; ?></option> 
<option><?php echo SIX; ?></option> 
<option><?php echo SEVEN; ?></option> 
<option><?php echo EIGHT; ?></option> 
<option><?php echo NINE; ?></option>
<option><?php echo TEN; ?></option> 
<option><?php echo ELEVEN; ?></option> 
<option><?php echo TWELVE; ?></option>
<option><?php echo THIRTEEN; ?></option> 
<option><?php echo FOURTEEN; ?></option> 
<option><?php echo FIFTEEN; ?></option>
<option><?php echo SIXTEEN; ?></option> 
<option><?php echo SEVENTEEN; ?></option> 
<option><?php echo EIGHTEEN; ?></option>
<option><?php echo NINETEEN; ?></option> 
<option><?php echo TWENTY; ?></option>
</Select>
<input type="text" name="flat"/> 
<input type="button" value="<?php echo ADD_FLAT; ?>" onclick="fncAddFlat()"/>
</form>
</div>
</fieldset>
</div>
<div class="clr"></div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<script>
function fncAddFlat()
{
	$block=document.getElementById('block').value;
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