
<html>
<body>
    
    <div class="main">
		
	<div class="addfieldset">
	    <fieldset>
					
	    <legend>View</legend>
                <form method="post" name=form1 id="form1">
		    <table>
			<tr>
			    <td>Block</td><td>Tower</td><td>Flat</td>
			</tr>
			<tr>
			    <td>
				<select name="block" id="block" onChange="fncviewTower(this.value)">
				    <option value="0">Select Block</option>
					<?php $nval= 0;
					foreach ($arrData as $value){?>
				    <option value="<?php echo ++$nval;?>"><?php echo $value?></option>
					<?php }?>
				</select>
			    </td>
			    
			    <td>
				<?php 
						$nTower = 0;
						if(isset($arrData['tower'])){
							$nTower = $arrData['tower'];
						} 
					?>
				<select name="tower" id="tower" onBlur="fncviewFlat(this.value)">
				    <option value="0"><?php if($nTower=="0") echo "No Value";?></option>
				</select>
			    </td>
			    <td><?php 
						$nFlat = 0;
						if(isset($arrData['flat'])){
							$nTower = $arrData['flat'];
						} 
					?>
				<select name="flat" id="flat">
				    <option value="0"> <?php if($nFlat==0) echo "No Value";?></option>
				</select>
			    </td>
			</tr>
		    </table>
                </form>
            </fieldset>
        </div>
    </div>
    
<script>
function fncviewTower(argValue) 
{
		$.ajax({ 
			type: "POST",
			url: 'index.php?controller=register&function=fncLoadTower',  
  			data: "blockId=" + argValue,
    		success: function(response){
    			$("#tower").html(response);
    		}
			});

}

function fncviewFlat(argValue) 
{
		$.ajax({ 
			type: "POST",
			url: 'index.php?controller=admin&function=fncLoadFlat',  
  			data: "towerId=" + argValue,
    		success: function(response){
    			$("#flat").html(response);
    		}
			});

}
/*function fncviewTower(argValue)
{
    
		$.ajax({ 
			type:"POST",
			url:'index.php?controller=register&function=fncLoadTower',  
			data: "blockId=" + argValue,
			success: function(response){
				
			$("#tower").html(response);
			}
		});
}*/
</script>