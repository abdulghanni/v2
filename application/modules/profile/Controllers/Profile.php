<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MX_Controller {
    public $data;
    var $module = 'profile';
    var $title = 'Profile';
    var $file_name = 'profile';
    var $table_name = '';
    function __construct()
    {
        parent::__construct();
        $this->load->model('home/home_model', 'home');
    }

    public function index()
    {
        $this->data['ci'] = $this;
        $this->load->view($this->file_name.'/index', $this->data);
    }

    function Visi_misi(){
        $this->data['ci'] = $this;
        $this->data['title'] = 'Visi Misi';
        $this->data['list_produk'] = $this->home->list_produk(5)->result();
        $this->data['list_produk_populer'] = $this->home->list_produk_populer()->result();
        $this->data['running_produk'] = $this->home->list_produk(3)->result();
        $prod = $this->load->database('produkhukum', true);
        $this->data['categories'] = $prod->limit(10000)->order_by('hirarki', 'asc')->get('categories')->result();
        $this->data['content'] = getValue('content', 'pages', array('slug'=>'where/visi-misi'));
        $this->load->view('frontend/header', $this->data);
        $this->load->view($this->file_name.'/visi_misi', $this->data);
        $this->load->view('frontend/footer');
    }

    function struktur_organisasi(){
        $this->data['ci'] = $this;
        $this->data['title'] = 'Struktur Organisasi';
        $this->data['list_produk'] = $this->home->list_produk(5)->result();
        $this->data['list_produk_populer'] = $this->home->list_produk_populer()->result();
        $this->data['running_produk'] = $this->home->list_produk(3)->result();
        $prod = $this->load->database('produkhukum', true);
        $this->data['categories'] = $prod->limit(10000)->order_by('hirarki', 'asc')->get('categories')->result();
        $this->data['content'] = getValue('content', 'pages', array('slug'=>'where/struktur-organisasi'));
        $this->load->view('frontend/header', $this->data);
        $this->load->view($this->file_name.'/struktur_organisasi', $this->data);
        $this->load->view('frontend/footer');
    }

    function renstra(){
        $this->data['ci'] = $this;
        $this->data['title'] = 'Renstra';
        $this->data['list_produk'] = $this->home->list_produk(5)->result();
        $this->data['list_produk_populer'] = $this->home->list_produk_populer()->result();
        $this->data['running_produk'] = $this->home->list_produk(3)->result();
        $prod = $this->load->database('produkhukum', true);
        $this->data['categories'] = $prod->limit(10000)->order_by('hirarki', 'asc')->get('categories')->result();
        $this->data['content'] = getValue('content', 'pages', array('slug'=>'where/renstra'));
        $this->load->view('frontend/header', $this->data);
        $this->load->view($this->file_name.'/renstra', $this->data);
        $this->load->view('frontend/footer');
    }

    function tupoksi(){
        $this->data['ci'] = $this;
        $this->data['title'] = 'Tupoksi';
        $this->data['list_produk'] = $this->home->list_produk(5)->result();
        $this->data['list_produk_populer'] = $this->home->list_produk_populer()->result();
        $this->data['running_produk'] = $this->home->list_produk(3)->result();
        $prod = $this->load->database('produkhukum', true);
        $this->data['categories'] = $prod->limit(10000)->order_by('hirarki', 'asc')->get('categories')->result();
        $this->data['content'] = getValue('content', 'pages', array('slug'=>'where/tupoksi'));
        $this->load->view('frontend/header', $this->data);
        $this->load->view($this->file_name.'/tupoksi', $this->data);
        $this->load->view('frontend/footer');
    }
}
