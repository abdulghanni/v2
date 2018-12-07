<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Direktori extends MX_Controller {
    public $data;
    var $module = 'direktori';
    var $title = 'direktori Peraturan';
    var $file_name = 'direktori';
    var $table_name = '';
    function __construct()
    {
        parent::__construct();
        $this->load->model('home/home_model', 'home');
    }

    public function index()
    {
        redirect(base_url('direktori/peraturan_daerah'));
    }

    function peraturan_daerah(){
        $this->data['ci'] = $this;
        $this->data['list_produk'] = $this->home->list_produk(5)->result();
        $this->data['list_produk_populer'] = $this->home->list_produk_populer()->result();
        $this->data['running_produk'] = $this->home->list_produk(3)->result();
        $prod = $this->load->database('produkhukum', true);
        $this->data['categories'] = $prod->limit(10000)->order_by('hirarki', 'asc')->get('categories')->result();
        $this->data['title'] = 'Tata Cara Penyusunan Peraturan Daerah';
        $this->data['content'] = getValue('content', 'pages', array('slug'=>'where/tata-cara-penyusunan-peraturan-daerah'));
        $this->load->view('frontend/header', $this->data);
        $this->load->view($this->file_name.'/peraturan_daerah', $this->data);
        $this->load->view('frontend/footer');
    }

    function peraturan_gubernur(){
        $this->data['ci'] = $this;$this->data['title'] = 'Tata Cara Penyusunan Peraturan Gubernur';
        $this->data['list_produk'] = $this->home->list_produk(5)->result();
        $this->data['list_produk_populer'] = $this->home->list_produk_populer()->result();
        $this->data['running_produk'] = $this->home->list_produk(3)->result();
        $prod = $this->load->database('produkhukum', true);
        $this->data['categories'] = $prod->limit(10000)->order_by('hirarki', 'asc')->get('categories')->result();
        $this->data['content'] = getValue('content', 'pages', array('slug'=>'where/tata-cara-penyusunan-peraturan-gubernur'));
        $this->load->view('frontend/header', $this->data);
        $this->load->view($this->file_name.'/peraturan_gubernur', $this->data);
        $this->load->view('frontend/footer');
    }

    function template_kontrak(){
        $this->data['ci'] = $this;
        $this->data['list_produk'] = $this->home->list_produk(5)->result();
        $this->data['list_produk_populer'] = $this->home->list_produk_populer()->result();
        $this->data['running_produk'] = $this->home->list_produk(3)->result();
        $prod = $this->load->database('produkhukum', true);
        $this->data['categories'] = $prod->limit(10000)->order_by('hirarki', 'asc')->get('categories')->result();
        $this->load->view('frontend/header', $this->data);
        $this->load->view($this->file_name.'/template_kontrak', $this->data);
        $this->load->view('frontend/footer');
    }

    function keputusan_gubernur(){
        $this->data['ci'] = $this;$this->data['title'] = 'Tata Cara Penyusunan Peraturan Daerah';
        $this->data['list_produk'] = $this->home->list_produk(5)->result();
        $this->data['list_produk_populer'] = $this->home->list_produk_populer()->result();
        $this->data['running_produk'] = $this->home->list_produk(3)->result();
        $prod = $this->load->database('produkhukum', true);
        $this->data['categories'] = $prod->limit(10000)->order_by('hirarki', 'asc')->get('categories')->result();
        $this->data['content'] = getValue('content', 'pages', array('slug'=>'where/tata-cara-penyusunan-keputusan-gubernur'));
        $this->load->view('frontend/header', $this->data);
        $this->load->view($this->file_name.'/keputusan_gubernur', $this->data);
        $this->load->view('frontend/footer');
    }
}
