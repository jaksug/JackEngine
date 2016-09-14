<?php  

if(!defined('XP-ENGINE')) exit(NO_ACCESS);

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */

class XP_Lang {
    public $bahasa          = null;
    private $bahasa_standar = 'ID';
    private $path           = 'sistem/bahasa/';
    public $error           = array();
    public $data            = array();
    private $spesial_char   = array(
                                    "SITE"=>'Xpresikan'
                                    );
    function cek_bahasa() {
        $xp     = getInstance();
        $kuki   = $xp->input->cookie('bahasa',true);
        if(!isset($kuki)) {
            $user = $xp->user;
            if($user->status) {
                $db = getDB();
                $this->bahasa = $db->rawSelect("SELECT bahasa FROM $user->user_table WHERE xp_id='$user->id'");
            }
            else {
                $this->bahasa = $this->bahasa_standar;
            }
        }
        else {
            $this->bahasa = $this->bahasa_standar;
        }
    }
    
    /**
     * Memparsing file bahasa
     * @param string
     * @return array
     */
    function parse_bahasa($nama , $client = 'controller') {
        $xp = getInstance();
        $file = $this->path.$this->bahasa.'/'.$nama.'.ini';
        if(file_exists($file)) {
            $this->data = parse_ini_file($file);
            return;
        }
        $this->missing[] = 'cannot load lang '.$file. 'in' . __FILE__.'line'. __LINE__;
    }
    
    /**
     * Set output from Language Class
     * @param string
     * @return string
     */
    function _($key) {
        $terjemah = $this->data[$key];  
        if( preg_match( '/{(.*)}/',$terjemah,$data ) ) {
            array_search($data[1],$this->spesial_char);
                $key    = $data[1];
                $value  = $this->spesial_char[$key];
            return preg_replace('/-'.$key.'-/',$value,$terjemah);          
        } 
        
        return $terjemah;
    }
}


?>