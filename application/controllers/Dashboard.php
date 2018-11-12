<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->model('model_sesi');
		$this->model_sesi->getsesi();
		$Email_Volunteer = $this->session->userdata('Email_Volunteer');
		$this->load->view('tampilan_dashboard');
	}


}