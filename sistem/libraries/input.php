<?php if(!defined('XP-ENGINE')) exit("You don't have permission to access this file");

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */

class XP_Input{

    function _fetch_from_array($array, $index = '', $xss_clean = FALSE)
	{
		if ( ! isset($array[$index])) {
			return FALSE;
		}
		if ($xss_clean === TRUE) {
            $xp     = getinstance();
            return $this->xss_clean($array[$index]);
		}
		return $array[$index];
	}

	function get($index = '', $xss_clean = FALSE)
	{
		return $this->_fetch_from_array($_GET, $index, $xss_clean);
	}

	function post($index = '', $xss_clean = FALSE)
	{
		return $this->_fetch_from_array($_POST, $index, $xss_clean);
	}
    
	function cookie($index = '', $xss_clean = FALSE)
	{
		return $this->_fetch_from_array($_COOKIE, $index, $xss_clean);
	}
    
    function xss_clean($data)
    {
     
        return strip_tags($data);
    }
}

?>