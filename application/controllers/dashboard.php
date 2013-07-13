<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Sharif Judge online judge
 * @file dashboard.php
 * @author Mohammad Javad Naderi <mjnaderi@gmail.com>
 */

class Dashboard extends CI_Controller{
	var $username;
	var $assignment;
	public function __construct(){
		parent::__construct();
		if ( ! $this->session->userdata('logged_in')){ // if not logged in
			redirect('login');
		}
		$this->username = $this->session->userdata('username');
		$this->assignment = $this->assignment_model->assignment_info($this->user_model->selected_assignment($this->username));
	}

	public function index(){

		$data = array(
			'username'=>$this->username,
			'all_assignments'=>$this->assignment_model->all_assignments(),
			'assignment' => $this->assignment,
			'title'=>'Dashboard',
			'style'=>'main.css'
		);

		$this->load->view('templates/header',$data);
		$this->load->view('pages/dashboard',$data);
		$this->load->view('templates/footer');
	}
}