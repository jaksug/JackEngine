<?php if(!defined('XP-ENGINE')) exit(NO_ACCESS);

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */
 
untuk('admin|organisasi|guru');
class Administrasi extends XP_Controller
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    function beranda()
    {
        
        $this->load->view('beranda');
    }
    
    function buat_berita() {
        
        $this->load->view('editor');
        
    }
    
    function router() {
       
        $modul  = $this->input->get('modul',true);
        $method = $this->input->get('method',true);
        $argumen= $this->input->get('arg',true);
        if($method=='' OR !isset($method)) {
            $method = 'beranda';
        }
        if(!isset($argumen) OR $argumen=='' ) {
            $argumen = null;
        }
        if(isset($modul) and $modul!='') {
            $file = 'plugin/'.$this->plugin.'/modul/'.$modul.'.php';
            if(file_exists($file)) {
                include $file;
                $class = 'adm_'.$modul;
                if(class_exists($class)) {
                    $objek = new $class();
                    if(method_exists($class,$method)) {
                        $objek->$method($argumen);
                    } else {
                        $this->error->not_found();
                    }
                } else {
                    $this->error->not_found();
                }
            } else {
                $this->error->not_found();
            }
        } else {
            $this->error->not_found();
        }
    }
    
    function pengaturan(){
        
    }
}