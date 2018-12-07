<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends MX_Controller {
    public $data;
    var $module = 'galeri';
    var $title = 'Galeri';
    var $file_name = 'galeri';
    var $table_name = '';
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('home/home_model', 'home');
        // $this->load->model('photo_activity_m', 'photo_activity_m');
        // $this->load->model('photo_activity_album_m');
        // $this->load->model('photo_activity_category_m');
    }

    public function index()
    {
        $this->data['ci'] = $this;
        $this->data['list_produk'] = $this->home->list_produk(5)->result();
        $this->data['list_produk_populer'] = $this->home->list_produk_populer()->result();
        $this->data['running_produk'] = $this->home->list_produk(3)->result();
        // $this->data['otheralbum'] = $this->photo_activity_album_m->get_all();
        
         $this->load->view('frontend/header', $this->data);
        $this->load->view($this->file_name.'/index', $this->data);
        $this->load->view('frontend/footer');
    }

    // function detail($id){
    //     $this->data['ci'] = $this;
    //     $this->data['data'] = $this->photo_activity_album_m->get_detail($id);
    //     $this->load->view($this->file_name.'/detail', $this->data);
    // }
}
