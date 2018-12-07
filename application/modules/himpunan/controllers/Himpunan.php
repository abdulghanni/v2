<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Himpunan extends MX_Controller {
    public $data;
    var $module = 'himpunan';
    var $title = 'Himpunan Peraturan';
    var $file_name = 'himpunan';
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
        redirect(base_url('himpunan/himpunan_perundangan'));
    }

    function produk_hukum(){
        $prod = $this->load->database('produkhukum', true);
        $this->data['categories'] = $prod->limit(10000)->order_by('hirarki', 'asc')->get('categories')->result();
        $this->data['list_produk'] = $this->home->list_produk(5)->result();

        $this->load->library('pagination');
        $this->load->helper('url');
        $this->data['ci'] = $this;
        $params = array();
        $limit_per_page = 6;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->main->produk_hukum_total();
 
        $this->data["results"] = $this->main->get_current_page_records($limit_per_page, $start_index);
             
        $config['base_url'] = base_url() . 'himpunan/produk_hukum';
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
        $this->load->view($this->file_name.'/produk', $this->data);
        $this->load->view('frontend/right-sidebar-prokum', $this->data);
        $this->load->view('frontend/footer');
    }

    function produk_hukum_search(){
        $prod = $this->load->database('produkhukum', true);
        $this->data['categories'] = $prod->limit(10000)->order_by('hirarki', 'asc')->get('categories')->result();
        $this->data['list_produk'] = $this->home->list_produk(5)->result();

        if(isset($_POST['title']))$this->session->set_userdata('sess_title', $_POST['title']);
        if(isset($_POST['category']))$this->session->set_userdata('sess_category', $_POST['category']);
        if(isset($_POST['year']))$this->session->set_userdata('sess_year', $_POST['year']);
        if(isset($_POST['tentang']))$this->session->set_userdata('sess_tentang', $_POST['tentang']);

        $this->load->library('pagination');// load URL helper
        $this->load->helper('url');
        $this->data['ci'] = $this;// init params
        $params = array();
        $limit_per_page = 6;

        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->main->produk_hukum_search_total();
 
        $this->data["results"] = $this->main->get_current_page_records_search($limit_per_page, $start_index);//echo $this->db->
         
        $config['base_url'] = base_url() . 'himpunan/produk_hukum_search/';
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
        $this->load->view($this->file_name.'/produk', $this->data);
        $this->load->view('frontend/right-sidebar-prokum', $this->data);
        $this->load->view('frontend/footer');
    }

    function category_search($category_id){
        $prod = $this->load->database('produkhukum', true);
        $this->data['categories'] = $prod->limit(10000)->order_by('hirarki', 'asc')->get('categories')->result();
        $this->data['list_produk'] = $this->home->list_produk(5)->result();


        $this->load->library('pagination');// load URL helper
        $this->load->helper('url');
        $this->data['ci'] = $this;// init params
        $params = array();
        $limit_per_page = 6;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(4) : 0;
        $total_records = $this->main->produk_hukum_search_category_total($category_id);
        $this->data["results"] = $this->main->get_current_page_records_search_category($limit_per_page, $start_index, $category_id);
             
        $config['base_url'] = base_url() . 'himpunan/category_search/'.$category_id;
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
        $this->load->view($this->file_name.'/produk', $this->data);
        $this->load->view('frontend/right-sidebar-prokum', $this->data);
        $this->load->view('frontend/footer');
    }


    function produkhukum_detail($id = null){
        $prod = $this->load->database('produkhukum', true);
        $this->data['categories'] = $prod->limit(10000)->order_by('hirarki', 'asc')->get('categories')->result();
        $this->data['list_produk'] = $this->home->list_produk(5)->result();

        $this->data['ci'] = $this;
        $this->data['l'] = $this->main->produk_detail($id)->row();
        $this->data['running_produk'] = $this->home->list_produk(3)->result();
        $this->load->view('frontend/header', $this->data);
        $this->load->view($this->file_name.'/produkhukum_detail', $this->data);
        $this->load->view('frontend/right-sidebar-prokum', $this->data);
        $this->load->view('frontend/footer');
    }

    function produk_download($entry_id){
        $this->data['ci'] = $this;
        $entry = $this->main->get_entry( intval($entry_id) );
        $this->main->set_download_hits( intval($entry_id) );
        $filedownload = '/uploads/default/produkhukum/'.$entry->url;
        redirect($filedownload);
    }

    function himpunan_perundangan(){
        $this->data['list_produk'] = $this->home->list_produk(5)->result();
        $this->load->library('pagination');// load URL helper
        $this->load->helper('url');
        $this->data['ci'] = $this;// init params
        $params = array();
        $limit_per_page = 6;
        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->main->himpunan_total();
        
        $this->data["results"] = $this->main->get_himpunan_records($limit_per_page, $start_index);
             
        $config['base_url'] = base_url() . 'himpunan/himpunan_perundangan';
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

        $this->data['categories'] = $this->db->limit(10000)->order_by('entry_order', 'asc')->get('ph_categories')->result();
        $this->data['running_produk'] = $this->home->list_produk(3)->result();
        $this->load->view('frontend/header', $this->data);
        $this->load->view($this->file_name.'/himpunan', $this->data);
        $this->load->view('frontend/right-sidebar-himpunan', $this->data);
        $this->load->view('frontend/footer');
    }

    function himpunan_search(){
        $this->data['categories'] = $this->db->limit(10000)->order_by('entry_order', 'asc')->get('ph_categories')->result();
        $this->data['list_produk'] = $this->home->list_produk(5)->result();

        if(isset($_POST['title']))$this->session->set_userdata('sess_title', $_POST['title']);
        if(isset($_POST['category']))$this->session->set_userdata('sess_category', $_POST['category']);
        if(isset($_POST['year']))$this->session->set_userdata('sess_year', $_POST['year']);
        if(isset($_POST['tentang']))$this->session->set_userdata('sess_tentang', $_POST['tentang']);

        $this->load->library('pagination');// load URL helper
        $this->load->helper('url');
        $this->data['ci'] = $this;// init params
        $params = array();
        $limit_per_page = 6;

        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $total_records = $this->main->himpunan_search_total();
 
        $this->data["results"] = $this->main->himpunan_records_search($limit_per_page, $start_index);//echo $this->db->
         
        $config['base_url'] = base_url() . 'himpunan/himpunan_search/';
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
        $this->load->view($this->file_name.'/produk', $this->data);
        $this->load->view('frontend/right-sidebar-himpunan', $this->data);
        $this->load->view('frontend/footer');
    }

    function himpunan_detail($id = null){
        $this->data['ci'] = $this;
        $this->data['categories'] = $this->db->limit(10000)->order_by('entry_order', 'asc')->get('ph_categories')->result();
        $this->data['list_produk'] = $this->home->list_produk(5)->result();
        $this->data['l'] = $this->main->himpunan_detail($id)->row();
        $this->data['running_produk'] = $this->home->list_produk(3)->result();
        $this->load->view('frontend/header', $this->data);
        $this->load->view($this->file_name.'/himpunan_detail', $this->data);
        $this->load->view('frontend/right-sidebar-himpunan', $this->data);
        $this->load->view('frontend/footer');
    }

    function himpunan_download($entry_id){
        $this->data['ci'] = $this;
        $entry = $this->main->get_entry_himpunan( intval($entry_id) );
        $this->main->set_download_hits_himpunan( intval($entry_id) );
        $filedownload = '/uploads/default/produkhukum/'.$entry->url;
        redirect($filedownload);
    }

    function get_prokum_categories(){
        $prod = $this->load->database('produkhukum', true);
        $data['categories'] = $prod->limit(10000)->order_by('hirarki', 'asc')->get('categories')->result();
        $this->load->view('himpunan/categories', $data);
    }
}
