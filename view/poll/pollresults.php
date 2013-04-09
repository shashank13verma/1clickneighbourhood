				<form id="pollresults">
				<fieldset class="addfieldset">
					
					<legend><?PHP echo POLLS; ?></legend>
					
					<?php
					//print_r($arrData);die();
					echo "<b><br/>".NO_OF_VOTES."<br/></b>";
					?>
					
					
<?php
$counter=0;
$answertally[1] = 0;
$answertally[2] = 0;
$answertally[3] = 0;
$answertally[4] = 0;
$answertotal=0;

if(isset($arrData) && !empty($arrData)){
	foreach($arrData as $row){
		switch($row["answer"])
		{
			case $row["answer1"]:
			 $answertally[1]++;
			 break;

		case $row["answer2"]:
			 $answertally[2]++;
			 break;

		case $row["answer3"]:
			 $answertally[3]++;
			 break;

		case $row["answer4"]:
			 $answertally[4]++;
			 break;
		}
	}
}

for($i = 1; $i<=sizeof($answertally); $i++){
	$answertotal += $answertally[$i];
}

foreach($arrData as $row){
	if($counter<=1){
		if($row){
			for($i=1; $i<=4; $i++){
				if($row["answer$i"] != ''){
	 				echo $row["answer$i"]."[" . $answertally[$i] ."]". "<br/>"; 
				$counter++;	
				}
			}
		}
	}
}
echo "<b>".TOTAL_NO_OF_VOTES ." </b>".$answertotal."<br/><hr>";
echo "<b>".COMMENTS."</b>";
?>
<div class="">
	<?php 
	echo "<br/>";
	foreach($arrData as $row){
	
		if($row["comments"] != ''){
			echo $row['first_name']." ->  ".$row['comments']."<br/>";
		}
	}
		
		
	?>
</div>
</fieldset>
					</form>
					
<div class="clr"></div>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>