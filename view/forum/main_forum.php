<table  id="forumTable">
<tr>
<td class="forumTd"><strong><?php echo TOPIC; ?></strong></td>
<td class="forumTd"><strong><?php echo DETAILS; ?></strong></td>
<td class="forumTd"><strong><?php echo POSTED_BY; ?></strong></td>

<td class="forumTd"><strong><?php echo DATE_OF_POST; ?></strong></td>
</tr>
<?php
 //print_r($arrData);die();
// Start looping table row
if(isset($arrData) && (!empty($arrData))){
    foreach($arrData as $value){?>

<tr>
<td class="forumdesc"><?php if(isset($value['topic'])){echo $value['topic'];} ?></td>
<td class="forumdesc"><a href="<?php echo SITE_PATH?>index.php?controller=forum&function=fncViewTopic&id=<?php echo base64_encode($value['id']) ?>"><?php if(isset($value['detail'])){echo $value['detail'];} ?></a><BR></td>
<td class="forumdesc"><?php if(isset($value['email_address'])){echo $value['email_address'];}?></td>

<td class="forumdesc"><?php if(isset($value['datetime']))echo $value['datetime']; }}?></td>
</tr>
<tr>
<td colspan="5" align="right" bgcolor="#E6E6E6"><a href="<?php echo SITE_PATH?>index.php?controller=forum&function=fncCreateTopic"><strong><?php echo CREATE_NEW_TOPIC; ?></strong> </a></td>
</tr>

</table>
	<div class="clr"></div>
	<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>