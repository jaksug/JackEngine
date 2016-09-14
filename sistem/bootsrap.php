<?php if(!defined('XP-ENGINE')) exit("You don't have permission to access this file");

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */
header("X-FRAME-OPTIONS: DENY");
header('X-Powered-By: jengine');
/* 
*-------------------------------------------------------------------------------------
*   common function for xp-engine
*-------------------------------------------------------------------------------------
*/
$_XP = array();
require_once ( SISTEM . 'core/common' . EXT );
require_once SISTEM . 'core/html-compressor.php';

/* 
*-------------------------------------------------------------------------------------
*   Error reporting
*-------------------------------------------------------------------------------------
*/
Reporting();

/* 
*-------------------------------------------------------------------------------------
*   Removing magic quotes
*-------------------------------------------------------------------------------------
*/
removeMagicQuotes();


/* 
*-------------------------------------------------------------------------------------
*   Loading Controller Class
*-------------------------------------------------------------------------------------
*/
function need_login() {
    global $xp;
	if (!$xp->user->status) {
		redirect('?act=signin');
	}
}

function no_login() {
    global $xp;
    if ($xp->user->status) {
		redirect(domain());
	}
}

function ungkapkan( $str )
{
      $img = array(
                1=>':hmm',
                2=>':muah',
                3=>':hihi',
                4=>':hik',
                5=>'-_-',
                6=>'e',
                7=>'',
                8=>'',
                9=>'',
                10=>'',
                11=>'',
                12=>'',
                13=>'',
                14=>'',
                  28=>'<3',
                );
                foreach($img as $x=>$v){
                    $x = str_replace($v,'<img code="'.$v.'" src="img/emoticon/'.$x.'.gif"/>',$str);
                }
                return $x;
}
/* 
*-------------------------------------------------------------------------------------
*   Loading Controller Class
*-------------------------------------------------------------------------------------
*/
$xp     = load_class('controller', SISTEM.'/core');


function avatar($uid) {
    global $xp;
    return $xp->user->avatar($uid);
}
function iavatar() {
    global $xp;
    return $xp->user->avatar($xp->user->id);
}
function call_plugin($nama) {
    global $xp;
    return $xp->call_plugin($nama);
}
function url_aktif() {
    return 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

function alamat( $plugin ,$method ="",$preffix='z/') {
    $xp = getInstance();
    if( $xp->url_rewrite ) {
        $url = $preffix.$plugin.'/'.$method;
    } else {
        $url = '?z='.$plugin.'&act='.$method;
    }
    return domain().$url;
}

function anchor($plugin ,$method ="",$title) {
    return '<a href="'.alamat($plugin, $method).'">'.$title.'</a>';
}

function butuh_login($level = '*') {
    $xp = getInstance();
    $referer = '?act=signin&ref='.urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	if (!$xp->user->status) {
		redirect($referer);
    } else {
        if($level!= '*' OR $xp->user->level != $level){
   	        redirect(domain());
        }
    }    
}

function untuk($level){
    $xp = getInstance();
    $untuk = explode('|',$level);
    $referer = '?act=signin&ref='.urlencode('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	if (!$xp->user->status) {
		redirect(domain());
    } else {
        if($level!= '*' AND !in_array($xp->user->level,$untuk)){
   	        redirect(domain());
        }
    }   
}

function domain() {
    return basedir();
}

/*
 * -------------------------------------------------------------------------------------
 *  get instance from class XP_Controller
 * -------------------------------------------------------------------------------------
 */
function getInstance() {
    return XP_Controller::get_instance();
}

function input_token() {
    unset($_SESSION['token']);
    $token = $_SESSION['token'] = md5(uniqid());
    return '<input type="hidden" name="token" value="'.$token.'"/>';
}

function cek_token() {
     return true;
    global $xp;
   echo $requeser   = $_REQUEST['token'];
    
    if(!isset($_SESSION['token']) || !isset( $requeser ) || empty($requeser)) {
        echo 'ada masalah';
        return false;
    }
    
    echo '<br />'.$token      = $_SESSION['token'];
    unset($_SESSION['token']);
    
    if( $requeser == $token){
        return true;
    }
    
    return false;
}

function create_token(){
    $token = $_SESSION['token'] = md5(uniqid());
}




$parser = load_class('parser',SIS.'/core');
$parser->get_page_info();

if( $xp->ajax ) {
    if($_GET['ajax'] == '19') {
         $parser->main_content();
    } else {
         $parser->ajax_rander();
    }
} else if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    $xp->ajax =true;
    $parser->ajax_rander();
} else if(isset($_GET['nobody'])){
    $parser->nobody();
}

/*
 *-------------------------------------------------------------------------------------
 *  if http request is  no ajax
 *-------------------------------------------------------------------------------------
 */
else { 
    //randering all ui
    $parser->parse();
    $parser->Rander();
}