<?php if(!defined('XP-ENGINE')) exit(NO_ACCESS);

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */
 
class Noscript extends XP_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    function beranda($category,$user = '')
    {
        $this->load->view('question');
    }
    
    function Set_Mode() 
    {
        $_SESSION['noscript'] = true;
    }
    
    function beralih()
    {
        setcookie('noscript',false);
        unset(  $_SESSION['noscript'] );
      
    }
}