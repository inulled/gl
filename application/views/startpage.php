﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>
<?php include('vh.php'); ?>

	<!-- Add jQuery library -->
	<script src="http://code.jquery.com/jquery-latest.js"></script>

	<!-- Add Localized jQuery library -->
	<script src="<?=base_url().$ldr?>scripts/lib/jquery-1.7.1.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="<?=base_url()?><?=$ldr?>scripts/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?=base_url()?><?=$ldr?>scripts/source/jquery.fancybox.js"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?><?=$ldr?>scripts/source/jquery.fancybox.css" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?><?=$ldr?>scripts/source/helpers/jquery.fancybox-buttons.css?v=2.0.3" />
	<script type="text/javascript" src="<?=base_url()?><?=$ldr?>scripts/source/helpers/jquery.fancybox-buttons.js?v=2.0.3"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?><?=$ldr?>scripts/source/helpers/jquery.fancybox-thumbs.css?v=2.0.3" />
	<script type="text/javascript" src="<?=base_url()?><?=$ldr?>scripts/source/helpers/jquery.fancybox-thumbs.js?v=2.0.3"></script>

<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gospel-links</title>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
	$('.area1, .auto-style10, .auto-style16').fancybox();
	$("#password").keyup(function(event) {
    	var keyCode = event.keyCode || event.which;
    	if(keyCode === 13) {
        	logsig();
    	}
	});
	$("#reset").click(function() {
		$("#username, #password").val('');
		$("#username").focus();
		$("#login_failure").fadeOut(400);
		
	});
	$("#login").click(function() {
		logsig();
	});

	function logsig() {
		var username = $("#username").val();
		var password = $("#password").val();
		var dataString = '&username=' + username + '&password=' + password;
		if(username=='' ||  password=='') {
			$('#success').fadeOut(400).hide();
			$('#error').fadeOut(400).show();
		} else {
			$.ajax({
			type: "POST",
			dataType: "JSON",
			url: "<?=base_url()?>index.php/home/logsig",
			data: dataString,
			json: {session_state: true},
			success: function(data) {
			if(data.session_state == true) {
				document.location = "<?=base_url()?>index.php/dashboard/dcr";
			} else if(data.session_state == false) {
				$("#login_failure").fadeIn(400);
		   	}
		  }
	   });
	}
	}
});
</script>
<style type="text/css">
.header {
	background-image: url('<?=base_url()?><?=$ldr?>images/header2.png');
	background-repeat: no-repeat;
}
.slogan {
	text-align: right;
	font-family: georgia;
	font-style: italic;
	font-size: small;
}
.main {
	background-color: #FFFFFF;
	border-width: 1px;
	border-right-style: solid;
	border-left-style: solid;
	border-color: #CCCCCC;
}
.box {
	background-color: #E8E8E8;
	border-width: 1px;
	border-color: #CCCCCC;
	border-style: dotted solid solid solid;
	border-bottom-right-radius: 5px;
	border-bottom-left-radius: 5px;
	-moz-border-radius-bottomright: 5px;
	-moz-border-radius-bottomleft: 5px;
	-webkit-border-bottom-right-radius: 5px;
	-webkit-border-bottom-left-radius:5px;
}
.georgia-large {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: large;
	font-style: italic;
}
.style13 {
	border: 1px solid #C0C0C0;
	padding: 5px;
	font-family: Tahoma;
	font-size: large;
	border-radius: 3px;
	outline: none;
}
.right-align-button1 {
	text-align: right;
}
.button1 {
	font-family: verdana;
	font-size: 9pt;
	border: 1px solid #D1D1D1;
	border-radius: 3px;
	color: #333333;
	font-weight: bold;
	background-color: #F8F8F8;
}
.area1 {
	cursor: pointer;
	-webkit-user-select: none;
	-khtml-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	-o-user-select: none;
	user-select: none;
}
.auto-style1 {
	text-align: right;
	font-family: "Times New Roman", Times, serif;
	font-style: italic;
	font-size: medium;
}
.login-failure-box {
	border: 1px solid #CCCCCC;
	background-color: #E8E8E8;
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: small;
	text-align: center;
	border-radius: 3px;
}
.auto-style4 {
	text-align: right;
	font-style: italic;
}
.auto-style5 {
	color: #2F2FAC;
	text-decoration: underline;
	cursor: pointer;
	-webkit-user-select: none;
	-khtml-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	-o-user-select: none;
	user-select: none;
}
.auto-style10 {
	color: #2F2FAC;
	text-decoration: underline;
}
.auto-style11 {
	border-left: 2px solid #458845;
	border-right: 2px solid #458845;
	border-top: 1px dotted #CCCCCC;
	border-bottom: 2px solid #458845;
	background-color: #F8F8F8;
	border-bottom-right-radius: 5px;
	border-bottom-left-radius: 5px;
	-moz-border-radius-bottomright: 5px;
	-moz-border-radius-bottomleft: 5px;
	-webkit-border-bottom-right-radius: 5px;
	-webkit-border-bottom-left-radius: 5px;
}
.auto-style12 {
	border-left: 2px solid #458845;
	border-right: 2px solid #458845;
	background-color: #F4FFF4;
	border-top-color: #CCCCCC;
	border-top-width: 1px;
	border-bottom-color: #CCCCCC;
	border-bottom-width: 1px;
}
.auto-style13 {
	font-family: Tahoma;
	font-size: small;
	text-align: right;
}
.auto-style15 {
	color: #FFFFFF;
}
.auto-style16 {
	text-decoration: none;
}
.font1 {
	font-family: Tahoma;
	font-size: 10pt;
}
</style>
</head>

<body style="background-color: #333333">

<table id="main1" cellpadding="0" cellspacing="0" style="width: 802px; height: 486px" align="center">
	<!-- MSTableType="layout" -->
	<tr>
		<td valign="top" colspan="2">
		<img alt="" src="<?=base_url()?><?=$ldr?>images/logo.png" /></td>
		<td valign="top" class="auto-style1" colspan="2" style="height: 32px">
		&nbsp;</td>
	</tr>
	<tr>
		<td valign="top" class="header" colspan="4" style="height: 32px">
		<table style="width: 100%">
			<tr>
				<td id="search-aChurch" height="16" style="width: 120px" class="area1 fancybox.iframe" href='<?=base_url()?>index.php/routers/search_aChurch'></td>
				<td style="width: 74px">&nbsp;</td>
				<td style="width: 528px">&nbsp;</td>
				<td id="register" class="area1 fancybox.iframe" href='<?=base_url()?>index.php/routers/register'>&nbsp;
				</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td valign="top" class="auto-style12" colspan="2">
		<table cellpadding="0" cellspacing="0" style="width: 773px; height: 267px">
			<!-- MSTableType="layout" -->
			<tr>
				<td valign="top" style="width: 329px">
				<table style="width: 61%" cellpadding="3" align="center">
					<tr>
						<td><br />
						<a class="georgia-large">Login Below</a><br />
						<table style="width: 301px" class="auto-style3" align="center">
							<tr>
								<td style="width: 306px">
								<table style="width: 100%" cellspacing="0" cellpadding="0">
										<tr>
											<td class="style5"><em>Enter your 
											username</em></td>
										</tr>
								</table>
								</td>
							</tr>
							<tr>
								<td style="width: 306px">
								<input autofocus id="username" name="username" class="style13" spellcheck="false" autocomplete="off" style="width: 303px" /></td>
							</tr>
							<tr>
								<td style="width: 306px">
								<table style="width: 100%" cellspacing="0" cellpadding="0">
									<tr>
										<td class="style5"><em>Enter your 
										password</em></td>
									</tr>
								</table>
								</td>
							</tr>
							<tr>
								<td style="width: 306px">
								<input id="password" name="password" class="style13" spellcheck="false" autocomplete="off" style="width: 303px" type="password" /></td>
							</tr>
							<tr>
								<td style="width: 306px">
								<table style="width: 100%" cellspacing="0" cellpadding="0" class="auto-style3">
									<tr>
										<td id="login_failure" style="display: none" style="width: 208px" class="login-failure-box">
										<em class="auto-style4">Login failed! 
										<a id="sub_register" href="<?=base_url()?>index.php/routers/register" class="auto-style10 fancybox.iframe">Register</a> or 
										<a id="reset" href="#" class="auto-style5">Reset</a></em><br /><a style="display: none" id="pending">If your overseer account is pending aproval, login will be deinied.</a></td>
										<td class="right-align-button1">
										<input name="login" id="login" type="submit" value="Login" style="width: 58px; height: 28px" class="button1" />
										</td>
									</tr>
								</table>
								</td>
							</tr>
						</table>
						</td>
					</tr>
				</table>
	</td>
				<td valign="top" style="text-align: center; height: 267px; width: 365px">
				<a class="font1"> We currently have <?=$this->db->count_all('church_repo')?> registered churches and <?=$this->db->count_all('users')?> members.</a>
				</td>
			</tr>
		</table>
		</td>
		<td style="height: 267px">&nbsp;</td>
		</tr>
	<tr>
		<td>&nbsp;</td>
		<td valign="top" class="auto-style11" colspan="2">
		<!-- MSCellType="empty" -->
		&nbsp;</td>
		<td style="height: 136px">&nbsp;</td>
		</tr>
	<tr>
		<td style="width: 11px;"></td>
		<td style="width: 469px"></td>
		<td style="width: 306px" class="auto-style13">
		<a href="<?=base_url()?>index.php/routers/register_church" class="auto-style16 fancybox.iframe">
		<span class="auto-style15">Register your church</span></a></td>
		<td style="width: 16px; height: 19px;"></td>
		</tr>
</table>

</body>

</html>
