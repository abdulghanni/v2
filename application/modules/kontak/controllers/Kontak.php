<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends MX_Controller {
    public $data;
    var $module = 'kontak';
    var $title = 'Kontak';
    var $file_name = 'kontak';
    var $table_name = '';
    function __construct()
    {
        parent::__construct();
        $this->load->model('home/home_model', 'home');
    }

    public function index()
    {
        $this->data['list_produk'] = $this->home->list_produk(5)->result();
        $this->data['ci'] = $this;

        $this->data['running_produk'] = $this->home->list_produk(3)->result();
        $this->load->view('frontend/header', $this->data);
        $this->load->view($this->file_name.'/index', $this->data);
        $this->load->view('frontend/footer');
    }
}
