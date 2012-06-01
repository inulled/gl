<style type="text/css">
.textbox-style1 {
	border: 1px solid #C0C0C0;
	padding: 5px;
	font-family: tahoma;
	font-size: large;
	font-style: normal;
	outline: none;
	border-radius: 3px;
	resize: none;
	text-transform: capitalize;
}
.textbox-style2 {
	border: 1px solid #C0C0C0;
	padding: 5px;
	font-family: tahoma;
	font-size: large;
	font-style: normal;
	outline: none;
	border-radius: 3px;
	resize: none;
}
.button-style {
	font-family: tahoma;
	font-size: medium;
	font-style: normal;
	background-color: #FFFFFF;
	border: 1px solid #C0C0C0;
	border-radius: 3px;
}
.style1 {
	font-family: tahoma;
	font-size: medium;
	background-color: #FFFFFF;
	border: 1px solid #C0C0C0;
	border-radius: 3px;
}
</style>
<form method="post" action="proccessing/mailer.php">
	<input placeholder="Your Name" spellcheck="false" autocomplete="off" class="textbox-style1" name="name" style="width: 243px" type="text" /><br />
	<input placeholder="Your Email" spellcheck="false" autocomplete="off" class="textbox-style2" name="email" style="width: 243px" type="text" /><br />
	<input placeholder="Subject" spellcheck="false" autocomplete="off" class="textbox-style2" name="subject" style="width: 243px" type="text" /><br />
	<em>
	<textarea placeholder="Your Message" spellcheck="false" autocomplete="off" class="textbox-style2" name="message" style="width: 403px; height: 158px"></textarea><br><select class="textbox-style" name="Select1">
	<option selected="">Choose Department</option>
	<option>Kevin ClassiK</option>
	<option>Michael Grigsby (Web Master)</option>
	</select><br></em>
	<input name="Submit1" type="submit" value="Send Email" class="style1" style="width: 100px; height: 35px">
	<input name="Reset1" type="reset" value="Reset Form" class="style1" style="width: 100px; height: 35px"></form>