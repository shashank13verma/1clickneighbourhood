	<h1></h1>
	<div id="addpoll">
		<form method="post" action="">
			<fieldset class="addfieldset">
				<h1 id="pollhead"><?php echo NEW_POLL; ?></h1>
				<table>
					<tr>
						<td><label id="ans"><?php echo POLL_QUESTION; ?></label></td>
						<td><input type="text" name="txtQues" id="txtQues"
							onkeyup="success()" /></td>
					</tr>
					<tr>
						<td><label  id="ans1"><?php echo ANS1; ?></label></td>
						<td><input type="text" name="txtAns1" id="txtAns1"
							onblur="success()" /></td>
					</tr>
					<tr>
						<td><label id="ans2"><?php echo ANS2; ?></label></td>
						<td><input type="text" name="txtAns2" id="txtAns2"
							onblur="success()" /></td>
					</tr>
					<tr>
						<td><label id="ans3"><?php echo ANS3; ?></label></td>
						<td><input type="text" name="txtAns3" id="txtAns3"
							onblur="success()" /></td>
					</tr>
					<tr>
						<td><label id="ans4"><?php echo ANS4; ?></label></td>
						<td><input type="text" name="txtAns4" id="txtAns4"
							onblur="success()" /></td>
					</tr>
					<tr>
						<td colspan="2"><input type="submit" value="Add poll"
							name="Submit" id="Submit"/></td>
					</tr>
				</table>
			</fieldset>
		</form>
		<div class="clr"></div>
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<script>
$(document).ready(function(){      

		$("#txtAns1").hide();
        $("#txtAns2").hide();
        $('#txtAns3').hide();
		$('#txtAns4').hide();
		$("#ans1").hide();
        $("#ans2").hide();
        $('#ans3').hide();
		$('#ans4').hide();
    
 });
	function success()
	{
		var v=$('#txtQues').val();
		var v1=$('#txtAns1').val();
		var v2=$('#txtAns2').val();
		var v3=$('#txtAns3').val();
		var v4=$('#txtAns4').val();

		if(v!=null && v!="")
		{
			$('#txtAns1').show();
			$('#ans1').show();
			
			if(v1!=null && v1!=""  && v1!=v )
			{
				$('#txtAns2').show();
				$('#ans2').show();

				if(v2!=null && v2!="" && v2!=v1  && v2!=v)
				{
					$('#txtAns3').show();	
					$('#ans3').show();	
					if(v3!=null && v3!="" && v3!=v2  && v3!=v1)
					{
						$('#txtAns4').show();
						$('#ans4').show();	
	
					}
				}
			}
		}	
					
			}
				
			
		
	
</script>