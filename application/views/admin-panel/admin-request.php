﻿	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gospel-links Administrative Panel</title>
	
	<!-- Add jQuery library -->
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	
<script type="text/javascript" language="javascript">
$(document).ready(function() {
	$('.passBtn').click(function() {
		id = $(this).attr('id');
		newId = id.substring(1);
		processPass("Pass", newId);
		window.location.reload();
	});

	$(".failBtn").click(function() {
		id = $(this).attr('id');
		newId = id.substring(1);
		processPass("Fail", newId);
		window.location.reload();
	});

	function processPass(pass, id) {
		var dataString = {"id": id, "pass": pass};
		$.ajax({
			type: "POST",
			dataType: "JSON",
			url: "<?=base_url()?>index.php/admin-panel/admin/processPassFail",
			data: dataString,
			success: function(data) {
			if(data.passed == true) {
				document.write("passed");
			} else if(data.passed == false) {
				document.write("error");
		   	}
		  }
	   });
	  };
	
});
</script>
<style type="text/css">
.auto-style1 {
	font-family: Tahoma;
	font-size: small;
}
.auto-style2 {
	font-family: Tahoma;
	font-size: 9pt;
}
.auto-style3 {
	font-family: Tahoma;
	font-size: 9pt;
	text-align: right;
}
.auto-style4 {
	text-align: right;
}
.button1 {
	background-color: #003366;
	border-style: solid;
	border-width: 2px;
	border-color: #999999;
	color: #FFFFFF;
	font-family: Tahoma;
	font-size: 10pt;
	border-radius: 3px;
}
.style2 {
	text-align: center;
}
.style3 {
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
	font-size: large;
}
.style7 {
	border-bottom: 1px solid #999999;
}
</style>
</head>

<body style="background-color: #EEECE8">

<table cellpadding="0" cellspacing="0" style="width: 301px; height: 219px" align="center" class="style7">
	<!-- MSTableType="layout" -->
	<tr>
		<td valign="top" style="width: 301px; height: 218px;">

<div class="style3">
	<em>Church Information</em></div>
<table id="church1" style="width: 99%">
	
	<?foreach($churches as $church) {?>
	<tr>
		<td class="auto-style3" style="width: 141px"><strong>Church Name</strong></td>
		<td class="auto-style1"><?=$church['churchName']?></td>
	</tr>
	<tr>
		<td class="auto-style3" style="width: 141px"><strong>Street Address</strong></td>
		<td class="auto-style2"><?=$church['streetAddress']?> </td>
	</tr>
	<tr>
		<td class="auto-style3" style="width: 141px"><strong>Locational State</strong></td>
		<td class="auto-style2"><?=$church['locationalState']?></td>
	</tr>
	<tr>
		<td class="auto-style3" style="width: 141px"><strong>Locational Zip</strong></td>
		<td class="auto-style2"><?=$church['locationalZIP']?></td>
	</tr>
	<tr>
		<td class="auto-style3" style="width: 141px"><strong>Locational Country</strong></td>
		<td class="auto-style2"><?=$church['locationalCountry']?></td>
	</tr>
	<tr>
		<td class="auto-style3" style="width: 141px"><strong>Locational City</strong></td>
		<td class="auto-style2"><?=$church['locationalCity']?></td>
	</tr>
	<tr>
		<td class="auto-style3" style="width: 141px"><strong>Overseer Account ID</strong></td>
		<td class="auto-style2"><?=$church['overseerAccountId']?></td>
	</tr>
	<tr>
		<td class="auto-style3" style="width: 141px"><strong>Tax Exemption 
		Number</strong></td>
		<td class="auto-style2"><?=$church['taxExemptionNumber']?></td>
	</tr>
	<tr>
		<td class="auto-style3" style="width: 141px"><strong>Account Status</strong></td>
		<td class="auto-style2"><?=$church['accountStatus']?></td>
	</tr>
	<tr>
		<td style="width: 141px" class="auto-style4">
			<input id="p<?=$church['overseerAccountId']?>" name="pass" type="button" value="Pass" class="auto-style4 passBtn" /></td>
		<td class="auto-style1">
			<input id="f<?=$church['overseerAccountId']?>" name="fail" type="button" value="Fail" class="failBtn" /></td>
	</tr>
	<?}?>
</table>

		</td>
		</tr>
</table>

</body><script>
</script>
</html>
