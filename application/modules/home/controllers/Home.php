<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
    public $data;
    var $module = 'home';
    var $title = 'Biro Hukum Jakarta';
    var $file_name = 'home';
    var $table_name = '';
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model($this->module.'/'.$this->file_name.'_model', 'main');
    }

    public function index()
    {
        $this->data['ci'] = $this;
        $this->data['slider'] = getAll('home_slider')->result();
        $this->data['running_produk'] = $this->main->list_produk(5)->result();
        $this->data['list_produk'] = $this->main->list_produk(5)->result();
        // $this->data['list_produk_terunduh'] = $this->main->list_produk_terunduh(5)->result();
        $this->data['list_produk_populer'] = $this->main->list_produk_populer()->result();

        $this->data['list_himpunan'] = $this->main->list_himpunan(5)->result();

        $prod = $this->load->database('produkhukum', true);
        $this->data['categories'] = $prod->limit(10000)->order_by('hirarki', 'asc')->get('categories')->result();
        $this->data['popup_notif'] = getValue('notification', 'default_popup_notification', array('id'=>'where/1'));

        $this->data['berita_terbaru'] = $this->main->berita_terbaru();
        $this->data['berita_baru'] = $this->main->berita_baru();

        $this->data['berita_terpopuler'] = $this->main->berita_terpopuler();
        $this->data['berita_populer'] = $this->main->berita_populer();

        $this->load->view('frontend/header', $this->data);
        $this->load->view($this->file_name.'/index', $this->data);
        $this->load->view('frontend/right-sidebar', $this->data);
        $this->load->view('frontend/footer', $this->data);
    }

    function limit_kata($kalimat)
    {
      $words = explode(" ", $kalimat);
      return implode(" ", array_splice($words,0, 10));
    }

    function vote(){
        $id = $this->input->post('id');
        $ip = $this->input->ip_address();

        $ip_existed = $this->db->where('ip_address', $ip)->get('vote')->num_rows();
        $data = array(
            'vote_id' => $id,
            'ip_address' => $ip,
            'date_vote' => date('Y-m-d')
             );
        if($ip_existed == 0){
            $this->db->insert('vote', $data);echo 'Terimakasih Atas Penilaian Anda..';
        }else{
            echo "Anda Sudah Melakukan Penilaian, Silakan Lakukan Lagi Nanti..";
        }
    }

    function get_total_vote($id){
        return $this->db->where('vote_id', $id)->get('vote')->num_rows();
    }

    function get_percentage_vote($id){
        $total = $this->db->count_all('vote');
        $total_id = $this->db->where('vote_id', $id)->get('vote')->num_rows();
        $prc = ($total_id/$total) * 100;
        return number_format($prc,0);
    }


    function _render_page($view, $data=null, $render=false)
    {
        $data = (empty($data)) ? $this->data : $data;
        if ( ! $render)
        {
            $this->load->library('template');

                if(in_array($view, array($this->file_name.'/index')))
                {
                    $this->template->set_layout('default');
                    // $this->template->add_js('home/home.js');
                    // $this->template->add_plugin_js('chartjs2.6/chart.bundle.min.js');
                    // $this->template->add_plugin_js('highchart/highchart.js');
                    // $this->template->add_plugin_js('chartjs2.6/utils.js');
                    // $this->template->add_plugin_js('chartjs2.6/chart.min.js');
                    // $this->template->add_js('home/home2.js');
                    // $this->template->add_plugin_js('Chart.js/dist/Chart.min.js');
                    // $this->template->add_plugin_js('echarts/dist/echarts.min.js');
                    // $this->template->add_plugin_js('jquery-sparkline/dist/jquery.sparkline.min.js');
                    // $this->template->add_plugin_js('Flot/jquery.flot.js');
                    // $this->template->add_plugin_js('Flot/jquery.flot.pie.js');
                    // $this->template->add_plugin_js('Flot/jquery.flot.time.js');
                    // $this->template->add_plugin_js('Flot/jquery.flot.stack.js');
                    // $this->template->add_plugin_js('DateJS/build/date.js');
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
