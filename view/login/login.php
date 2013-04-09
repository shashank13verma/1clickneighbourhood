<style type="text/css">
	#loadLoginImage{
		margin-top:-300px;
		margin-left:-70px;
		text-align:center;  
		width:700px;
		height:100px;
		
	}
	.log{
		color:green;
	}
	#loadLoginText{
	margin-top:60px;
	margin-left:300px;
	}
</style>
		<form name="formlogin" id="formlogin" method="POST" action="">
		<div id="loginbody">
			
			<div id="loginbody_head">
				<?php echo LOGIN;?>
			</div>
			
			<div id="loginbody_mid">
				
				<table>
				<tr>
				<td id="loginusername">
					<?php echo USERNAME ;?>
				</td> 
				<td>
					<div id="divEmail"></div>
					<input type="text" name="email" id="email" onblur="fncEmValidate()"/>
				</td>
				</tr>
				<tr>
					<td>
						<label id="loginpassword">
							<?php echo PASSWORD ;?>
						</label>
					</td>
					<td> 
						<div id="divPass"></div>
						<input type="password" name="password" id="password" onblur="fncPassValidate()"/>
					</td>
				</tr>
				<tr>
					<td colspan="2" >
						<input type="button" value="Login" name="loginsubmit" id="loginsubmit" onclick="checkLogin()"/>
					</td>
				</tr>
				</table>
				<div id="loadLoginImage">
		
		</div>
		<div id="loadLoginText">
			</div>
		</div>
	</div>
	<br/><br/><br/><br/><br/><br/><br/>
<script>
function checkLogin(){
		//alert("hey");
		 var v1 = $('#email').val();
		 var v2=$('#password').val();
		 if((v1==null || v1=='') || (v2==null || v2=='')){
		 }
		 else if(!((v1.match(/^([a-zA-Z0-9_\-]+)(\.[a-zA-Z0-9_\-]+)*@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/)) && (v2.match(/^[a-zA-Z0-9]+$/)))){	
				
		 }
		 else{
		 $("#loadLoginImage").html('<img src="images/ajax-load.gif" id="loginloadimage">').fadeIn(2000);
			 $.ajax({ 
					type: "POST",
					url: 'index.php?controller=login&function=checklogin',  
			  		data: $('#formlogin').serialize(),
			    	success: function(response){
			        	if(response=="1") {
			        		$("#loadLoginImage").fadeTo(200,1,function(){       
			        		     $("#loadLoginText").html('Logging in.....').addClass('log').fadeTo(900,1,function(){          
			        		    	 window.location.href="<?php echo SITE_PATH ?>index.php?controller=login&function=loadLogin";
				     			});  
			            	});
			        	}
						else{
								$("#loadLoginImage").html('<img src="images/ajax-load.gif" class="loadimg" >').delay(2000).fadeOut();  	
								window.setTimeout(function () {
								    $("#loadLoginText").html('No user Exist');
								}, 3000);
							
						   
						}
			        	  	}
			 });
		
		 }
				 
	}
</script>