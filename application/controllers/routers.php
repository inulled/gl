<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class routers extends CI_Controller {
	public function startpage() {
		$this->load->view('startpage');
	} public function dashboard() {
		$this->load->view('dashboard');
	} public function register() {
		$this->load->view('member-register');
	} public function register_church() {
		$this->load->view('register-church');
	} public function search_aChurch() {
		$this->load->view('search_aChurch');
	} public function wall_1() {
		$this->load->view('wall-1');
	} public function loadMorePosts() {
		$this->load->view('reg-user/loadMorePosts');
	}
}