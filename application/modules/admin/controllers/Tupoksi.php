<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tupoksi extends MX_Controller {
    public $data;
    var $module = 'admin';
    var $title = 'Tupoksi';
    var $file_name = 'tupoksi';
    var $table = 'pages';
    var $content = 'tupoksi';
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        // $this->load->model($this->module.'/'.$this->file_name.'_model', 'main');
    }

    public function index()
    {
        permission();
        $this->data['ci'] = $this;
        $this->data['description'] = getValue('content', $this->table, array('slug'=>'where/'.$this->content));
        $this->data['msg'] = $this->session->flashdata('msg');
        $this->_render_page($this->module.'/'.$this->file_name.'/index', $this->data);
    }

    public function save(){
        $data = array(
            'content' => $this->input->post('description')
        );

        $this->db->where('slug', $this->content)->update($this->table, $data);
        $this->session->set_flashdata('msg', $this->title.' Berhasil Diupdate');
        redirect(base_url($this->module.'/'.$this->file_name));
    }

    function _render_page($view, $data=null, $render=false)
    {
        $data = (empty($data)) ? $this->data : $data;
        if ( ! $render)
        {
            $this->load->library('template');

                if(in_array($view, array($this->module.'/'.$this->file_name.'/index')))
                {
                    $this->template->set_layout('default');
                    
                    $this->template->add_plugin_js('tinymce/jquery.tinymce.min.js');
                    $this->template->add_plugin_js('tinymce/tinymce.min.js');
                    $this->template->add_js('admin/notifikasi.js');
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
