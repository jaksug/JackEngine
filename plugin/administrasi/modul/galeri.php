<?php if(!defined('XP-ENGINE')) exit(NO_ACCESS);

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */
 
untuk('admin');
class Adm_Galeri extends XP_Controller
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    function beranda()
    {
        
    }
    
    function buat_berita() {
        $this->load->view('editor');
        
    }
    
    function get_all(){
        $dir = "media/images/";
$ext_boleh = "jpg|jpeg|gif|png";

if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        $images = array();

        while (($file = readdir($dh)) !== false) {
            if (!is_dir($dir.$file)) {
                $filex = explode(".",$file);
                $ext    = end($filex);
                $exts =explode("|",$ext_boleh);
                if(in_array($ext,$exts)){
                    $images[]['link'] = $dir.$file;
                } elseif($file = ".htaccess"){
                    continue;
                } else {
                    unlink($dir.$file);
                }
            }
        }

        closedir($dh);

        echo json_encode($images);
    }
}
    }
    
    
}