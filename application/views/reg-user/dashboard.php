<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>

	<!-- Load View Data-->
	<?php include('vh.php'); ?>
	<!-- Load Elastic Script-->
	<script src="<?=base_url().$ldr?>scripts/lib/jquery.elastic.source.js"></script>
	<!-- Load Timeago Script-->
	<script src="<?=base_url().$ldr?>scripts/lib/jquery.timeago.js"></script>
    <!-- Add CSS library -->
    <link rel="stylesheet" type="text/css" href="<?=base_url().$ldr?>reg-userdash.php" />
    
    <link rel="stylesheet" type="text/css" href="<?=base_url().$ldr?>dashSidebar.php" />
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gospel-links</title>

<script type="text/javascript" language="javascript">
$(document).ready(function() {
	setInterval(function() {
		jQuery.getJSON("<?=base_url()?>index.php/regUserDash/sessionExpire", function(data) {
			var sessionState = jQuery.parseJSON('{"sessionExpired":"true","sessionExpired":"false"}');
			if(sessionState.sessionExpired === "true") { // if session is expired run the following code
				var dataString = 'true';
				jQuery.ajax({	// send the expired signal to Ci so that it knows the session has expired
					type: 'POST',
					dataType: 'JSON',
					url: '<?=base_url()?>index.php/regUserDash/extendSession',
					data: {'dataString': true},
					success: function(data) {
						if (data.extendedSession == true) {
							alert('success');
						} else {
							return false;
						}
					}
				});
			} else if(sessionState.sessionExpired == "false") {
				return;
			}
		});
    }, 120000); // loop through every 2 minutes
    
	// loads the wall when the user firsts logs in
	jQuery('#main').load('<?=base_url()?>index.php/routers/wall_1');

	// when the home link is clicked, fadeIn in the wall
	jQuery("#home").click(function() {
		jQuery("#main").fadeOut(500, function() {
			jQuery(this).load("<?=base_url()?>index.php/routers/wall_1", function() {
				jQuery(this).fadeIn(500);
			});
		});
	});
	jQuery("#logout").click(function() {
		window.location = '<?=base_url()?>index.php/home/kill_sess';
	});
	jQuery("#password").keyup(function(event) {
    	var keyCode = event.keyCode || event.which;
    	if(keyCode === 13) {
        	logsig();
    	}
	});
	jQuery("#reset").click(function() {
		jQuery("#username, #password").val('');
		jQuery("#username").focus();
		jQuery("#login_failure").fadeOut(400);
	});
	jQuery("#login").click(function() {
		logsig();
	});
	function logsig() {
		var username = jQuery("#username").val();
		var password = jQuery("#password").val();
		var dataString = '&username=' + username + '&password=' + password;
		if(username=='' ||  password=='') {
			jQuery('#success').fadeOut(400).hide();
			jQuery('#error').fadeOut(400).show();
		} else {
			jQuery.ajax({
			type: "POST",
			dataType: "JSON",
			url: "<?=base_url()?>index.php/home/logsig",
			data: dataString,
			json: {session_state: true},
			success: function(data) {
			if(data.session_state == true) {
				window.location = "<?=base_url()?>";
			} else if(data.session_state == false) {
				jQuery("#login_failure").fadeIn(400);
		   	}
		  }
	   });
	}
	}
});
</script>
</head>

<body style="background-color: #333333">

<table id="main2" cellpadding="0" cellspacing="0" style="width: 802px; height: 365px" align="center">
	<!-- MSTableType="layout" -->
	<tr>
		<td valign="top" colspan="2">
		<img alt="" src="<?=base_url()?><?=$ldr?>images/logo.png" /></td>
		<td valign="top" class="auto-style1" colspan="2" style="height: 32px">&nbsp;
		</td>
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
					<table cellpadding="3" style="width: 100%">
						<tr>
							<td id="main">
							</td>
						</tr>
					</table>
				</div>
				
				</td>
<?php	$userid = $this->session->userdata('userid');
        $query = $this->db->query("SELECT * FROM churchMembers WHERE cMuserId = '{$userid}'");
        $row = $query->row();
		$membersChurchId = $row->cMchurchId;
        $query = $this->db->query("SELECT * FROM church_repo WHERE churchId = '{$membersChurchId}'");
        foreach ($query->result() as $row) {
        	?>
				<td valign="top" style="height: 396px; width: 245px; padding: 3px;">
				<table cellpadding="0" cellspacing="0" style="width: 242px; height: 547px">

					<tr>
						<td valign="top" style="height: 19px">
						<div class="headerFont1"><strong><?php echo $row->church_name ?></strong></div> <div class="black-font1">(Your a Member of this Church)</div></td>
					</tr>
					<tr>
						<td valign="top" style="height: 19px">
						<div class="headerFont1"><strong>Blah Blah </strong></div> <div class="black-font1">(Your Following this Church)</div></td>
					</tr>
					<tr>
						<td valign="top" style="height: 251px">
						</td>
					</tr>
					<tr>
		<!--				<td valign="top" colspan="3" style="height: 196px">
							<a class="font1">
								<?php $verse = $this->db->query("SELECT * FROM bible_verses ORDER BY RAND() LIMIT 5");
									  foreach ($verse->result() as $row) {
						  			  echo "<i>".$row->verseLocation.nl2br(": </i>").$row->verseEntry.nl2br("\n \n");
									  }
								?>
							</a>
						</td>
						-->
					</tr>
				</table></td>
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
		<td style="width: 306px">&nbsp;
		</td>
		<td style="width: 16px; height: 19px;"></td>
		</tr>
</table>

</body>
<?php } ?>
</html>