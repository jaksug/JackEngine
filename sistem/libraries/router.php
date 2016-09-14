<?php if(!defined('XP-ENGINE')) exit("You don't have permission to access this file");

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */

class XP_Router{
    
    private $method_default = 'beranda';
    function start_routing()
    {
        $route_mode = 'http';
        if( $route_mode == 'http' ) {
            $this->http();
        } elseif(isset($_GET['http']) && $_GET['http'] == 1) {
            $this->http();
        } else {
            $this->argv();
        }
    }
    
    function http()
    {
        $xp     = getInstance();
        $suffix = 'z';
        $front_plugin = 'front';
        
        if(isset($_GET['ajax'])) {
            $xp->ajax = true;
        }
        
       
        if(empty($_GET)) {
            
            $xp->request['controller']  = $front_plugin;
            $xp->request['method']      = $this->method_default;
            $xp->request['argument']    = null;
            
        } elseif(isset($_GET['p'])) {
            
            $xp->request['controller']  = 'berita';
            $xp->request['method']      = !empty($_GET['act']) ? $xp->input->get('act',true) : $this->method_default;;
            $xp->request['argument']    = !empty($_GET['id']) ?  $xp->input->get('id',true)  : NULL; 
        
        } elseif(isset($_GET['q'])) {
            
            $xp->request['controller']  = 'cari';
            $xp->request['method']      = $this->method_default;;
            $xp->request['argument']    =  NULL; 
        
        } elseif(isset($_GET['laman'])) {
            
            $xp->request['controller']  = 'berita';
            $xp->request['method']      = !empty($_GET['laman']) ? 'laman' : 'laman_list';;
            $xp->request['argument']    = !empty($_GET['id']) ?  $xp->input->get('id',true)  : NULL; 
            
        } elseif(isset($_GET[$suffix])) {
            
            $xp->request['controller']  =  $xp->input->get($suffix,true);
            $xp->request['method']      = !empty($_GET['act']) ? $xp->input->get('act',true) : $this->method_default;;
            $xp->request['argument']    = !empty($_GET['id']) ?  $xp->input->get('id',true)  : NULL; 
        
        } else {
            
            if(isset($_GET['act'])) {
                
                $xp->request['controller']  = $front_plugin;
                $xp->request['method']      = !empty($_GET['act']) ? $xp->input->get('act',true) : $this->method_default;
                $xp->request['argument']    = null;
            
            } else {
                echo 'halaman gak ada bos';
                exit();
            }
        }
    }
    
    function argv()
    {
        
    }
}