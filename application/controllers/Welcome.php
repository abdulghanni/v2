<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function index()
	{
		$q = $this->db->get('FG_STOCK');
		print_r($q->RESULT());
	}
}
