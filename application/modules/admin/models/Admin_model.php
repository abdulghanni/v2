<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
	
	function __construct() 
	{
		parent::__construct();
	}
	var $entries_table 		= 'ph_entries'; 	// Entries table
	var $categories_table 	= 'ph_categories'; 	// Category table
	var $sub_categories_table 	= 'produkhukum.ph_subcategories'; 	// Category 

        function index(){
                return $this->db->select('title, filez, img')
                ->from('menu m')
                ->join('users_permission u', 'm.id = u.menu_id')
                ->where('user_id', sessId())
                ->where('filez!=', '#')
                ->where('u.view', 1)
                ->order_by('sort')
                ->get()->result();
        }

	function produk_hukum(){
		$prod = $this->load->database('produkhukum', true);
                return $prod
                ->select('c.description as c_description, e.description as e_description, e.riwayat as e_riwayat')    
                ->select('e.entry_id, e.FK_category_id, e.FK_user_id, e.active, CAST(e.title as SIGNED) as title, e.regyear, e.date_added, e.url')
                ->select('e.hits, e.downloaded, c.category_id, c.name, c.entry_count')

                ->from($this->categories_table.' AS c')
                ->join($this->entries_table.' AS e', 'c.category_id = e.FK_category_id', 'left')
                
                ->order_by('e.regyear desc, title desc')
                ->get();
	}

	function himpunan(){
                return $this->db
                ->select('c.description as c_description, e.description as e_description, ')    
                ->select('e.entry_id, e.FK_category_id, e.FK_user_id, e.active, CAST(e.title as SIGNED) as title, e.regyear, e.date_added, e.url')
                ->select('e.hits, e.downloaded, c.category_id, c.name, c.entry_count')

                ->from($this->categories_table.' AS c')
                ->join($this->entries_table.' AS e', 'c.category_id = e.FK_category_id', 'left')
                
                ->order_by('e.regyear desc, title desc')
                ->get();
	}

        function list_user($id = null){
                if($id != null){
                  return $this->db->where('id', $id)->get('users_login');  
                }else{
                  return $this->db->where('active', 1)->get('users_login');
                }
        }
}