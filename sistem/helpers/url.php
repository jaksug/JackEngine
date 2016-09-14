<?php if(!defined('XP-ENGINE')) exit("You don't have permission to access this file");

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */

if ( ! function_exists('parse_attributes'))
{
    function parse_attributes( $attributes )
	{
		if (is_string($attributes))
			return ($attributes != '') ? ' '.$attributes : '';
	
		$att = '';
		foreach ($attributes as $key => $val) {
		  $att .= ' ' . $key . '="' . $val . '"';
		}

		if ($javascript == TRUE AND $att != '')
			$att = substr($att, 0, -1);

		return $att;
	}
}
if ( ! function_exists('anchor'))
{   
    function anchor( $zone = '',$method = '', $title = '', $attributes = '' )
	{
        $xp       = getInstance();
		$title    = (string) $title;
        $site_url = $xp->url->create( $zone, $method );
        
		if ($title == '')
			$title = $site_url;

		if ( $attributes != '' )
			 $attributes = parse_attributes($attributes);
		
		return '<a href="'.$site_url.'"'.$attributes.'>'.$title.'</a>';
	}
}
if ( ! function_exists('icon'))
{ 
    function icon( $icon ,$theme = '') {
        if( $theme === 'white') 
            $icon.= " icon-white";
       return '<i class="icon-'.$icon.'"></i>';
    }
  
}
?>