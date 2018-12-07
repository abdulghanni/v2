<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Perjanjian extends MX_Controller {
    public $data;
    var $module = 'admin';
    var $title = 'Perjanjian Kerjasama';
    var $file_name = 'perjanjian';
    var $table_name = '';
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model($this->module.'/'.$this->file_name.'_model', 'main');
    }

    public function index()
    {
         permission();
        $this->data['ci'] = $this;
        $this->data['data'] = $this->main->index()->result();//print_r($this->data['entries']);
        $this->_render_page('admin/perjanjian/index', $this->data);
    }

    public function add(){
        permission();
        $this->data['ci'] = $this;
        $this->_render_page('admin/perjanjian/add', $this->data);
    }

    public function edit($id){
        permission();

        $this->data['ci'] = $this;
        $this->_render_page('admin/perjanjian/edit', $this->data);
    }

    public function do_add(){
        permission();
        $config['upload_path']          = './files/download';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
                $error = array('error' => $this->upload->display_errors());

                print_r($error);
        }
        else
        {
                $file = array('upload_data' => $this->upload->data());
                $data = array(
                    'description' => $_POST['description'],
                    'url'=>$file['upload_data']['file_name']
                 );
                if($this->db->insert('perjanjian_kerjasama', $data)){
                    redirect(base_url('admin/perjanjian'));
                }

        }
    }
   
    function _render_page($view, $data=null, $render=false)
    {
        $data = (empty($data)) ? $this->data : $data;
        if ( ! $render)
        {
            $this->load->library('template');

                if(in_array($view, array('admin/perjanjian/index')))
                {
                    $this->template->set_layout('default');
                     $this->template->add_plugin_css('datatables.net-bs/css/dataTables.bootstrap.min.css'); 
                    $this->template->add_plugin_css('datatables.net-buttons-bs/css/buttons.bootstrap.min.css');
                     $this->template->add_plugin_js('datatables.net/js/jquery.dataTables.min.js');
                    $this->template->add_plugin_js('datatables.net-bs/js/dataTables.bootstrap.min.js');
                    $this->template->add_plugin_js('datatables.net-buttons/js/dataTables.buttons.min.js');
                }


            if ( ! empty($data['title']))
            {
                $this->template->set_title($data['title']);
            }

            $this->template->load_view($view, $data);
        }
        else
        {
            return $this->load->view($view, $data, TRUE);
        }
    }
}
