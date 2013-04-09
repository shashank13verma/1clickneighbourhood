


    
<script>
$(document).ready(function () {
 var response = confirm("Are you sure to deactivate your Account");
 
 if(response)
 {
  var response1 = confirm("Are you sure to deactivate your Account, Action cannot be rollback");
  if(response1)
  {
  window.location.href="<?php echo SITE_PATH?>index.php?controller=user&function=fncDeactivateUser";
  }
  else{
   window.location.href="<?php echo SITE_PATH?>index.php?controller=user&function=userPanelController";
  }
 }
 else
 {
  window.location.href="<?php echo SITE_PATH?>index.php?controller=user&function=userPanelController";
 }
});
</script>
