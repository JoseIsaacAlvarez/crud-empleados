<?php
class Restricted_access extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->load->view('errors/forbidden');
	}
}
?>