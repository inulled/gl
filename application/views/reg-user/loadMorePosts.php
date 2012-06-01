<?php include('vh.php'); ?>
<table cellpadding="0" cellspacing="0" style="width: 506px;" align="left">
<tr>
<td id="main" valign="top" style="height: 111px; width: 506px">
<?php	$userid = $this->session->userdata('userid');
        $query  = $this->db->query("SELECT * FROM churchMembers WHERE cMuserId = '{$userid}'");
        $row = $query->row();
        $membersChurchId = $row->cMchurchId;
        $query = $this->db->query("SELECT wp.idwallPosts, wp.entryData, wp.entryCreationDateTime, u.firstname, u.lastname, u.userid, u.defaultImgURI FROM users u
                                   INNER JOIN wallPosts wp ON wp.postingUserid = u.userid
                                   WHERE wp.wpChurchId = '{$membersChurchId}' ORDER BY wp.idwallPosts DESC LIMIT 20, 40");

        foreach ($query->result() as $row) { ?>
        <div id="new_posts"></div>
        <div style="visibility: hidden"><?php echo $row->idwallPosts; ?></div>
	        <table id="load_status_out-<?php echo $row->idwallPosts; ?>" cellpadding="0" cellspacing="0" style="width: 500px; height: 28px" class="status-border-bottom-box1">
	<tr>
	<td valign="top" rowspan="3" style="width: 69px">
	<img style="padding: 3px" id="defaultImg a0" src="<?php echo base_url().$row->defaultImgURI; ?>" width="59" height="64" />
	<br />
	<a class="link-font2"><b>View Profile<br /></a><a class="delpost link-font2" delpost="<?php echo $row->idwallPosts; ?>" href="javascript:void(0)" id="delPost">Delete Post</b></a></td>
	<td valign="top" style="padding: 2px; ">
	<a class="font1 link-font1"><b><?php echo $row->firstname . " " . $row->lastname; ?></b></a>
	&nbsp;</td>
		</tr>
	<tr>
		<td class="font1" valign="top" class="font1" style="padding: 3px; height: 25px;">
		<?php echo $row->entryData; ?></td>
		</tr>
	<tr>
		<td valign="top" class="style1" style="padding: 3px; height: 25px; width: 433px;">
		<a class="link-font1" id="like" href="#" style="width: 138px">Like</a>
		<span class="font2"> | </span>
		<a class="link-font1 commentLink" id="commentLink" rel="<?php echo $row->idwallPosts; ?>" href="javascript:void(0)" style="width: 138px">Comment</a>
		<span class="font2"> | <?php echo $row->entryCreationDateTime; ?></span>
			<input placeholder="Write a comment..." id="commentBox-<?php echo $row->idwallPosts; ?>" class="textbox1" type="text" style="width: 95%" />
		</td>
		</tr>
		<div id="newData"></div>
</table>
<?php } ?>

		</td>
	</tr>
</table>