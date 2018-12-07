<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {
	
	function __construct() 
	{
		parent::__construct();
	}

	var $entries_table 		= 'ph_entries'; 	// Entries table
	var $categories_table 	= 'ph_categories'; 	// Category table

	function list_produk($limit){
		$prod = $this->load->database('produkhukum', true);
		return $prod
		->select('c.description as c_description, e.description as e_description, ')	
		->select('e.entry_id, e.FK_category_id, e.FK_user_id, e.active, CAST(e.title as SIGNED) as title, e.regyear, e.date_added, e.url')
		->select('e.hits, e.downloaded, c.category_id, c.name, c.entry_count')

		->from($this->categories_table.' AS c')
		->join($this->entries_table.' AS e', 'c.category_id = e.FK_category_id', 'left')
		
		->order_by('e.regyear desc, title desc')
		->limit($limit)
		->get();
	}

	function list_produk_terunduh($limit){
		$prod = $this->load->database('produkhukum', true);
		return $prod
		->select('c.description as c_description, e.description as e_description, ')	
		->select('e.entry_id, e.FK_category_id, e.FK_user_id, e.active, CAST(e.title as SIGNED) as title, e.regyear, e.date_added, e.url')
		->select('e.hits, e.downloaded, c.category_id, c.name, c.entry_count')

		->from($this->categories_table.' AS c')
		->join($this->entries_table.' AS e', 'c.category_id = e.FK_category_id', 'left')
		
		->order_by('e.downloaded desc')
		->limit(5)
		->get();
	}

	function list_produk_populer(){
		$prod = $this->load->database('produkhukum', true);
		return $prod
		->select('c.description as c_description, e.description as e_description, ')	
		->select('e.entry_id, e.FK_category_id, e.FK_user_id, e.active, CAST(e.title as SIGNED) as title, e.regyear, e.date_added, e.url')
		->select('e.hits, e.downloaded, c.category_id, c.name, c.entry_count')

		->from($this->categories_table.' AS c')
		->join($this->entries_table.' AS e', 'c.category_id = e.FK_category_id', 'left')
		
		->order_by('e.hits desc')
		->limit(5)
		->get();
	}

	function list_himpunan($limit){
		return $this->db
		->select('c.description as c_description, e.description as e_description, ')	
		->select('e.entry_id, e.FK_category_id, e.FK_user_id, e.active, CAST(e.title as SIGNED) as title, e.regyear, e.date_added, e.url')
		->select('e.hits, e.downloaded, c.category_id, c.name, c.entry_count')

		->from($this->categories_table.' AS c')
		->join($this->entries_table.' AS e', 'c.category_id = e.FK_category_id', 'left')
		
		->order_by('e.regyear desc, title desc')
		->limit($limit)
		->get();
	}

	function berita_terbaru(){
		$max_id = $this->db->select_max('id')->where('status', 'live')->get('blog')->row()->id;

		return $this->db->where('id', $max_id)->where('status', 'live')->get('blog')->row();
	}

	function berita_terpopuler(){
		$max_id = $this->db->select('id')->order_by('hits', 'desc')->limit(1)->get('blog')->row()->id;

		return $this->db->where('id', $max_id)->where('status', 'live')->get('blog')->row();
	}

	function berita_baru(){
		$max_id = $this->db->select_max('id')->where('status', 'live')->get('blog')->row()->id;

		return $this->db->where('id !=', $max_id, FALSE)->where('status', 'live')->order_by('id', 'desc')->limit(4)->get('blog')->result();
	}

	function berita_populer(){
		$max_id = $this->db->select('id')->where('status', 'live')->order_by('hits', 'desc')->limit(1)->get('blog')->row()->id;

		return $this->db->where('id !=', $max_id, FALSE)->where('status', 'live')->order_by('hits', 'desc')->limit(4)->get('blog')->result();
	}
}