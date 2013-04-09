				<form id="postAdd" name="postAdd"> 
				<fieldset class="addfieldset">
					
					<legend><?php echo POST_ADD; ?></legend>
					<table>
					
					<tr><td><label><b><?php echo INTERESTED_IN; ?></b></label></td><td><select name="interestedin">
					<option value="tutor">Tutor</option>
					<option value="buy sell rent">Buy Sell Rent</option>
					<option value="event planner">Event Planner</option>
					<option value="travel planner">Travel Planner</option>
					<option value="investment">Investment</option>
					<option value="computer accesories">Computer Accesories</option>
					<option value="dietitian">Dietitian</option>
					<option value="kids corner">Kids Corner</option>
					<option value="doctors">Doctors</option>
					<option value="yoga">Yoga</option>
					<option value="others">Others</option>
					</select></td></tr>
					<tr><td><label><b><?php echo DESCRIPTION; ?></b></label></td><td><textarea rows=4 cols=50 name="description" id="description"></textarea></td></tr>
					<tr><td></td><td><input type="button" value="<?php echo POST_ADD; ?>" onclick="save()"/></td></tr>
					</table>
				</fieldset>
				</form>
				</div>
				<div class="sidebar">
					<div class="gadget">
						<h2 class="star">
							<span><?PHP echo ADVERTISEMENT; ?> </span>
							
						</h2>
						<div class="clr"></div>
						<ul class="sb_menu">
							<li ><MARQUEE BEHAVIOR=ALTERNATE id="postAddMsg"><?php echo POST_ADD_MSG; ?></MARQUEE></FONT></li>
						</ul>
					</div>
					
				</div>
				<div class="clr"></div>
</table>	

	<script type="text/javascript">
function save(){
	if(!(document.getElementById('description').value)=="" || !(document.getElementById('description').value)== 'NULL')
	{
	$description=document.getElementById('description').value;
	$.ajax({
		type:"POST",
		url:"<?php echo SITE_PATH;?>index.php?controller=advertisement&function=fncpostAdvertisement",
		data:$('#postAdd').serialize(),
		success:function(response){
			window.location.href="<?php echo SITE_PATH?>index.php?controller=advertisement&function=fncadvertisement";
 		}
 	});
	}
	else alert("No details Entered in Description");
}

</script>