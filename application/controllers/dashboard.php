<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class dashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();
	} public function dcr() {
		// if the user registration expires, load the startpage
		if ($this->session->userdata("logged") == "0") {
			$this->load->view('startpage');
		}
		// pass all dashboard accesses through this function
		
		// set username session to username var
		$username = $this->session->userdata("username");
		
		// select from users where row username == to the username var. then grab userType from specified row
		$query = $this->db->get_where('users', array('username' => $username));
		$userType = $this->session->userdata('userType');
		
		/* following if....elseif statement takes userType and loads the dashboard accordingly
		 * so if the logging in user is a regular member, this code snippet will load all the
		 * rexgular member componants. Or if the logging in member is an admin, the administrator
		 * tools will be loaded. This includes the view and the view array as well.
		 */
		if ($userType == 'regular') {
				foreach ($query->result() as $row) {
					$data = array('firstname' => $row->firstname);
					$this->load->view('reg-user/dashboard', $data);
				}
		} elseif ($userType == 'overseer') {
				foreach ($query->result() as $row) {
					$data = array('firstname' => $row->firstname);
					$this->load->view('dashboard', $data);
				}
		} elseif ($userType == 'admin') {
				foreach ($query->result() as $row) {
					$data = array('firstname' => $row->firstname);
					$this->load->view('dashboard', $data);
				}
		}
	} public function fullUserListing() {
		$userid = $this->session->userdata('userid');
		$results = $this->db->query("SELECT * FROM users");
		foreach ($results->result_array() as $row) {
			if ($userid != $row->userid) {
				echo $row->firstname . " " . $row->lastname;
				echo "<form method='GET' action='processing/lib/process-send-friend-request.php?'>";
				echo '<input name="accepted" type="submit" value="Send User Request" /><br />';
				echo '<input name="AddedMessage" placeholder="Add a message?" type="textbox" />';
				echo '<br>Select Friend Type: ' . '<br />Full: ';
				echo '<input name="full_friend" type="checkbox"';
				echo '<input type="hidden" name="id" value="' . $row->idusers . '" />';
				echo '</form>';
				echo "<br /><hr />";
			} elseif ($userid == $row->userid) {
				echo $row->firstname . " " . $row->lastname;
				echo "<br />";
				echo "You all are currently friends";
			}
	   }
	}
}
?>