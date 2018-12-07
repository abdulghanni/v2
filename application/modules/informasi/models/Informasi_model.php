<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informasi_model extends CI_Model {
    
    function __construct() 
    {
        parent::__construct();
    }
    var $table      = 'perjanjian_kerjasama';

    public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db
                ->from($this->table)
                ->get();
 
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
        $this->db->limit($limit, $start);
        $this->db
            ->from($this->table)
            ->like('e.description', $this->session->userdata('description_perjanjian'))
            ->get();

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
        return $this->db->count_all($this->table);
    }

    public function get_search_total() 
    {
        $this->db->limit($limit, $start);
        $this->db
            ->from($this->table)
            ->get()
        ->like('e.description', $this->session->userdata('description_perjanjian'));
        $query = $this->db->get()->num_rows();
        return $query;
    }
}
