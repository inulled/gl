<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
	} public function dcr() {
		$query = $this->db->query("SELECT * FROM church_repo");
		foreach ($query->result() as $row) {
			if($row->status == "Pending") {
				$data['churches'][] = array('churchName'		=> $row->church_name,
						  'streetAddress'	 					=> $row->street_address,
						  'locationalState'						=> $row->locational_state,
						  'locationalZIP'						=> $row->locational_zip,
						  'locationalCountry'					=> $row->locational_country,
						  'locationalCity'						=> $row->locational_city,
						  'overseerAccountId'					=> $row->overseer_account_id,
						  'taxExemptionNumber'					=> $row->tax_exemption_number,
						  'accountStatus'						=> $row->status,
				);
		}
			}
		$this->load->view('admin-panel/admin-request', $data);
	} public function processPassFail() {
		$id = $this->input->post("id");
		$pass = $this->input->post("pass");
		$this->db->where('overseer_account_id', $id);
		$this->db->update("church_repo", array('status' => $pass));
		$this->db->where('userid', $id);
		$this->db->update("users", array('status' => $pass));
		print $this->db->last_query();
        return print json_encode(array('passed'=>$pass));
		   
		$query = $this->db->query("SELECT * FROM church_repo, users WHERE userid = '{$id}'");
		$row = $query->row();
		$this->load->library('email');
		$this->email->from('rapidblow@gmail.com', 'Gospel-links AppStatus Team');
		$this->email->to($row->email); 
		if ($pass == "Pass") {
			$this->email->subject('Regarding your Gospel-links application');
			$this->email->message('Your application has been approved. You can now login by visiting our homepage. Good luck, and welcome!');
			$this->email->send();
		} elseif ($pass == "Fail") {
			$this->email->subject('Regarding your Gospel-links application');
			$this->email->message('I\'m sorry to inform you that your application has been denied. If you feel this is an error please contact our
			support team or resumit your application');
			$this->email->send();
		}
	}
}
?>