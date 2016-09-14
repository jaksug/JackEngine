<?php if(!defined('XP-ENGINE')) exit("You don't have permission to access this file");

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */

class XP_Output{
    function cetak($str) {
        $ret = $this->tolink($str);
        $ret = str_replace("\\n",'<br />',$ret);
        $ret = str_replace('\\','',$ret);
        return $ret;
    }
    function tolink($text){
        $str = preg_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)',
                '<a href="\\1">%</a>', $text);
        $text = eregi_replace('(((f|ht){1}tps://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)','<a href="\\1">\\1</a>', $text);
        $text = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)','\\1<a href="http://\\2">\\2</a>', $text);
        $text = eregi_replace('([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})',
        '<a href="mailto:\\1">\\1</a>', $text);
        return $text;
    }
    
    
    function remove_prefix($string){
		$prefix = array("se","memper","mem","meny","meng","men","me","be","per","di","ke","pem","peny","peng"," pe"," ter");
	
		foreach($prefix as $key => $value){
			if(substr($string,0,strlen($value))==$value){
				$hasil = substr($string,strlen($value));
				if(strlen($hasil)>3)
					return $hasil;
			}
		}
		return false;
	}

	function remove_sufix($string){
		$sufix = array("kanlah","ilah","imu","iku","inya","i","lah","kan","an","kah","nya","mu","ku");
	
		foreach($sufix as $key => $value){
			if(substr($string,0-strlen($value))==$value){
				$hasil = substr($string,0,0-strlen($value));
				if(strlen($hasil)>3)
					return $hasil;
			}
		}
		return false;
	}

	function remove_prefix_sufix($string){
		if($this->remove_sufix($string)){
			if($this->remove_prefix($string))
				return $this->remove_prefix($this->remove_sufix($string));
			else
				return $this->remove_sufix($string);
		}
		else{
			return $this->remove_prefix($string);
		}
	}
}

?>