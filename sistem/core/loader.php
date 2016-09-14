<?php if(!defined('XP-ENGINE')) exit("You don't have permission to access this file");

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */

class XP_Loader
{
    var $xp_models          = array();
    var $xp_css             = array();
    var $xp_helpers         = array();
    var $xp_library         = array();
    private $library_path   = 'libraries/';
    var $xp_config          = array();
    private $config_path    = 'config/';
    var $setting            = array();
    var $zona_path          = '';
    public $js              = array();
    
    function __construct() {
         $this->setting = $this->config('sistem');
    }
    
    function controller()
    {
        $xp         = getInstance();
        
        if($xp->state == 'admin') {
            $this->zona_path = 'zone/';
        } else {
             $this->zona_path  = $this->setting['zona_path'];
        }
        
        $name       = $xp->request['controller'];
        $xp->zona   = strtolower($name);
        $method     = $xp->request['method'];
        $argument   = $xp->request['argument'];
        $zona_file  = $this->zona_path . $name. '/'. $name . EXT;

        if( file_exists( $zona_file ) ) {
            include $zona_file;
            if( class_exists($name)) {
                $zona = new $name();
                if( method_exists($zona,$method)) {
                    $xp->status = true;
                    $xp->pesan = 'finished';
                    $zona->$method($argument);
                } else {
                    $xp->status = false;
                    $xp->pesan = 'halaman teu aya';
                    $xp->error->not_found();
                }
                    
            } else {
                $xp->status = false;
                $xp->pesan = 'halaman teu aya';
                $xp->error->_404();
            }
                
        } else {
           $xp->status = false;
           $xp->pesan = 'halaman teu aya';
            $xp->error->_404();
        }
             
    }
    
    function error_404($pesan) {
        $xp = getInstance();
         $xp->status = false;
         $xp->pesan = $pesan;
            $xp->error->_404();
            
    }
    function library($nama ,$preffix = 'XP_')
    {
        if( is_array($nama)) {
            foreach($nama as $Allah){
                $this->library($Allah);
                return;
            }
        }
        
        if($nama === ''){
            return;
        }
        
        if( in_array($nama ,$this->xp_library )){
            return;
        }
        
        $library = SISTEM.'/'.$this->library_path.$nama.EXT;
        
        if(file_exists($library)) {
            require $library;
            $nama_class = $preffix.$nama;
            if(class_exists($nama_class)) {
                $this->xp_library[] = $nama;
                return new $nama_class();
            }
            return false;
        }
        
        return false;
    }
    
    function config($nama)
    {   
        if( is_array($nama) ) {
            foreach($nama as $Allah) {
                $this->config($Allah);
                return;
            }
        }
        
        if($nama == ''){
            return false;
        }
        
        if(in_array($nama,$this->xp_config)){
            return;
        }
        
        $config = SISTEM.'/'.$this->config_path.$nama.'.ini';
        if(file_exists($config)) {
            $this->xp_config[] = $nama;
            return parse_ini_file($config);
        }
        
        return false;
    }
    
    function model($model ,$nama = '', $ext = EXT, $preffix = 'Model_',$db = true)
    {
        if(is_array($nama)) { 
            foreach($model as $otse) {
                $this->model($otse);
                return;
            }
        }
        
        if( $model == '' ) {
            return;
        }
        
        if ( $nama == '' ) {
			$nama = $model;
		}
        
        if( in_array($nama, $this->xp_models, TRUE)) {
			return;
		}
        
        $xp     = getInstance();
        $model  = strtolower($model);
        $plugin = $this->get_calling_class();
     
        if($xp->request['controller'] == 'administrasi') {
            $plugin = 'administrasi';
        }
        $model_location  = $this->zona_path.strtolower($plugin).'/model/'.$model.$ext;;
        
        if(file_exists($model_location)) {
            require $model_location;
            if ( $db !== false && !class_exists('XP_Database') ) {
                $this->library('database');
            }
            
            if( !class_exists('XP_Model')){
                load_class('model');
            }
            $kelas = $preffix.$model;
            if( class_exists($kelas) ) {
                $this->xp_models[] = $nama;
                $xp->$nama = new $kelas();
                return $xp->$nama; 
            }    
        } else {
            $konten = 'Model bernama "<b>'.ucfirst($nama).'</b>" tidak ditemukan pada plugin "<b>'.$xp->plugin.'</b>"';
            $xp->error->ekstensi_error('Model not found ',$konten);
            exit();
            return false;
        }
    } 
    
    function view($nama, $data = '', $data2 = '', $ekstak = true,$ext =EXT)
    {
        
        $xp     = getInstance();
        $plugin = $this->get_calling_class();
        if($xp->request['controller'] == 'administrasi') {
            $plugin = 'administrasi';
        }
        
        $folder = $this->zona_path.strtolower($plugin).'/view/';
        $file   = $folder.$nama.$ext;
        
        if( file_exists($file) ) {
            if($ekstak == true) {
                if(is_array($data)) {
                    extract($data);  
                }
                if(is_array($data2)) {
                    extract($data2);
                }
            }
          
            include $file;
            return true;
        } else {
            $konten = 'View bernama "'.ucfirst($nama).'" tidak ditemukan';
            $xp->error->ekstensi_error('View not found',$konten);
            exit();
             return false;  
        }
    }
    
    function css($nama)
    {   
        $this->xp_css[] = $nama;
    }
    
    function load_css() {
        foreach($this->xp_css as $nama) {
            $link = '<link rel="stylesheet" type="text/css" href="'.$this->setting['base_url'].'media/data/css/'.$nama.'.css"/>';
        }
        return $link;
    }
    
    function Widget($name,$suffix = "W_")
    {
        if($name === '') {
            return false;
        }
        $widget = $this->setting['widget_path'].$name.'/'.$name.EXT;
        if(file_exists($widget)) {
            require $widget;  
            $class_name = 'WID_'.$name ;
            if( class_exists($class_name)) {
                new $class_name;
            }
            return true;
        }
        return false;
    } 
    
    function helper($helpers = array()) {
        foreach($helpers as $helper) {
            if(isset($this->xp_helpers[$helper])) {
                return;
            }
            
            $loacation = SISTEM . 'helpers/'.$helper.EXT;
            
            if( file_exists($loacation) ) {
                include_once $loacation;
                $this->xp_helpers[$helper] = true; 
            } else {
                echo 'helper'.$helper.' not found';
    
            }
        }
    }
    
    function show_helper() {
        return $this->xp_helpers;
    }
    
    function show_library() {
        return $this->xp_library;
    }
    
    function show_model() {
        return $this->xp_models;
    }
    
    function Load_JS( $javascript ) { 
        if( isset( $this->js[$javascript] ) ) {
            return;
        }
        $js_file = domain().'media/js/'.$javascript.'.js';
       
        $this->js[$javascript] = 1;
    }
    
    function Get_Script() {
        $xp = getinstance();
        if( $xp->pipeling ) {
            
        }
    }
    
    function get_calling_class() {

    //get the trace
    $trace = debug_backtrace();

    // Get the class that is asking for who awoke it
    $class = $trace[1]['class'];

    // +1 to i cos we have to account for calling this function
    for ( $i=1; $i<count( $trace ); $i++ ) {
        if ( isset( $trace[$i] ) ) // is it set?
             if ( $class != $trace[$i]['class'] ) // is it a different class
                 return $trace[$i]['class'];
    }
} 
    function view_as_string($nama,$data1="",$data2="",$ekstrak=true) {
        ob_start();
        $this->view($nama,$data1,$data2,$ekstrak);
        $content    = ob_get_contents();
        ob_end_clean();
        return $content;
    }       
}

/* akhir file loader */
/* ./sistem/inti/loader.php */