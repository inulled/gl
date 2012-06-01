<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>
<?php include('vh.php'); ?>

	<!-- Add jQuery library -->
	<script src="http://code.jquery.com/jquery-latest.js"></script>

<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gospel-links</title>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
	$("#home").click(function() {
		$("#main").fadeOut(500, function() {
			$(this).load("<?=base_url()?>index.php/routers/wall_1", function() {
				$(this).fadeIn(500);
			});
		});
	});
	$("#logout").click(function() {
		window.location = '<?=base_url()?>index.php/home/kill_sess';
	});
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
				window.location = "<?=base_url()?>";
			} else if(data.session_state == false) {
				$("#login_failure").fadeIn(400);
		   	}
		  }
	   });
	}
	} /*function postToWall() {
		var a_p = "";
		var d = new Date();
		var curr_hour = d.getHours();
		if (curr_hour < 12) {
			a_p = "am";
		} else {
		a_p = "pm";
		} if (curr_hour == 0){
			curr_hour = 12;
		} if (curr_hour > 12){
			curr_hour = curr_hour - 12;
		}
		var curr_min = d.getMinutes();
		curr_min = curr_min + "";
		
		if (curr_min.length == 1){
			curr_min = "0" + curr_min;
		}
		
		var m_names = new Array("Jan", "Feb", "Mar",
		
		"Apr", "May", "Jun", "Jul", "Aug", "Sep",
		"Oct", "Nov", "Dec");
		
		var d = new Date();
		var curr_date = d.getDate();
		var curr_month = d.getMonth();
		var curr_year = d.getFullYear();
		var date = m_names[curr_month] +" "+ curr_date +" "+"at"+" "
		+ curr_hour + ":" + curr_min + " " + a_p;
		//Session user

		var user = <?=$this->session->userdata('userid')?>;
		
		var updater = $("#updater").val();
		var DATA = 'status=' + status + '&user=' + user + '&date=' + date;
			$.ajax({
			type: "POST",
			dataType: "JSON",
			url: "<?=base_url()?>index.php/home/logsig",
			data: DATA,
			json: {postedToWall: true},
			success: function(data) {
			if(data.postedToWall == true) {
				$(data).prependTo(".load_status_out").slideDown("slow");
			} else if(data.postedToWall == false) {
				return false;
		   	}
		  }
	   });
	}*/
	
	$('img#defualtImg a').imgPreview();
});
</script>
<style type="text/css">
.header {
	background-image: url('<?=base_url()?><?=$ldr?>images/dashboard/header.png');
	background-repeat: no-repeat;
}
.slogan {
	text-align: right;
	font-family: georgia;
	font-style: italic;
	font-size: small;
}
.footer {
	border-left: 2px solid #458845;
	border-right: 2px solid #458845;
	border-top: 1px dotted #CCCCCC;
	border-bottom: 2px solid #458845;
	background-color: #F4FFF4;
	border-bottom-right-radius: 5px;
	border-bottom-left-radius: 5px;
	-moz-border-radius-bottomright: 5px;
	-moz-border-radius-bottomleft: 5px;
	-webkit-border-bottom-right-radius: 5px;
	-webkit-border-bottom-left-radius: 5px;
	border-style: none solid solid solid;
	border-width: 0px 2px 2px 2px;
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
/* jQuery selected */
	cursor: pointer;
	-webkit-user-select: none;
	-khtml-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	-o-user-select: none;
	user-select: none;
}
.area2 {
/* jQuery selected */
	cursor: pointer;
	-webkit-user-select: none;
	-khtml-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	-o-user-select: none;
	user-select: none;
}
.login-failure-box {
	border: 1px solid #CCCCCC;
	background-color: #E8E8E8;
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: small;
	text-align: center;
	border-radius: 3px;
}
.mainAreaStyle1 {
	border-left: 2px solid #458845;
	border-right: 2px solid #458845;
	background-color: #F4FFF4;
	border-top-color: #CCCCCC;
	border-top-width: 1px;
	border-bottom-color: #CCCCCC;
	border-bottom-width: 1px;
}
.font1 {
	font-family: tahoma;
	font-size: 10pt;
	font-weight: normal;
}
.textarea1 {
	padding: 5px;
	outline: none;
	border-radius: 2px;
	border-color: #CDCDCD;
	resize: none;
	width: 292px;
	height: 40px;
	font-family: tahoma;
	font-size: 9pt;
	font-weight: normal;
}
.font2 {
	font-family: Tahoma;
	font-size: 9pt;
	font-weight: normal;
}
.taskbar {
	background-color: #F4FFF4;
	padding: 3px;
	font-family: tahoma;
	font-size: 10pt;
	position: fixed;
	bottom: 0px;
	border-width: 3px;
	border-color: #FF9900;
	border-top-style: solid;
	border-left-style: solid;
	border-top-right-radius: 3px;
	border-top-left-radius: 3px;
	right: 20%;
	left: 20%;
	border-right-style: solid;
}
.notification-panel {
	margin-right: 0px;
}
.notificationalNumber {
	color: #D03434;
	font-family: Tahoma;
	font-size: 10pt;
}
.NotificationText {
	font-family: Tahoma;
	font-size: 10pt;
}
.textbox1 {
	font-family: tahoma;
	font-size: 10pt;
	border: 1px solid #C7C7C7;
	outline: none;
	padding: 3px;
	resize: none;
}
.leftAlign1 {
	text-align: left;
}
.linkText {
/* user list sector */
	color: #3F32D0;
}
.link-font1 {
	font-family: Tahoma;
	font-size: 9pt;
	color: #3366CC;
	text-decoration: none;
}
</style>
</head>

<body style="background-color: #333333;">

<table id="main2" cellpadding="0" cellspacing="0" style="width: 802px; height: 365px" align="center">
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
				<td id="home" class="area1" height="16" style="width: 47px">
				</td>
				<td style="width: 7px">&nbsp;</td>
				<td class="area1" id="churchProfile" style="width: 99px"></td>
				<td style="width: 2px">&nbsp;</td>
				<td class="area1" id="messages" style="width: 63px">&nbsp;</td>
				<td style="width: 495px">&nbsp;</td>
				<td class="area1" id="logout">
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td style="width: 11px">&nbsp;</td>
		<td valign="top" class="mainAreaStyle1" colspan="2">
		<table cellpadding="0" cellspacing="0" style="width: 773px; height: 396px">
			<tr>
				<td valign="top">
				<div class="leftAlign1">
					<table cellpadding="5" style="width: 100%">
						<tr>
							<td id="main">
								<?php $this->load->view("wall-1"); ?>
							</td>
						</tr>
					</table>
				</div>
				
				</td>
				<td valign="top" style="height: 396px; width: 245px; padding: 3px;">
				<a class="font1">
				<?php $verse = $this->db->query("SELECT * FROM bible_verses ORDER BY RAND() LIMIT 5");
					  foreach ($verse->result() as $row) {
						  echo "<i>".$row->verseLocation.nl2br(": </i>").$row->verseEntry.nl2br("\n \n");
					  } ?>
				</a></td>
			</tr>
		</table>
		</td>
		<td style="height: 267px">&nbsp;</td>
		</tr>
	<tr>
		<td style="height: 15px; width: 11px"></td>
		<td valign="top" class="footer" colspan="2" style="height: 15px">
		<!-- MSCellType="empty" -->
		&nbsp;</td>
		<td style="height: 15px"></td>
		</tr>
	<tr>
		<td style="width: 11px;"></td>
		<td style="width: 306px">
		&nbsp;</td>
		<td style="width: 16px; height: 19px;"></td>
		</tr>
</table>

<div class="taskbar" style="left: 17%; right: 18%; bottom: 0px">
		<table cellpadding="0" cellspacing="0" style="width: 100%">
			<tr>
				<td style="width: 180px">
		<table class="notification-panel; area2" style="width: 94%">
			<tr>
				<td style="width: 6px; height: 20px;">
				<img alt="" height="17" src="<?=base_url()?><?=$ldr?>images/dashboard/notifications.png" width="17" /></td>
				<td class="NotificationText" style="width: 112px; height: 20px;">Check Notifications:</td>
				<td class="notificationalNumber" style="height: 20px"><strong>40</strong></td>
			</tr>
		</table>
				</td>
				<td>
				<form method="post">
					</form>
				</td>
				<td class="right-align-button1">
					<input placeholder="Search...." class="textbox1" name="Text1" style="width: 213px" type="text" /></td>
			</tr>
		</table>
		</div>

</body>

</html>