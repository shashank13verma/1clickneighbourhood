				<form id="addform">
				<fieldset class="addfieldset">
				<?php 	//print_r($arrData);die();?>
					<legend><?PHP echo POLLS; ?></legend>
					<div id="pollpage">
						<form action="" method="POST" id="addform">

					<?php if(isset($arrData)&& !empty($arrData)){	 
						foreach($arrData as $value){
					?>
					<input type="hidden" name="passid" id="passid" value="<?php echo $value['id'];?>"/>
					<table>
						<tr>
		<td bgcolor="#FFEFCE" style="padding-left:10">
		<?php
		echo $value['topic']."<br/>";
		for($i = 1; $i <= 4; $i++)
		{
			if($value["answer".$i ]!=""){
		?>
		<input type="radio" name="answer1" value="<?php echo $value["answer$i"];?>"/>
		<?php echo $value["answer".$i]; ?>
		<br/>
		<?php
		}}}}
		?>
		</td>
		</tr>
		</table>
		<br>
		<label><?php echo COMMENTS; ?></label>
		<br/>
		<textarea style="width:250px; height:80px;" rows=10 cols="42" id="txtComment" name="txtComment"></textarea>
		<br/>
		<input type="button" value="Vote Now" onclick="add()">
</form>
</div>
				</fieldset>
</form>
<div class="clr"></div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<script>
function add(){
	
	$v1=document.getElementById('passid').value;
	//alert($v1);
	$.ajax({
		type: "POST",
		url: '<?php echo SITE_PATH?>index.php?controller=poll&function=fncCalculateResults',
		data: $('#addform').serialize(),
		success: function(response){
			if(response)
			{
				window.location.href="<?php echo SITE_PATH?>index.php?controller=poll&function=fncFinalDisplayResults&pollid="+$v1;		
			}
		}
	});
}
</script>