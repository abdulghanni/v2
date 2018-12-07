<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Photo extends MX_Controller {
    public $data;
    var $module = 'admin';
    var $title = 'Galeri Foto';
    var $file_name = 'photo';
    var $table = 'photo_activity_album';
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

        $this->db->select('photo_activity_album.*, photo_activity_category.title as category');
        $this->db->join('photo_activity_category', 'photo_activity_album.category_id=photo_activity_category.id', 'left');
        $this->data['albums'] = $this->db->get('photo_activity_album')->result();
        $this->_render_page($this->module.'/'.$this->file_name.'/index', $this->data);
    }

    function add(){
         permission();
        $this->data['ci'] = $this;
        $this->_render_page($this->module.'/'.$this->file_name.'/add', $this->data);
    }

    function do_add(){
        $config['upload_path'] = './uploads/server/default/photos/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        // $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->load->library('upload',$config);
        $data = array(
                        'category_id' => 1, 
                        'title'=>$_POST['title'],
                        // 'slug'=>$_POST['title'],
                        'description'=>$_POST['description'],
                        'created_on'=>dateNow(),
                        'created_by'=>sessId(),
                        'updated_on'=>dateNow(),
                        'updated_by'=>sessId(),
                        'enable_comments'=>0,
                        'published'=>1
                    );
        $this->db->insert('photo_activity_album', $data);
        $album_id = $this->db->insert_id();
        for ($i=1; $i <=10 ; $i++) { 
            if(!empty($_FILES['filefoto'.$i]['name'])){
                if(!$this->upload->do_upload('filefoto'.$i))
                    $this->upload->display_errors();    
                else
                    $data2 = array(
                                'category_id' => 1, 
                                'album_id' => $album_id, 
                                'title' => $_POST['caption'.$i], 
                                'slug' => $_FILES['filefoto'.$i]['name'], 
                                'photo' => $_FILES['filefoto'.$i]['name'], 
                                'caption' => $_POST['caption'.$i], 
                                'created_on'=>dateNow(),
                                'created_by'=>sessId(),
                                'updated_on'=>dateNow(),
                                'updated_by'=>sessId(),
                                 'enable_comments'=>0,
                                 'published'=>1
                            );

                    $this->db->insert('photo_activity', $data2);
                    // echo $this->db->last_query();
            }
        }

       redirect(base_url('admin/photo'),'refresh');
    }

    function edit($id){
        permission();
        $this->data['ci'] = $this;

        $this->db->select('photo_activity.*');
        $this->db->where('album_id', $id);
        $this->data['photo'] = $this->db->get('photo_activity')->result();
        $this->_render_page($this->module.'/'.$this->file_name.'/edit', $this->data);
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
                    
                    $this->template->add_js($this->module.'/'.$this->file_name.'.js');
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