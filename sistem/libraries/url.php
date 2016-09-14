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

class XP_URL 
{
    public $domain          = '';
    
    public $basedir         = '';
    
    public $zone_param      = 'z';
    
    public $method_param    = 'act';
    
    private $rewrite        = false;
    
    function __construct()
    {
        $this->domain   = domain();
        $this->basedir  = basedir();
    }
    
    function create( $zone , $method )
    {
        if( $this->rewrite ) 
            $url = '';
        else
            if( $zone   == '' )
                if( $method == '' )
                    $url = '';
                else
                    $url    = '?' . $this->method_param . '=' .$method;
            else {
                if( $method == '' )
                    $url = $this->basedir . '?' . $this->zone_param . '='  .$zone;
                else
                    $url = $this->basedir . '?' . $this->zone_param . '='  .$zone . '&' . $this->method_param . '=' . $method;
            }   
            
        return $url ;
    }
}


?>