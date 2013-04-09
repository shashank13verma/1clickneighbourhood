<form id="displaypolls">
				
				<fieldset class="addfieldset">
					
					<legend><?PHP echo POLLS; ?></legend>
					
					<?php
					//print_r($arrData);die();
					echo "<b><br/>".ALL_POLL."<br/></b>";
					?><div id="pollpage">
<?php 
	if(isset($arrData) && !empty($arrData)){
		foreach($arrData as $data){
?>
<div><a href="<?php echo SITE_PATH?>index.php?controller=poll&function=fncPollresults&pollid=<?php echo $data['id']?>"><?php echo "<br/>".$data['topic']; }}?></a></div>
</div>
</fieldset>
</form>
<div class="clr"></div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>