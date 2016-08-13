<?php
isset($_SESSION) OR session_start();
	/**
	 * ×¢£º±¾ÓÊ¼þÀà¶¼ÊÇ¾­¹ýÎÒ²âÊÔ³É¹¦ÁËµÄ£¬Èç¹û´ó¼Ò·¢ËÍÓÊ¼þµÄÊ±ºòÓöµ½ÁËÊ§°ÜµÄÎÊÌâ£¬Çë´ÓÒÔÏÂ¼¸µãÅÅ²é£º
	 * 1. ÓÃ»§ÃûºÍÃÜÂëÊÇ·ñÕýÈ·£»
	 * 2. ¼ì²éÓÊÏäÉèÖÃÊÇ·ñÆôÓÃÁËsmtp·þÎñ£»
	 * 3. ÊÇ·ñÊÇphp»·¾³µÄÎÊÌâµ¼ÖÂ£»
	 * 4. ½«26ÐÐµÄ$smtp->debug = false¸ÄÎªtrue£¬¿ÉÒÔÏÔÊ¾´íÎóÐÅÏ¢£¬È»ºó¿ÉÒÔ¸´ÖÆ±¨´íÐÅÏ¢µ½ÍøÉÏËÑÒ»ÏÂ´íÎóµÄÔ­Òò£»
	 * 5. Èç¹û»¹ÊÇ²»ÄÜ½â¾ö£¬¿ÉÒÔ·ÃÎÊ£ºhttp://www.daixiaorui.com/read/16.html#viewpl 
	 *    ÏÂÃæµÄÆÀÂÛÖÐ£¬¿ÉÄÜÓÐÄãÒªÕÒµÄ´ð°¸¡£
	 */

	require_once "email.class.php";
	//******************** ÅäÖÃÐÅÏ¢ ********************************
	$smtpserver = "smtp.sina.com";//SMTP服务器
	$smtpserverport =25;//SMTP端口
	$smtpusermail = "qq519043202@sina.com";//SMTP账号
	$smtpemailto = "519043202@qq.com";//发送给什么什么什么
	$smtpuser = "qq519043202@sina.com";//SMTP邮箱
	$smtppass = "qq963852741";//SMTP邮箱密码
	$mailtitle = "来自tmn07.ren的消息";//标题

	$mailtype = "HTML";//邮件格式
	//************************ 配置信息 ****************************
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
	$smtp->debug = false;//是否显示发送的调试信息

	if ($_POST['content'] != '' && $_POST['tag'] == $_SESSION['tag']) {
		$mailcontent = "<h1>".$_POST['content']."</h1>";//内容
		$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
		// $state = '1';
		if($state==""){
			echo "error";
			exit();
		}
		echo "OK";
	}
	else{
		echo 'error';
	}


	
?>
