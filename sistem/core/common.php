<?php if(!defined('XP-ENGINE')) exit(NO_ACCESS);

/**
 * This file have many function for all node in xp-engine
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */

if( function_exists( 'date_default_timezone_set' ) ) {
    date_default_timezone_set('Asia/Jakarta');
}

function Reporting() {
    if( DEVELOVMENT == true ) {
        error_reporting(E_ALL);
        ini_set('display_errors','On');
    } else {
        error_reporting(E_ALL);
        ini_set('display_errors','Off');
        ini_set('log_errors', 'On');
        ini_set('error_log', BASEPATH.'/tmp/logs/error.log');
    }
}

function script_time() {
	global $_XP;
	$start     = $_XP['start'];
	$end       = microtime(TRUE);
	$exe_time  = round($end - $start, 8);
	return $exe_time;
}

function show_script_time() {
    echo 'Rendered in ' . script_time() . ' seconds';
}

function get_memory_usage() {
	$usage_kb = memory_get_usage() / 1024;	// 
	$usage_kb = round($usage_kb, 2);
	return $usage_kb;
}

function remove_invisible_characters($str) {
    static $non_displayables;
    if ( ! isset($non_displayables)) {
        $non_displayables = array( '/%0[0-8bcef]/','/%1[0-9a-f]/','/[\x00-\x08]/','/\x0b/', '/\x0c/','/[\x0e-\x1f]/'			
								);
    } do {
        $cleaned    = $str;
        $str        = preg_replace($non_displayables, '', $str);
    } while ($cleaned != $str);
    return $str;
}

function stripSlashesDeep($value) {
	$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
    return $value;
}

function removeMagicQuotes() {
    if ( get_magic_quotes_gpc() ) {
        $_GET    = stripSlashesDeep($_GET   );
        $_POST   = stripSlashesDeep($_POST  );
        $_COOKIE = stripSlashesDeep($_COOKIE);
    }
}

function load_class($kelas, $direktori = '', $prefix = 'XP_'){
    static $_kelas = array();
    
    $nama   = $prefix.$kelas;
    if (isset( $_kelas[$kelas] )) 
        return $_kelas[$kelas];
        
    if($direktori === '')
        $direktori  = SISTEM.'/libraries';
        
    $path_file      = $direktori.'/'.$kelas.EXT;
    
    if( file_exists($path_file )) {
        $nama       = $prefix.$kelas;
        if( class_exists($nama) === FALSE ) {
            require($path_file);
        }
    } else {
        throw new Exception ("Class '{$kelas}' not found");
    }
  
    if($nama === FALSE) {
        throw new Exception ("Library'{$kelas}' not found");
    }
        
    $_kelas[$kelas] = new $nama();
    
    return $_kelas[$kelas]; 
}

function basedir() {
    return 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/';
}

function current_url(){
    return str_replace(basedir(),'','http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ;
}

function redirect($location) {
    header('location:'.$location);
}

function home() {
    global $_XP;
    redirect(basedir());
}

function set_page_title($title){
    global $_XP;
    if(empty($title)) {
          $_XP['title'] = 'SMKN 1 GUNUNGPUTRI';
          return;
    }
    $_XP['title'] = $title;
}

function get_page_title(){
    global $_XP;
    if(empty($_XP['title'])) {
        return 'SMKN 1 GUNUNGPUTRI';
    } 
    
    return $_XP['title'];
}

function ip() 
{ 
    if (isset($_SERVER)) {
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        elseif (isset($_SERVER["HTTP_CLIENT_IP"]))
            $ip = $_SERVER["HTTP_CLIENT_IP"];
		else
			$ip = $_SERVER["REMOTE_ADDR"];
    }

    elseif (getenv('HTTP_X_FORWARDED_FOR'))
        $ip = getenv('HTTP_X_FORWARDED_FOR');

    elseif (getenv('HTTP_CLIENT_IP'))
        $ip = getenv('HTTP_CLIENT_IP');

    else
		$ip = getenv('REMOTE_ADDR');
        
	return $ip;
} 

function random_str( $length = 8 ) 
{
	$string = '=-0987654321!@#%^&*()_+][poiuytrewqasdfghjkl;/.,mnbvcxzQWERTYUIOP{}|:LKJHGFDSAZXCVBNM<>?';
	$str_len = strlen($string) - 1;
	$out = '';
    
	for ($i=0; $i<$length; $i++) {
		$pos = mt_rand(0, $str_len);
		$out .= $string[$pos];
	}
    
	return $out;
}

function parseurl($msg) 
{
        $search_array = array(
            "/([^\]]+)(http:\/\/.+)([\r\n\s]+)/isU"
		);
		$replace_array = array(
            "\\1[url]\\2[/url]\\3"
		);
		return preg_replace($search_array, $replace_array, $msg.' ');
}

function checkPath ($path) 
{
	if (!is_dir ($path)) {
		echo ("Directory does not exist: ".$path."");		
		return false;
	}
	else {
		if (!is_writable ($path)) {
			$tmpFilename = time ().".tmp";			
			$chmodList = array (0755, 0775, 0777);
			foreach ($chmodList as $chmod) {
				if (chmod($path, $chmod)) {
					if ($fh = fopen ($path."/".$tmpFilename, "w+")) {
						unlink ($path."/".$tmpFilename);
						return true;
					}	
				}			
			}			
			echo ("Directory is not writable: ".$path."");		
			return false;
		}
	}	
	return true;
}

function cekFile($filename, $fExists=false) {
	if (!file_exists ($filename)) {
		echo ("File does not exist: ".$filename."");		
		return false;
	}
	
	return true;
}

function distinct_array($arr) {
    rsort($arr);
    reset($arr);
    $newarr = array();
    $i      = 0;
    $element= current($arr);

    for ($n = 0; $n < sizeof($arr); $n++) {
		if (next($arr) != $element) {
			$newarr[$i] = $element;
			$element = current($arr);
			$i++;
		}
    }
    
	return $newarr;
}

function get_dir_contents($dir) 
{
	$contents = Array();
	if ($handle = opendir($dir)) {
		while (false !== ($file = readdir($handle))) {
			if ($file != "." && $file != "..") {
				$contents[] = $file;
			}
		}
		closedir($handle);
	}
	return $contents;
}

function is_email($email) {
    if(preg_match("/\w+@\w+\.[a-zA-Z]+/i",$email)) {
        return true;
    }
    return false;
}

function cut($string_len , $subject)
{
    if(strlen($subject)>$string_len){
        $subject = substr($subject,0,$string_len);
        $subject = substr($subject,0,strrpos($subject," "));
    }
    return $subject;
}


$register_globals = (bool) ini_get('register_gobals');
if ($register_globals == TRUE) { define("REGISTER_GLOBALS", 1); } else { define("REGISTER_GLOBALS", 0); }


$magic_quotes = (bool) ini_get('magic_quotes_gpc');
if ($magic_quotes == TRUE) { define("MAGIC_QUOTES", 1); } else { define("MAGIC_QUOTES", 0); }

function nice_addslashes($string) {
    if(MAGIC_QUOTES)
        return $string;
    else
        return addslashes($string);
}

function sanitasi_sql($string, $min='', $max='') {
  return $string;
}

function sanitasi($str) {
    return sanitasi_sql($str);
}

function time_format_indo( $time ) {
    $waktu  = explode('-',$time);
    $tanggal= $waktu[0];
    $tahun  = $waktu[2];
    $daftar = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
    $bulan  = $daftar[$waktu[1]-1];
    return $tanggal.' '.$bulan.' '.$tahun;
}

function config( $key ) {
    $config = SIS.'/config.ini';
    if(!file_exists( $config )) {
        redirect(basedir().'install/');
    }
    $data = parse_ini_file($config);
    if( array_key_exists( $key, $data ) ) {
        return $data[$key];
    }
}

function ekstensi($filename)
	{
		$x = explode('.', $filename);
		return '.'.end($x);
	}