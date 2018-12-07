<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hak extends MX_Controller {
    public $data;
    var $module = 'admin/pengaturan';
    var $title = 'Hak Akses';
    var $file_name = 'hak';
    var $table = 'pages';
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
        $this->data['users'] = getAll('users_login')->result();
        $this->_render_page($this->module.'/'.$this->file_name.'/index', $this->data);
    }

    function show_permission($id){
        permission();
        $data['user_id'] = $id;
        $f = array('user_id' => 'where/'.$id);
        $data['data'] = getAll('menu', array('sort'=>'order/asc'));
        $this->load->view($this->module.'/'.$this->file_name.'/table', $data);
    }

    function update_permission($menu_id, $user_id){
        $f = array('menu_id'=>'where/'.$menu_id, 'user_id'=>'where/'.$user_id);
        $num_rows = getAll('users_permission', $f)->num_rows();
        $value = getValue('view', 'users_permission', $f);
        $value = ($value == 1) ? 0 : 1;
        if($num_rows > 0){
            $data = array('view' => $value);
            $this->db->where('menu_id', $menu_id)->where('user_id', $user_id)->update('users_permission', $data);
            echo ($value == 1) ? 'Hak Akses berhasil dihilangkan' : 'Hak Akses berhasil ditambahkan';
        }else{
            $data = array(
                'user_id' => $user_id,
                'menu_id' => $menu_id,
                'view' => 1,
                'created_by'=> sessId(),
                'created_date' => dateNow()
             );

             $this->db->insert('users_permission', $data);
             echo 'Hak Akses berhasil ditambahkan';
        }
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
