<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class regUserDash extends CI_Controller {
	public function postToWall() {
		$userid = $this->session->userdata('userid');
        $query  = $this->db->query("SELECT * FROM churchMembers WHERE cMuserId = '{$userid}'");
        $row = $query->row();
        $myChurchId = $row->cMchurchId;
		$entryData = $this->input->post('updater');
		// fix ignore problem... it has to do with mysql....
		$query1 = $this->db->query("INSERT IGNORE INTO wallPosts (entryData, entryCreationDateTime, postingUserId, wpChurchId)
						  VALUES('{$entryData}', NOW(), '{$userid}', '{$myChurchId}')");
		$insertedId = $this->db->insert_id();

		$wallPostQuery1 = $this->db->query("SELECT * FROM wallPosts");
		foreach ($wallPostQuery1->result() as $row) {
			if ($row->idwallPosts == $insertedId) {
				$entryDataJSON 			   = $row->entryData;
				$entryCreationDateTimeJSON = $row->entryCreationDateTime;
			}
		}
		$usersQuery1 = $this->db->query("SELECT * FROM users");
		foreach ($usersQuery1->result() as $row) {
			if ($row->userid == $userid) {
				$firstname_JSON 	= $row->firstname;
				$lastname_JSON 		= $row->lastname;
				$defaultImgURI_JSON = base_url().$row->defaultImgURI;
			}
		}
		echo json_encode(array('postedToWall' => true, 'firstname_JSON' => $firstname_JSON, 'lastname_JSON' => $lastname_JSON, 'defaultImgURI_JSON' => $defaultImgURI_JSON, 'entryDataJSON' => $entryDataJSON, 'entryCreationDateTimeJSON' => $entryCreationDateTimeJSON));
	} public function wallPostComments() {
		// This function processes wall post comments

		// pull the submitted comment data
		$returnedPostId = $this->inuput->post('entryId');
		$returnedCommentData = $this->input->post('returnedCommentData');

		// pull the required session data
		$userid = $this->session->userdata('userid');

		// select the sql data from wallPosts and wallPostComments
		$query = $this->db->query("SELECT * FROM wallPosts, wallPostComments");
		
		// loop through the mysql rows and process the expanded sql code
		foreach ($query->result() as $row) {
			if($row->idwallPosts == $returnedPostId) {
				echo json_encode(array('commentedToWall' => true, 'commentData_JSON' => $returnedCommentData, 'returnedPostId' => $returnedPostId));
			} else {
				echo json_encode(array('commentedToWall' => false));
			}
		}
	} public function delPost() {
		$returnedEntryId = $this->input->post('entryId');
		$this->db->where("idwallPosts", $returnedEntryId);
		$this->db->delete("wallposts");
		echo json_encode(array('postDeleted' => true));
	} public function sessionExpire() {
		if ($this->session->userdata("logged") == "1") {
			echo json_encode(array("sessionExpired" => false));
		} elseif($this->session->userdata("logged") == "0") {
			echo json_encode(array("sessionExpire" => true));
		}
	} public function extendSession() {
		// set loggedIn session var
		$this->session->set_userdata('logged', '1');
		// return json to ajax call
		echo json_encode(array("extendedSession" => true));
	} public function commentsList() {
		$query1 = $this->db->query("SELECT * FROM wallpostcomments WHERE wallPostId = '{$row->idwallPosts}'");
		if ($query->num_rows() > 0) {
			echo json_encode(array("entryData" => $row1->entryData));
		} else {
			echo json_encode(array("noCommentData" => TRUE));
		}
	} public function addComment() {
		$returnedEntryId = $this->input->post("newId");
		$returnedData	 = $this->input->post("commentDataBox");
		$returnedUserId	 = $this->input->post("userid");
		
		$this->db->query("INSERT IGNORE INTO wallPostComments (entryData, DateTimeCreated, userid, wallPostId)
			 			  VALUES('{$returnedData}', NOW(), '{$returnedUserId}', '{$returnedEntryId}')");
		echo json_encode(array('returnedEntryId' => $returnedEntryId, 'returnedData' => $returnedData, 'returnedUserId' => $returnedUserId));
	}
}
?>