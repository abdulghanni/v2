<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Template Library
 * Handle masterview and views within masterview
 */

class Template {

    private $_ci;

    protected $brand_name = 'Biro Hukum';
    protected $title_separator = ' - ';
    protected $ga_id = FALSE; // UA-XXXXX-X

    protected $layout = 'default';

    protected $title = FALSE;
    protected $description = FALSE;

    protected $metadata = array();

    protected $js = array();
    protected $css = array();
    protected $plugin_js = array();
    protected $plugin_css = array();
    protected $front_js = array();
    protected $front_css = array();

    function __construct()
    {
        $this->_ci =& get_instance();
    }

    /**
     * Set page layout view (1 column, 2 column...)
     *
     * @access  public
     * @param   string  $layout
     * @return  void
     */
    public function set_layout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * Set page title
     *
     * @access  public
     * @param   string  $title
     * @return  void
     */
    public function set_title($title)
    {
        $this->title = $title;
    }

    /**
     * Set page description
     *
     * @access  public
     * @param   string  $description
     * @return  void
     */
    public function set_description($description)
    {
        $this->description = $description;
    }

    /**
     * Add metadata
     *
     * @access  public
     * @param   string  $name
     * @param   string  $content
     * @return  void
     */
    public function add_metadata($name, $content)
    {
        $name = htmlspecialchars(strip_tags($name));
        $content = htmlspecialchars(strip_tags($content));

        $this->metadata[$name] = $content;
    }

    /**
     * Add js file path
     *
     * @access  public
     * @param   string  $js
     * @return  void
     */
    public function add_js($js)
    {
        $this->js[$js] = $js;
    }

    /**
     * Add css file path
     *
     * @access  public
     * @param   string  $css
     * @return  void
     */
    public function add_css($css)
    {
        $this->css[$css] = $css;
    }

    public function front_js($js)
    {
        $this->plugin_js[$js] = $js;
    }

    public function front_css($js)
    {
        $this->plugin_js[$js] = $js;
    }
     /**
     * Add plugin_js file path
     *
     * @access  public
     * @param   string  $js
     * @return  void
     */
    public function add_plugin_js($js)
    {
        $this->plugin_js[$js] = $js;
    }

    /**
     * Add plugin_js file path
     *
     * @access  public
     * @param   string  $js
     * @return  void
     */
    public function add_plugin_css($css)
    {
        $this->plugin_css[$css] = $css;
    }

    /**
     * Load view
     *
     * @access  public
     * @param   string  $view
     * @param   mixed   $data
     * @param   boolean $return
     * @return  void
     */
    public function load_view($view, $data = array(), $return = FALSE)
    {
        // Not include master view on ajax request
        if ($this->_ci->input->is_ajax_request())
        {
            $this->_ci->load->view($view, $data);
            return;
        }

        // Title
        if (empty($this->title))
        {
            $title = $this->brand_name;
        }
        else
        {
            $title = $this->title . $this->title_separator . $this->brand_name;
        }

        // Description
        $description = $this->description;

        // Metadata
        $metadata = array();
        foreach ($this->metadata as $name => $content)
        {
            if (strpos($name, 'og:') === 0)
            {
                $metadata[] = '<meta property="' . $name . '" content="' . $content . '">';
            }
            else
            {
                $metadata[] = '<meta name="' . $name . '" content="' . $content . '">';
            }
        }
        $metadata = implode('', $metadata);

        // Javascript
        $js = array();
        foreach ($this->js as $js_file)
        {
            $js[] = '<script src="' . assets_url('js/' . $js_file) . '"></script>';
        }
        $js = implode('', $js);

        // CSS
        $css = array();
        foreach ($this->css as $css_file)
        {
            $css[] = '<link rel="stylesheet" href="' . assets_url('css/' . $css_file) . '">';
        }
        $css = implode('', $css);

        // frontend js
        $front_js = array();
        foreach ($this->front_js as $front_js_file)
        {
            $front_js[] = '<script src="' . assets_url('front_end/assets/js' . $front_js_file) . '"></script>';
        }
        $front_js = implode('', $front_js);

        // frontend css
        $front_css = array();
        foreach ($this->front_css as $front_css_file)
        {
            $front_css[] = '<script src="' . assets_url('front_end/assets/css' . $front_css_file) . '"></script>';
        }
        $front_css = implode('', $front_css);

        // plugin js
        $plugin_js = array();
        foreach ($this->plugin_js as $plugin_js_file)
        {
            $plugin_js[] = '<script src="' . assets_url('plugins/' . $plugin_js_file) . '"></script>';
        }
        $plugin_js = implode('', $plugin_js);

        // plugin css
        $plugin_css = array();
        foreach ($this->plugin_css as $plugin_css_file)
        {
            $plugin_css[] =  '<link rel="stylesheet" href="' . assets_url('plugins/' . $plugin_css_file) . '">';
        }
        $plugin_css = implode('', $plugin_css);

        $header = $this->_ci->load->view('header', array(), TRUE);
        $sidebar = $this->_ci->load->view('sidebar', array(), TRUE);
        $footer = $this->_ci->load->view('footer', array(), TRUE);
        $main_content = $this->_ci->load->view($view, $data, TRUE);

        $body = $this->_ci->load->view('layout/' . $this->layout, array(
            'header' => $header,
            'sidebar' => $sidebar,
            'footer' => $footer,
            'main_content' => $main_content,
        ), TRUE);

        return $this->_ci->load->view('base_view', array(
            'title' => $title,
            'description' => $description,
            'metadata' => $metadata,
            'front_js' => $front_js,
            'front_css' => $front_css,
            'plugin_js' => $plugin_js,
            'plugin_css' => $plugin_css,
            'js' => $js,
            'css' => $css,
            'body' => $body,
            'ga_id' => $this->ga_id,
        ), $return);
    }
}

/* End of file Template.php */
/* Location: ./application/libraries/Template.php */