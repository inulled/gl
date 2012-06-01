<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class dashboard extends CI_Controller {
	public function postToWall() {
        $query  = $this->db->query("SELECT * FROM churchMembers WHERE cMuserId = '{$userid}'");
        $row = $query->row();
        $myChurchId = $row->cMchurchId;
		$entryData = $this->input->post('entryData');
		$this->db->query("INSERT IGNORE INTO wallPosts (entryData, entryCreationDateTime, wpChurchId)
						  VALUES('$entryData', NOW(), '$myChurchId')");
		if ($this->db->affected_rows() == 1) {
			echo json_encode(array('postedToWall' => true));
		} else {
			echo json_encode(array('postedToWall' => false));
		}
	}
}
?>