<?php
class captchaController
{
	function __construct()
	{

	}
	
	function validateCaptcha()
	{
		/** Validate captcha */
		if (!empty($_REQUEST['captcha'])) {
			if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
				return false;
			} else {
				return true;
			}
		
 			unset($_SESSION['captcha']);
		}
	}
}
?>