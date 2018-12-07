<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends MX_Controller {
    public $data;
    var $module = 'admin';
    var $title = 'Berita';
    var $file_name = 'berita';
    var $table = 'blog';
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
        $this->data['list'] = $this->db->order_by('id', 'desc')->get('blog')->result();
        $this->data['msg'] = $this->session->flashdata('msg');
        $this->_render_page($this->module.'/'.$this->file_name.'/index', $this->data);
    }

    public function add()
    {
        permission();
        $this->data['ci'] = $this;
        $this->_render_page($this->module.'/'.$this->file_name.'/add', $this->data);
    }

    public function edit($id)
    {
        permission();
        $this->data['ci'] = $this;

        $this->data['r'] = $this->db->where('id', $id)->get('blog')->row();
        $this->_render_page($this->module.'/'.$this->file_name.'/edit', $this->data);
    }

    public function do_add()
    {
        permission();
        $config['upload_path']          = './uploads/berita';
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
                    'created' => dateNow(),
                    'created_by' => sessId(),
                    'title' => $_POST['title'],
                    'category_id' => $_POST['category_id'],
                    'body'=>$_POST['body'],
                    'keywords'=>$_POST['keyword'],
                    'author_id' => sessId(),
                    'created_on' => strtotime(dateNow()),
                    'status'=>$_POST['status'],
                    'blog_image'=>$file['upload_data']['file_name']
                 );
                if($this->db->insert('blog', $data)){
                    redirect(base_url('admin/berita'));
                }

        }
    }

    public function do_edit($id)
    {
        permission();
        
        $data = array(
            'updated' => dateNow(),
            'title' => $_POST['title'],
            'category_id' => $_POST['category_id'],
            'body'=>$_POST['body'],
            'keywords'=>$_POST['keyword'],
            'updated_on' => strtotime(dateNow()),
            'status'=>$_POST['status']
         );
        if($this->db->where('id', $id)->update('blog', $data)){
            redirect(base_url('admin/berita'));
        }
    }

    public function save(){
        $data = array(
            'content' => $this->input->post('description')
        );

        $this->db->where('slug', $this->content)->update($this->table, $data);
        $this->session->set_flashdata('msg', $this->title.' Berhasil Diupdate');
        redirect(base_url($this->module.'/'.$this->file_name));
    }

    function delete($id){
        permission();
        $this->db->where('id', $id)->delete('blog');
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
                    
                    $this->template->set_layout('default');
                    $this->template->add_plugin_css('datatables.net-bs/css/dataTables.bootstrap.min.css'); 
                    $this->template->add_plugin_css('datatables.net-buttons-bs/css/buttons.bootstrap.min.css');
                    $this->template->add_plugin_js('datatables.net/js/jquery.dataTables.min.js');
                    $this->template->add_plugin_js('datatables.net-bs/js/dataTables.bootstrap.min.js');
                    $this->template->add_plugin_js('datatables.net-buttons/js/dataTables.buttons.min.js');
                    $this->template->add_js('admin/berita/index.js');
                }elseif(in_array($view, array($this->module.'/'.$this->file_name.'/add')))
                {
                    $this->template->set_layout('default');
                     
                    $this->template->add_plugin_js('tinymce/jquery.tinymce.min.js');
                    $this->template->add_plugin_js('tinymce/tinymce.min.js');
                    $this->template->add_js('admin/notifikasi.js');
                }elseif(in_array($view, array($this->module.'/'.$this->file_name.'/edit')))
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
