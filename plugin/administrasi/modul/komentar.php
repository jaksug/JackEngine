<?php if(!defined('XP-ENGINE')) exit(NO_ACCESS);

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */
 

class Adm_Komentar extends XP_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('komentar','komen');
    }
    
    function beranda()
    {
       $data = $this->komen->komen_list();
       $this->load->view('komen',$data);
    }
    
   
    
}