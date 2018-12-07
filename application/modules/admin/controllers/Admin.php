<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {
    public $data;
    var $module = 'admin';
    var $title = 'Admin';
    var $file_name = 'admin';
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
        // $this->data['ci'] = $this;
        // $this->data['entries'] = $this->main->produk_hukum()->result();//print_r($this->data['entries']);
        $f = array('sort'=>'order/asc');
        $this->data['menu']=$this->main->index();
        $this->_render_page('admin/index', $this->data);
    }

    function login(){
        $this->load->view('admin/login');
    }

    function do_login(){
        $p = getPost();
        $user = htmlentities($p['email']);
        $password = $p['password'];
        // $password = $p['password_persysh'];
        // print_ag($password);
        $num = getAll('users_login', array('email'=>'where/'.$user, 'password'=>'where/'.$password))->num_rows();
        if($num > 0){
            $this->session->set_userdata('user_login', $user);
            $this->session->set_userdata('user_id', getValue('id', 'users_login', array('email'=>'where/'.$user)));
            $group_id = getValue('group_id', 'users_login', array('email'=>'where/'.$user));
            $this->session->set_userdata('user_group', $group_id);
            redirect(base_url('admin'), 'refresh');
        }else{
            // die('s');
            $this->session->set_flashdata('msg','Login Failed');
            redirect("admin/login", 'refresh');
        }
    }

    function do_logout(){
        $this->session->sess_destroy();
        redirect(base_url('admin'), 'refresh');
    }

    function popup_notif(){
        permission();
        $this->data['ci'] = $this;
        $this->data['notif'] = getValue('notification', 'default_popup_notification', array('id'=>'where/1'));
        $this->data['msg'] = $this->session->flashdata('msg');
        $this->_render_page($this->file_name.'/popup_notif', $this->data);
    }

    function popup_notif_save(){
        $data = array('notification' => $this->input->post('notification'),

         );

        $this->db->where('id', 1)->update('default_popup_notification', $data);
        $this->session->set_flashdata('msg', 'Notifikasi Berhasil Disimpan');
        redirect(base_url('admin/popup_notif'));
    }

    function img_slider(){
        permission();
        $this->data['ci'] = $this;
        $this->data['data'] = getAll('home_slider')->result();
        $this->_render_page($this->file_name.'/img_slider', $this->data);
    }

    function img_slider_add(){
        permission();
        // print_ag($_POST);
        $config['upload_path']          = './uploads/slider';
        $config['allowed_types']        = '*';

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('userfile'))
        {
                // $error = array('error' => $this->upload->display_errors());

                // print_r($error);
            $this->data['ci'] = $this;
            $this->_render_page($this->file_name.'/img_slider_add', $this->data);
        }
        else
        {
                // print_ag('ds');
                $file = array('upload_data' => $this->upload->data());
                $data = array(
                    'img_name'=>$file['upload_data']['file_name']
                 );
                if($this->db->insert('home_slider', $data)){
                    redirect(base_url('admin/img_slider'));
                }

        }
        echo 's';
    }

    function delete_img(){
        $this->db->where('img_name', $_POST['img_name'])
        ->delete('home_slider');
    }

    function profile(){
        permission();
        $this->data['ci'] = $this;
        // $this->data['entries'] = $this->main->produk_hukum()->result();//print_r($this->data['entries']);
        $this->_render_page($this->file_name.'/profile', $this->data);
    }

    function direktori(){
        permission();
        $this->data['ci'] = $this;
        // $this->data['entries'] = $this->main->produk_hukum()->result();//print_r($this->data['entries']);
        $this->_render_page($this->file_name.'/direktori', $this->data);
    }

    function informasi(){
        permission();
        $this->data['ci'] = $this;
        // $this->data['entries'] = $this->main->produk_hukum()->result();//print_r($this->data['entries']);
        $this->_render_page($this->file_name.'/informasi', $this->data);
    }

    function setting(){
        permission();
        $this->data['ci'] = $this;
        $this->data['data'] = $this->main->list_user()->result();//print_r($this->data['entries']);
        $this->_render_page($this->file_name.'/setting', $this->data);
    }

    function user_add(){
        permission();
        if(!empty($_POST)){
            // print_ag($_POST);
            $data = array(
                'username' => $_POST['username_add'],
                'email' => $_POST['email_add'],
                'password' => $_POST['password_add'],
                'group_id' => $_POST['group_id']
            );

            if($this->db->insert('users_login', $data)) redirect('admin/setting');
        }else{
            $this->data['ci'] = $this;
            $this->_render_page($this->file_name.'/user_add', $this->data);
        }
    }

    function user_edit($id){
        permission();
        if(!empty($_POST)){
            // print_ag($_POST);
            $data = array(
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'group_id' => $_POST['group_id']
            );

            if($this->db->where('id', $_POST['id'])->update('users_login', $data)) redirect('admin/setting');
        }else{
            $this->data['ci'] = $this;
            $this->data['id'] = $id;
            $this->data['r'] = $this->main->list_user($id)->row();
            $this->_render_page($this->file_name.'/user_edit', $this->data);
        }
    }

    function user_delete($id){
        permission();
        $data = array(
                'active' => 0
            );

            if($this->db->where('id', $id)->update('users_login', $data)) echo 1;
    }

    function produk_hukum(){
        permission();
        $this->data['ci'] = $this;
        $this->data['entries'] = $this->main->produk_hukum()->result();//print_r($this->data['entries']);
        $this->_render_page($this->file_name.'/produk_hukum', $this->data);
    }

    function produkhukum_add(){
        permission();
        $this->data['ci'] = $this;
        $prod = $this->load->database('produkhukum', true);
        $this->data['categories'] = $prod->limit(10000)->order_by('hirarki', 'asc')->get('categories')->result();
        $this->_render_page($this->file_name.'/produkhukum_add', $this->data);
    }

    function produkhukum_edit($id){
        permission();
        $this->data['ci'] = $this;
        $prod = $this->load->database('produkhukum', true);
        $this->data['categories'] = $prod->limit(10000)->order_by('hirarki', 'asc')->get('categories')->result();
        $this->data['entries'] = $prod->where('entry_id',$id)->get('entries')->row();
        $this->_render_page($this->file_name.'/produkhukum_edit', $this->data);
    }

    function produkhukum_set_active($active_id, $prokum_id)
    {
        if($active_id == 0){
            $active_id = 1;
        }else{
            $active_id = 0;
        }
        $prod = $this->load->database('produkhukum', true);
        if($prod->where('entry_id', $prokum_id)->update('entries', array('active'=>$active_id))){
            redirect(base_url('admin/produk_hukum'));
        }
    }

    public function add_prokum()
    {
        permission();
        $config['upload_path']          = './uploads/default/produkhukum';
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
                // print_ag($file);
                $prod = $this->load->database('produkhukum', true);
                $data = array(
                    'FK_category_id' => $_POST['category_id'],
                    'FK_user_id' => sessId(),
                    'active' => 0,
                    'title' => $_POST['title'],
                    'regyear'=>$_POST['regyear'],
                    'description'=>$_POST['description'],
                    'riwayat'=>$_POST['riwayat'],
                    'url'=>$file['upload_data']['file_name']
                 );
                if($prod->insert('entries', $data)){
                    redirect(base_url('admin/produk_hukum'));
                }

        }
    }

    public function edit_prokum($id)
    {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = '*';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    $file = array('upload_data' => $this->upload->data());
                    $prod = $this->load->database('produkhukum', true);
                    $data = array(
                        'FK_category_id' => $_POST['category_id'],
                        'FK_user_id' => sessId(),
                        'active' => 0,
                        'title' => $_POST['title'],
                        'regyear'=>$_POST['regyear'],
                        'description'=>$_POST['description'],
                        'riwayat'=>$_POST['riwayat'],
                     );
                    if($prod->where('entry_id', $id)->update('entries', $data)){
                        redirect(base_url('admin/produk_hukum'));
                    }
            }
            else
            {
                    $file = array('upload_data' => $this->upload->data());
                    $prod = $this->load->database('produkhukum', true);
                    $data = array(
                        'FK_category_id' => $_POST['category_id'],
                        'FK_user_id' => sessId(),
                        'active' => 0,
                        'title' => $_POST['title'],
                        'regyear'=>$_POST['regyear'],
                        'description'=>$_POST['description'],
                        'riwayat'=>$_POST['riwayat'],
                        'url'=>$file['upload_data']['file_name']
                     );
                    if($prod->where('entry_id', $id)->update('entries', $data)){
                        redirect(base_url('admin/produk_hukum'));
                    }

            }
    }

    public function delete_prokum($id){
    	permission();
    	$prod = $this->load->database('produkhukum', true);
    	 if($prod->where('entry_id', $id)->delete('entries')){
                        redirect(base_url('admin/produk_hukum'));
                    }



    }

    function himpunan(){
        permission();
        $this->data['ci'] = $this;
        $this->data['entries'] = $this->main->himpunan()->result();//print_r($this->data['entries']);
        $this->_render_page($this->file_name.'/himpunan', $this->data);
    }

    function himpunan_add(){
        permission();
        $this->data['ci'] = $this;
        $this->data['categories'] = $this->db->limit(10000)->get('ph_categories')->result();
        $this->_render_page($this->file_name.'/himpunan_add', $this->data);
    }

    function himpunan_edit($id){
        permission();
        $this->data['ci'] = $this;
        $this->data['categories'] = $this->db->limit(10000)->get('ph_categories')->result();
        $this->data['entries'] = $this->db->where('entry_id',$id)->get('ph_entries')->row();
        $this->_render_page($this->file_name.'/himpunan_edit', $this->data);
    }

    public function add_himpunan()
    {
            $config['upload_path']          = './uploads/default/produkhukum';
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
                        'FK_category_id' => $_POST['category_id'],
                        'FK_user_id' => 1,
                        'active' => 0,
                        'title' => $_POST['title'],
                        'regyear'=>$_POST['regyear'],
                        'description'=>$_POST['description'],
                        'url'=>$file['upload_data']['file_name']
                     );
                    if($this->db->insert('ph_entries', $data)){
                        redirect(base_url('admin/himpunan'));
                    }

            }
    }

    public function edit_himpunan($id)
    {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = '*';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                    $error = array('error' => $this->upload->display_errors());

                    $file = array('upload_data' => $this->upload->data());
                    $data = array(
                        'FK_category_id' => $_POST['category_id'],
                        'FK_user_id' => 1,
                        'active' => 0,
                        'title' => $_POST['title'],
                        'regyear'=>$_POST['regyear'],
                        'description'=>$_POST['description']
                     );
                    if($this->db->where('entry_id', $id)->update('entries', $data)){
                        redirect(base_url('admin/himpunan'));
                    }
            }
            else
            {
                    $file = array('upload_data' => $this->upload->data());
                    $data = array(
                        'FK_category_id' => $_POST['category_id'],
                        'FK_user_id' => 1,
                        'active' => 0,
                        'title' => $_POST['title'],
                        'regyear'=>$_POST['regyear'],
                        'description'=>$_POST['description'],
                        'url'=>$file['upload_data']['file_name']
                     );
                    if($this->db->where('entry_id', $id)->update('entries', $data)){
                        redirect(base_url('admin/himpunan'));
                    }

            }
    }

    function photo(){
        permission();
        $this->data['ci'] = $this;

        $this->db->select('photo_activity_album.*, photo_activity_category.title as category');
        $this->db->join('photo_activity_category', 'photo_activity_album.category_id=photo_activity_category.id', 'left');
        $this->data['albums'] = $this->db->get('photo_activity_album')->result();

        // $this->main->produk_hukum()->result();//print_r($this->data['entries']);
        $this->_render_page($this->file_name.'/photo', $this->data);
    }

    function photo_edit($id){
        permission();
        $this->data['ci'] = $this;

        $this->db->select('photo_activity.*');
        $this->db->where('album_id', $id);
        // $this->db->join('photo_activity_category', 'photo_activity_album.category_id=photo_activity_category.id', 'left');
        $this->data['photo'] = $this->db->get('photo_activity')->result();

        // $this->main->produk_hukum()->result();//print_r($this->data['entries']);
        $this->_render_page($this->file_name.'/photo_edit', $this->data);
    }

    
    function _render_page($view, $data=null, $render=false)
    {
        $data = (empty($data)) ? $this->data : $data;
        if ( ! $render)
        {
            $this->load->library('template');

                if(in_array($view, array($this->file_name.'/produk_hukum')))
                {
                    $this->template->set_layout('default');
                     $this->template->add_plugin_css('datatables.net-bs/css/dataTables.bootstrap.min.css'); 
                    $this->template->add_plugin_css('datatables.net-buttons-bs/css/buttons.bootstrap.min.css');
                     $this->template->add_plugin_js('datatables.net/js/jquery.dataTables.min.js');
                    $this->template->add_plugin_js('datatables.net-bs/js/dataTables.bootstrap.min.js');
                    $this->template->add_plugin_js('datatables.net-buttons/js/dataTables.buttons.min.js');
                }elseif(in_array($view, array($this->file_name.'/produkhukum_add')))
                {
                    $this->template->set_layout('default');
                     
                    $this->template->add_plugin_css('select2/select2.min.css');
                    $this->template->add_plugin_js('select2/select2.min.js');
                    $this->template->add_js($this->file_name.'/produkhukum_add.js');
                }elseif(in_array($view, array($this->file_name.'/himpunan')))
                {
                    $this->template->set_layout('default');
                     $this->template->add_plugin_css('datatables.net-bs/css/dataTables.bootstrap.min.css'); 
                    $this->template->add_plugin_css('datatables.net-buttons-bs/css/buttons.bootstrap.min.css');
                     $this->template->add_plugin_js('datatables.net/js/jquery.dataTables.min.js');
                    $this->template->add_plugin_js('datatables.net-bs/js/dataTables.bootstrap.min.js');
                    $this->template->add_plugin_js('datatables.net-buttons/js/dataTables.buttons.min.js');
                }elseif(in_array($view, array($this->file_name.'/himpunan_add')))
                {
                    $this->template->set_layout('default');
                     
                    $this->template->add_plugin_css('select2/select2.min.css');
                    $this->template->add_plugin_js('select2/select2.min.js');
                    $this->template->add_js($this->file_name.'/produkhukum_add.js');
                }elseif(in_array($view, array($this->file_name.'/photo')))
                {
                    $this->template->set_layout('default');
                     
                    $this->template->add_plugin_css('select2/select2.min.css');
                    $this->template->add_plugin_js('select2/select2.min.js');
                    $this->template->add_js($this->file_name.'/produkhukum_add.js');
                }elseif(in_array($view, array($this->file_name.'/popup_notif')))
                {
                    $this->template->set_layout('default');
                     
                    $this->template->add_plugin_js('tinymce/jquery.tinymce.min.js');
                    $this->template->add_plugin_js('tinymce/tinymce.min.js');
                    $this->template->add_js($this->file_name.'/notifikasi.js');
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
