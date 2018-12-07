<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Berita_model extends CI_Model {
    
    function __construct() 
    {
        parent::__construct();
    }

    var $entries_table      = 'ph_entries';     // Entries table
    var $categories_table   = 'ph_categories';  // Category table
    var $sub_categories_table   = 'ph_subcategories';   // Category 

    function produk_hukum($id = null){
        $prod = $this->load->database('produkhukum', true);
        return $prod
        ->select('c.description as c_description, e.description as e_description, ')    
        ->select('e.entry_id, e.FK_category_id, e.FK_user_id, e.active, CAST(e.title as SIGNED) as title, e.regyear, e.date_added, e.url')
        ->select('e.hits, e.downloaded, c.category_id, c.name, c.entry_count')

        ->from($this->categories_table.' AS c')
        ->join($this->entries_table.' AS e', 'c.category_id = e.FK_category_id', 'left')
        
        ->order_by('e.regyear desc, title desc')
        ->where('e.entry_id', $id)
        ->where('e.active', 0)
        ->get();
    }

    public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db
        ->order_by('id', 'desc')
        ->where('status', 'live')
        ->get('blog');
        //print_r($prod->last_query());
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
        return false;
    }

    public function get_current_page_records_search($limit, $start) 
    {
        $prod = $this->load->database('produkhukum', true);
        $prod->limit($limit, $start);
        $prod
        ->select('c.description as c_description, e.description as e_description, ')    
        ->select('e.entry_id, e.FK_category_id, e.FK_user_id, e.active, CAST(e.title as SIGNED) as title, e.regyear, e.date_added, e.url')
        ->select('e.hits, e.downloaded, c.category_id, c.name, c.entry_count')

        ->from($this->categories_table.' AS c')
        ->join($this->entries_table.' AS e', 'c.category_id = e.FK_category_id', 'left')
        ->where('e.active', 0)
        ->like('e.description', $this->session->userdata('sess_tentang'))
        
        ->order_by('e.regyear desc, title desc');
        if($this->session->userdata('sess_title')!=null){
            $prod->where('e.title', $this->session->userdata('sess_title'));
        }
        if($this->session->userdata('sess_category')!=null){
            $prod->where('c.category_id', $this->session->userdata('sess_category'));
        }
         if($this->session->userdata('sess_year')!=null){
            $prod->where('e.regyear', $this->session->userdata('sess_year'));
        }
        //->join($this->sub_categories_table.' as f', 'f.category_id=e.sub_category_id','left');
        $query = $prod->get();
        // print_r($prod->last_query());
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
        return false;
    }

    public function get_current_page_records_search_category($limit, $start, $category_id) 
    {
        $prod = $this->load->database('produkhukum', true);
        $prod->limit($limit, $start);
        $prod
        ->select('c.description as c_description, e.description as e_description, ')    
        ->select('e.entry_id, e.FK_category_id, e.FK_user_id, e.active, CAST(e.title as SIGNED) as title, e.regyear, e.date_added, e.url')
        ->select('e.hits, e.downloaded, c.category_id, c.name, c.entry_count')

        ->from($this->categories_table.' AS c')
        ->join($this->entries_table.' AS e', 'c.category_id = e.FK_category_id', 'left')
        ->where('e.active', 0)
        ->order_by('e.regyear desc, title desc')
        ->where('c.category_id', $category_id);
        //->join($this->sub_categories_table.' as f', 'f.category_id=e.sub_category_id','left');
        $query = $prod->get();
        // print_r($prod->last_query());
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
        return false;
    }



    public function get_total() 
    {
        return $this->db->count_all('blog');
    }

    public function produk_hukum_search_total() 
    {
        $prod = $this->load->database('produkhukum', true);
        // $prod->limit($limit, $start);
        $prod
        ->select('c.description as c_description, e.description as e_description, ')    
        ->select('e.entry_id, e.FK_category_id, e.FK_user_id, e.active, CAST(e.title as SIGNED) as title, e.regyear, e.date_added, e.url')
        ->select('e.hits, e.downloaded, c.category_id, c.name, c.entry_count')

        ->from($this->categories_table.' AS c')
        ->join($this->entries_table.' AS e', 'c.category_id = e.FK_category_id', 'left')
        ->where('e.active', 0)
        ->like('e.description', $this->session->userdata('sess_tentang'))
        
        ->order_by('e.regyear desc, title desc');
        if($this->session->userdata('sess_title')!=null){
            $prod->where('e.title', $this->session->userdata('sess_title'));
        }
        if($this->session->userdata('sess_category')!=null){
            $prod->where('c.category_id', $this->session->userdata('sess_category'));
        }
         if($this->session->userdata('sess_year')!=null){
            $prod->where('e.regyear', $this->session->userdata('sess_year'));
        }
        //->join($this->sub_categories_table.' as f', 'f.category_id=e.sub_category_id','left');
        $query = $prod->get()->num_rows();
        return $query;
    }

    public function produk_hukum_search_category_total($category_id) 
    {
        $prod = $this->load->database('produkhukum', true);
        return $prod
        ->select('c.description as c_description, e.description as e_description, ')    
        ->select('e.entry_id, e.FK_category_id, e.FK_user_id, e.active, CAST(e.title as SIGNED) as title, e.regyear, e.date_added, e.url')
        ->select('e.hits, e.downloaded, c.category_id, c.name, c.entry_count')

        ->from($this->categories_table.' AS c')
        ->join($this->entries_table.' AS e', 'c.category_id = e.FK_category_id', 'left')
        ->where('c.category_id', $category_id)
        ->where('e.active', 0)
        //->join($this->sub_categories_table.' as f', 'f.category_id=e.sub_category_id','left');
        
        ->order_by('e.regyear desc, title desc')
        ->get()->num_rows();
    }

    function himpunan_detail($id = null){
        return $this->db
        ->select('c.description as c_description, e.description as e_description, ')    
        ->select('e.entry_id, e.FK_category_id, e.FK_user_id, e.active, CAST(e.title as SIGNED) as title, e.regyear, e.date_added, e.url')
        ->select('e.hits, e.downloaded, c.category_id, c.name, c.entry_count')

        ->from($this->categories_table.' AS c')
        ->join($this->entries_table.' AS e', 'c.category_id = e.FK_category_id', 'left')
        
        ->order_by('e.regyear desc, title desc')
        ->where('e.entry_id', $id)
        ->get();
    }

    function produk_detail($id = null){
        $prod = $this->load->database('produkhukum', true);
        return $prod
        ->select('c.description as c_description, e.description as e_description, ')    
        ->select('e.entry_id, e.FK_category_id, e.FK_user_id, e.active, CAST(e.title as SIGNED) as title, e.regyear, e.date_added, e.url,e.riwayat')
        ->select('e.hits, e.downloaded, c.category_id, c.name, c.entry_count')

        ->from($this->categories_table.' AS c')
        ->join($this->entries_table.' AS e', 'c.category_id = e.FK_category_id', 'left')
        ->where('e.active', 0)
        
        ->order_by('e.regyear desc, title desc')
        ->where('e.entry_id', $id)
        ->get();
    }

    public function get_himpunan_records($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db
        ->select('c.description as c_description, e.description as e_description, ')    
        ->select('e.entry_id, e.FK_category_id, e.FK_user_id, e.active, CAST(e.title as SIGNED) as title, e.regyear, e.date_added, e.url')
        ->select('e.hits, e.downloaded, c.category_id, c.name, c.entry_count')

        ->from($this->categories_table.' AS c')
        ->join($this->entries_table.' AS e', 'c.category_id = e.FK_category_id', 'left')
        //->join($this->sub_categories_table.' as f', 'f.category_id=e.sub_category_id','left');
        
        ->order_by('e.regyear desc, title desc')
        ->get();
        //print_r($prod->last_query());
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
        return false;
    }

    public function himpunan_total() 
    {
        return $this->db->count_all("ph_entries");
    }

    function get_entry($id)
    {
        // $this->db->set_dbprefix('');
        $prod = $this->load->database('produkhukum', true);
        return $prod
        ->select('c.description as c_description, e.description as e_description, ')     
        ->select('entry_id, FK_category_id, FK_user_id, active, CAST(title as SIGNED) as title, regyear, date_added, url')
        ->select('e.hits, e.downloaded, c.category_id, c.name, c.entry_count')

        ->from($this->categories_table.' AS c')
        ->join($this->entries_table.' AS e', 'c.category_id = e.FK_category_id', 'left')
        //$this->db->join($this->sub_categories_table.' as f', 'f.category_id=e.sub_category_id','left');
        ->where(array('entry_id' => $id))
        ->order_by('e.regyear desc, title desc')
        ->get()
        // $this->db->set_dbprefix('default_');
        ->row();
    }

    function set_download_hits($id)
    {
         $prod = $this->load->database('produkhukum', true);
        return $prod
        ->query("update {$this->entries_table} set downloaded=downloaded+1 where entry_id=$id");
    }

    function get_entry_himpunan($id)
    {
        // $this->db->set_dbprefix('');
        return $this->db
        ->select('c.description as c_description, e.description as e_description, ')     
        ->select('entry_id, FK_category_id, FK_user_id, active, CAST(title as SIGNED) as title, regyear, date_added, url')
        ->select('e.hits, e.downloaded, c.category_id, c.name, c.entry_count')

        ->from($this->categories_table.' AS c')
        ->join($this->entries_table.' AS e', 'c.category_id = e.FK_category_id', 'left')
        //$this->db->join($this->sub_categories_table.' as f', 'f.category_id=e.sub_category_id','left');
        ->where(array('entry_id' => $id))
        ->order_by('e.regyear desc, title desc')
        ->get()
        // $this->db->set_dbprefix('default_');
        ->row();
    }

    function set_download_hits_himpunan($id)
    {
        return $this->db
        ->query("update {$this->entries_table} set downloaded=downloaded+1 where entry_id=$id");
    }
}