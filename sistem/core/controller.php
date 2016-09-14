<?php if(!defined('XP-ENGINE')) exit("You don't have permission to access this file");

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */

/**
 * Class Controller Aplikasi JackEngine
 * 
 * @package JackEngine 0.1
 * @subpackage JackEngine 
 * @category Libraries
 */
 
class XP_Controller
{
    private static $instance;
    var $zona;
    var $zona_path;
    var $zona_location;
    var $zona_table     = 'zona';
    var $client         = array();
    var $setting        = array();
    var $request        = array();
    var $xp_css         = array();
    var $ajax           = false;
    var $status         = true;
    var $state          = 'site';
    var $wigets         = array();
    var $missing        = array();
    var $loaded         = array();
    var $plugin         = '';
    public $pesan       = '';
    var $url_rewrite    = true;
    public $js          = array();
    public $pipeling    = true;
    public $config      = array();
    public $mobile      = false;
    public $user_agent  = null;
    public $noscript    = false;
    private $autoload   = array(
                                'input',
                                'ekstensi',
                                'database',
                                'router',
                                'Encript',
                                'keamanan',
                                'user',
                                'cache',
                                'ekspresi',
                                'error',
                                'output',
                                'image',
                                'lang',
                                'url',
                                'InputFilter','model'
                                );
    /**
     * Constructor
     */
    function __construct()
    {      
        $this->load = load_class( 'loader',SIS.'/core' );
        $this->setting          = $this->load->config('sistem');
  
        foreach( $this->autoload as $class ) {
            $this->$class = load_class( $class,SISTEM.'/libraries' );
        }  
        self::$instance         = & $this;
        $this->db               = $this->database;
        $this->router->start_routing();
      
        $this->plugin           = $this->request['controller'];
        $this->zona_path        = 'zona/'.$this->zona.'/';
        $this->database->konek();
        $this->lang->cek_bahasa();
        /*
        *-------------------------------------------------------------------------------------
        *  Detect user agent if type client is mobile throw to xp-mobile
        *-------------------------------------------------------------------------------------
        */
        $ua     = load_class('useragent',SISTEM.'/libraries');
        $this->user_agent   = $ua->Parse();
     
        if( $this->user_agent['typ'] == 'Mobile Browser' ) {
            $this->mobile = true;
        }
    }

    public static function &get_instance() {
		return self::$instance;
	}
    
    function widget($name) {
        $this->lang->parse_bahasa('widget_'.$name);
        $load_widget = $this->load->widget( $name );
        if( $load_widget ) {
            $this->register('widget',$name);
            return;
        }
    }
    
    private function register( $type ,$name ) {
        $this->loaded[$type][$name]= true;
    }
    
    function zona() {
        $this->lang->parse_bahasa('zona_'.$this->zona);
        $this->load->controller();
    }
    
    function call_plugin( $nama ) {
        $nama    = strtolower($nama);
        if( $this->zona == $nama ) {
            return $this->get_instance();
        }
        
        if(isset($this->loaded['plugin'],$nama)){
            return ;
        }
        $zone_loc   =  'plugin/' . $nama . '/' . $nama .'.php';
        if( file_exists( $zone_loc )) {
            include $zone_loc;
            if( !class_exists( $nama )) {
                return ;
            }
            
            $obj = new $nama();
          
            return $obj;
        } else {
            echo 'plugin na euweuh';
        }
    }

    
    function _404() {
        header('HTTP/1.0 404 not found', true, 404);
    }
    
    function debug() {
        
    }
    
   
}