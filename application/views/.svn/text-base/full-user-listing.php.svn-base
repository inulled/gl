<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>
<?php include('vh.php'); ?>

	<!-- Add jQuery library -->
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	
	<!-- Add Localized jQuery library -->
	<script src="<?=base_url().$ldr?>scripts/lib/jquery-1.7.1.min.js"></script>
	
	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="<?=$ldr?>scripts/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?=$ldr?>scripts/source/jquery.fancybox.js"></script>
	<link rel="stylesheet" type="text/css" href="<?=$ldr?>scripts/source/jquery.fancybox.css" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?=$ldr?>scripts/source/helpers/jquery.fancybox-buttons.css?v=2.0.3" />

	<script type="text/javascript" src="<?=$ldr?>scripts/lib/imgpreview.full.jquery.js"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?=$ldr?>scripts/source/helpers/jquery.fancybox-thumbs.css?v=2.0.3" />
	<script type="text/javascript" src="<?=$ldr?>scripts/source/helpers/jquery.fancybox-thumbs.js?v=2.0.3"></script>


<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gospel-links</title>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
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
	}
	
	$('img#defualtImg a').imgPreview();
});
</script>
<style type="text/css">
.font1 {
/* user list sector */
	font-family: tahoma;
	font-size: 10pt;
	font-weight: normal;
}
.textarea1 {
/* user list sector */
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
/* user list sector */
	font-family: tahoma;
	font-size: 9pt;
	font-weight: normal;
}
.auto-style14 {
	font-family: Tahoma;
	font-size: 9pt;
	color: #2215B5;
}
.linkText {
/* user list sector */
	color: #3F32D0;
}
.auto-style16 {
/* user list sector */
	text-decoration: none;
}
.textbox1 {
/* user list sector */
	font-family: tahoma;
	font-size: 10pt;
	border: 1px solid #C7C7C7;
	outline: none;
	padding: 3px;
	resize: none;
}
</style>
</head>
				<td valign="top" style="padding: 5px; width: 408px">
		<?php $userid = $this->session->userdata('userid');
			  $results = $this->db->query("SELECT * FROM churchesFollowed inner join churchMembers on
			  							   churchesFollowed.cFchurchId = churchMembers.cMchurchId
			  							   WHERE churchMembers.cMuserId = '{$userid}'");
			  foreach ($results->result() as $row) {
			  	
			  }
			  $results = $this->db->query("SELECT * FROM users");
			  	foreach ($results->result() as $row) {
			  		if ($row->status == "Pass") {
			  		if ($userid != $row->userid) { ?><table cellpadding="0" cellspacing="0" style="width: 401px; height: 107px">
					<!-- MSTableType="layout" -->
					<tr>
						<td valign="top" rowspan="2" style="padding: 3px; width: 101px">
						
						<img id="defaultImg a" src="<?php echo base_url().$row->defaultImgURI; ?>" width="95" height="96" /></td>
						<td valign="top" style="width: 149px" class="font1">
						<a class="font1"><?php echo $row->firstname . " " . $row->lastname; ?></a>
						&nbsp;</td>
						<td valign="top" style="height: 38px; width: 145px;" class="right-align-button1">
						<span class="auto-style14">
						<a class="auto-style16" href="#" style="width: 138px">
						<span class="linkText">Send a friend request</span></a></span><br />
						<span class="font2">400 Mutual Friends</span>
						</td>
						</tr>
					<tr>
						<td valign="top" colspan="2" style="height: 69px">
							<textarea class="textarea1" placeholder="Send <?php echo $row->firstname; ?> a message." name="sendMessage" style="height: 49px"></textarea></td>
						</tr>
		</table>
			<?php }
				} elseif ($row->status == "Fail" || $row->status == "Pending") {
					echo "Sorry ".$row->firstname." ".$row->lastname." is currently not an active member";
				}
			}
			?>
				</td>
