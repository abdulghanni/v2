<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perjanjian_model extends CI_Model {
	
	function __construct() 
	{
		parent::__construct();
	}
	var $table 		= 'perjanjian_kerjasama'; 	// Entries table

	function index(){
                return $this->db
                ->from($this->table)
                ->get();
	}
}