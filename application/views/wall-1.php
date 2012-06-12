<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head>
<?php include('vh.php'); ?>
	<!-- Add elastic library -->
	<script src="<?=base_url().$ldr?>scripts/lib/jquery.elastic.source.js"></script>
	<script src="<?=base_url().$ldr?>scripts/lib/jquery.tinyscrollbar.min.js"></script>

<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<meta name="keywords" content="church, churches, social network, web 2.0, " />
<meta name="description" content="Introducing the first church oriented social network" />

<title>Gospel-links</title>
<script type="text/javascript">
    $(document).ready(function() {
    $('#scrollbar1').tinyscrollbar();
    // make updater textbox elastic
    jQuery(".textarea1").elastic();

	jQuery(".commentLink").click(function() {
		id = jQuery(this).attr("rel");
		jQuery("#commentBox-"+id).focus();
	});
	// process addComment()
	jQuery(".textbox1").keydown(function(event) {
	    var keyCode = event.keyCode || event.which;
	    if (keyCode === 13) {
	        addComment($(this));
	    }
	});
	// process postToWall()
	jQuery("#shareButton").click(function() {
		postToWall();
	});

	// process postHover()
	/*jQuery(".postname").hover(function() {
		var entryId = jQuery(e).attr("delpost");
		jQuery("#load_status_out-"+entryId).slideUp();
	});*/
	// process delPost()
	jQuery(".delpost").click(function() {
		delPost(this);
	});

	jQuery(window).scroll(function() {
 		if(jQuery(window).scrollTop() + 1000 > jQuery(document).height() - jQuery(window).height() ){
 			// load in next 20 posts when user scrolls to the bottom of the page
 			jQuery("#newData").load("<?=base_url()?>index.php/routers/loadMorePosts");
 		}
 	});
 	
 	$("#updater").keydown(function(event) {
    	var keyCode = event.keyCode || event.which;
    	if(keyCode === 9) {
        	$("#shareButton").focus();
        	return event.preventDefault();
    	}
	});

	function wallTable(defaultImgURI, firstname, lastname, entryData, entryCreationDateTime, idWallPosts) {
		 return '<div id="new_posts"></div>'+
		 '<table id="load_status_out-' + idWallPosts + '" cellpadding="0" cellspacing="0" style="width: 376px; height: 63px" class="status-border-bottom-box1"><tr>'+
		'<td valign="top" rowspan="4" style="padding: 4px; width: 465px">'+
		'<img style="padding: 3px" id="defaultImg a0" src="' + defaultImgURI + '" width="59" height="64" />'+
		'<a class="link-font2"><b>View Profile<br /></a><a class="delpost link-font2" delpost="' + idWallPosts + '" href="javascript:void(0)" id="delPost">Delete Post</a></td>'+
		'<td id="del" valign="top" style="width: 458px; height: 7px;">'+
		'<a class="font1 link-font1 postname"><b>' + firstname + ' ' + lastname + '</b></a></td>'+
		'<td valign="top" style="height: 7px; width: 41px"></td></tr><tr>'+
		'<td class="font1" valign="top" colspan="2" style="height: 40px">'+
		entryData + '</tr><tr><td valign="top" colspan="2">'+
		'<a class="link-font1" id="like" href="#" style="width: 138px">Like</a>'+
		'<span class="font2"> | </span><a class="link-font1 commentLink" id="commentLink" rel="' + idWallPosts +'" href="javascript:void(0)" style="width: 138px">'+
		'Comment</a><span class="font2"> | ' + entryCreationDateTime + '</span></td></tr><tr>'+
		'<td class="style1" valign="top" colspan="2" style="height: 42px">'+
		'<div id="commentLikeListing" style="width: 95%; display: none"></div>'+
		'<input placeholder="Write a comment..." id="commentBox-' + idWallPosts + '" class="textbox1" style="width: 400px"></input>'+
		'</td></tr><br></table>';
	}

    function postToWall() {
		var updater = jQuery("#updater").val();
		var dataString = '&updater=' + updater;
			jQuery.ajax({
			type: "POST",
			dataType: "JSON",
			url: "<?=base_url()?>index.php/regUserDash/postToWall",
			data: dataString,
			json: {postedToWall: true},
			success: function(data) {
			if(data.postedToWall == true) {
				var html = wallTable(data.defaultImgURI_JSON, data.firstname_JSON, data.lastname_JSON, data.entryDataJSON, data.entryCreationDateTimeJSON, data.idWallPosts_JSON);
				jQuery(html).prependTo("#new_posts").slideDown("slow");
				// after the post is added and displayed clear form and reselect the textarea
				jQuery("#updater").val("").focus();
			} else if(data.postedToWall == false) {
				return false;
		   	}
		  }
	   });
	} function addNewCommentData(defaultImgURI, firstname, lastname, returnedData, entryCreationDateTime) {
		return '<table cellpadding="0" cellspacing="0" style="width: 430px" class="style1 commentStyle">'+
		'<tr>'+
		'<td valign="top" style="width: 10px">'+
		'<img style="padding: 3px" id="defaultImg a0" src="' + defaultImgURI + '" align="left" width="25px" height="25px" />'+
		'</td>'+
		'<td valign="top" style="width: 319px">'+
		'<a class="font1 link-font1"><b>' + firstname + ' ' + lastname + '</b></a>' + returnedData + '<br>' + entryCreationDateTime +
		'</td>'+
		'</tr>'+
		'</table>';
	}
		function addComment(e) {
			var userid = "<?=$this->session->userdata('userid')?>";
			var id = $(e).attr("id");
			var newId = id.replace("commentBox-", "");
			var commentBoxData = $("#commentBox-"+newId).val();
				$.ajax({
					type: "POST",
					dataType: "JSON",
					url: "<?=base_url()?>index.php/regUserDash/addComment",
					data: {
						commentBoxData: commentBoxData,
						userid: userid,
						newId: newId,
						commentAdded: true
					},
					success: function(data) {
						if (data.commentAdded === true) {
							var html = addNewCommentData(data.defaultImgURI, data.firstname, data.lastname, data.returnedData, data.entryCreationDateTime);
							jQuery(html).appendTo("#commentListing");
						} else {
							return false;
						}
					}
				});
		}
	    function delPost(e) {
	    // this function deletes the current post
	    var entryId = jQuery(e).attr("delpost");
	    var dataString = "&entryId=" + entryId;
			jQuery.ajax({
			type: "POST",
			dataType: "JSON",
			url: "<?=base_url()?>index.php/regUserDash/delPost",
			data: dataString,
			json: {postedToWall: true},
			success: function(data) {
			if(data.postDeleted == true) {
				// hide the post
				jQuery("#load_status_out-"+entryId).fadeOut();
			}
		  }
	   });
	}
	
/*		$(".test-links").click(function(){
		var urlex = /\b(([^:\/?#]+):)(\/\/([^\/?#]*))([^?#]*)(\?([^#]*))?(#(.*))?/gi;
		var content = $("textarea").val();
		var contentArray = content.split(" ");
		var linkArray = [];
		
		$.each(contentArray, function(index,value){
			if (value.match(urlex)) linkArray.push(value);
		});
		$("#output").empty();
		$.each(linkArray, function(index,value){
			$("#output").append(value+"<br/>");
		});
	});

	$(".test-images").click(function(){
		var urlex = /^https?:\/\/(?:[a-z\-]+\.)+[a-z]{2,6}(?:\/[^\/#?]+)+\.(?:jpe?g|gif|png)$/gi;
		var content = $("textarea").val();
		var contentArray = content.split(" ");
		var linkArray = [];

		$.each(contentArray, function(index,value){
			if (value.match(urlex)) linkArray.push(value);
		});

		$("#output").empty();
		
		$.each(linkArray, function(index,value){
    		$("#output").append("<img style='height: 60pt; width: 80pt' src=\""+value+"\"/><br/>"+value);
		});
	}); */
});
    </script>
</head>
<table cellpadding="0" cellspacing="0" style="width: 506px;" align="left">
<tr>
									<td valign="top" class="text-align-left">
									<table align="center" style="width: 100%" class="status-updater-box1">
										<tr>
											<td>
					<textarea autofocus id="updater" placeholder="What's on your mind?" class="textarea1" name="TextArea2" style="width: 499px; height: -3px" cols="20" rows="1"></textarea></td>
										</tr>
										<tr>
											<td class="right">
											<table cellpadding="0" cellspacing="0" style="width: 100%">
												<tr>
													<td class="left" style="width: 477px">
													&nbsp;<a class="grab"><strong>Grab Images</strong></a>&nbsp;&nbsp;
													<a class="grab"><strong>Grab Links</strong></a>
													</td>
													<td>
										<input name="share" id="shareButton" type="submit" value="Share" style="width: 58px; height: 28px" class="button1" /></td>
												</tr>
											</table>
											</td>
										</tr>
									</table>
									</td>
								</tr>
								<tr>
<td id="main" valign="top" style="height: 111px; width: 506px">
<div id="scrollbar1">
<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
<div class="viewport">
<div class="overview">
<?php	$this->load->helper('date');
		$userid = $this->session->userdata('userid');
        $query  = $this->db->query("SELECT * FROM churchMembers WHERE cMuserId = '{$userid}'");
        $row = $query->row();
		if ($query->num_rows() != 0) {
        $membersChurchId = $row->cMchurchId;
        $query = $this->db->query("SELECT wp.idwallPosts, wp.entryData, wp.entryCreationDateTime, u.firstname, u.lastname, u.userid, u.defaultImgURI FROM users u
                                   INNER JOIN wallPosts wp ON wp.postingUserid = u.userid
                                   WHERE wp.wpChurchId = '{$membersChurchId}' ORDER BY wp.idwallPosts DESC LIMIT 200");

        foreach ($query->result() as $row) { ?>
        <div id="new_posts"></div>
	<table id="load_status_out-<?=$row->idwallPosts?>" cellpadding="0" cellspacing="0" style="width: 376px; height: 63px" class="status-border-bottom-box1">
	<tr>
		<td valign="top" rowspan="4" style="padding: 4px; width: 465px">
		<img style="padding: 3px" id="defaultImg a0" src="<?php echo base_url().$row->defaultImgURI; ?>" width="59" height="64" />
		<a class="link-font2"><b>View Profile<br /></a><a class="delpost link-font2" delpost="<?=$row->idwallPosts?>" href="javascript:void(0)" id="delPost">Delete Post</a>
		</td>
		<td id="del" valign="top" style="width: 458px; height: 7px;">
		<a class="font1 link-font1 postname"><b><?php echo $row->firstname . " " . $row->lastname; ?></b></a>
		</td>
		<td valign="top" style="height: 7px; width: 41px">
		<!-- MSCellType="empty" -->
		</td>
	</tr>
	<tr>
		<td class="font1" valign="top" colspan="2" style="height: 40px">
		<?php echo $row->entryData; ?></td>
		</tr>
	<tr>
		<td valign="top" colspan="2">
		<a class="link-font1" id="like" href="#" style="width: 138px">Like</a>
		<span class="font2"> | </span>
		<a class="link-font1 commentLink" id="commentLink" rel="<?php echo $row->idwallPosts; ?>" href="javascript:void(0)" style="width: 138px">
		Comment</a>
		<span class="font2"> | <?=date('m/d/Y h:ia ', strtotime($row->entryCreationDateTime))?></span>
		</td>
	</tr>
	<tr>
		<td class="style1" valign="top" colspan="2" style="height: 42px">

		<div id="commentLikeListing" style="width: 95%; display: none"></div>
<?php	$query1 = $this->db->query("SELECT * FROM wallpostcomments wp INNER JOIN users u ON u.userid = wp.userid WHERE wallPostId = '{$row->idwallPosts}' ORDER BY wp.idwallPostComments ASC");
		foreach($query1->result() as $row1)
			if ($query->num_rows() > 0) { ?>
		<div id="likeList" style="display: none; width: 95%"></div>
		<div id="commentsList" style="width: 96%">
		<table cellpadding="0" cellspacing="0" style="width: 408px" class="style1 commentStyle">
		<tr>
		<td valign="top" style="width: 10px">
		<img style="padding: 3px" id="defaultImg a0" src="<?=base_url().$row1->defaultImgURI?>" align="left" width="25px" height="25px" />
		&nbsp;</td>
		<td valign="top" style="width: 319px">
		<a class="font1 link-font1"><b><?=$row1->firstname.' '.$row1->lastname?> </b></a><?=$row1->entryData.'<br>'.date('m/d/Y h:ia ', strtotime($row1->DateTimeCreated))?></a>
		</td>
	</tr>
</table>
		</div>
		<?php } ?>
		<input placeholder="Write a comment..." id="commentBox-<?php echo $row->idwallPosts; ?>" class="textbox1" style="width: 400px"></input>
		</td>
		</tr>
		
</table>
<?php } } else { ?>
	<div id="commentsListNewData" class="commentStyle" style="visibility: hidden; width: 96%"></div>
	<br>
	<div class="font2" style="text-align: center">Sorry but you are not associated with any churches. Click <span class="link-font1" id="findChurch">here</span> to find your church.</div>
	<?php } ?>
		<div id="newData"></div>
</div>
</div>
</td>