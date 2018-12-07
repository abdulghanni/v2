<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends MX_Controller {
    public $data;
    var $module = 'informasi';
    var $title = 'informasi Peraturan';
    var $file_name = 'informasi';
    var $table_name = '';
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model($this->module.'/'.$this->file_name.'_model', 'main');
        $this->load->model('home/home_model', 'home');
    }

    public function index()
    {
        redirect(base_url('informasi/perjanjian_kerjasama'));
    }

    function perjanjian_kerjasama(){
        $this->data['list_produk'] = $this->home->list_produk(5)->result();
        $this->data['list_produk_populer'] = $this->home->list_produk_populer()->result();
        $this->data['ci'] = $this;
        $this->load->library('pagination');
        $this->load->helper('url');
        $params = array();
        $limit_per_page = 6;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->main->get_total();

        $this->data["results"] = $this->main->get_current_page_records($limit_per_page, $start_index);
         
        $config['base_url'] = base_url() . 'informasi/perjanjian_kerjasama';
        $config['total_rows'] = $total_records;
        $config['per_page'] = $limit_per_page;
        $config["uri_segment"] = 3;
         
        $config['reuse_query_string'] = TRUE;
         
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
         
        $config['first_link'] = 'First Page';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
         
        $config['last_link'] = 'Last Page';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
         
        $config['next_link'] = 'Next Page';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = 'Prev Page';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li>';
        $config['cur_tag_close'] = '</li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['attributes']['rel'] = FALSE;
         
        $this->pagination->initialize($config);
             
        $this->data["links"] = $this->pagination->create_links();
        $this->data['running_produk'] = $this->home->list_produk(3)->result();
        $this->load->view('frontend/header', $this->data);
        $this->load->view($this->file_name.'/perjanjian_kerjasama', $this->data);
        $this->load->view('frontend/right-sidebar-perjanjian', $this->data);
        $this->load->view('frontend/footer');

    }
}
