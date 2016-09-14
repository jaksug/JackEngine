<?php

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright Xpresikan 2012
 * @info Exspresions Builder
 * @package JackEngine 0.1
 * @subpackage JackEngine
 * --------------------------------------------------------------------------------------
 */
 
//setting register global
ini_set('register_global', 0);

//define xp-engine
define('XP-ENGINE', true);

//define path engine
define('BASEPATH', dirname(__FILE__));

define('EXT', '.php');

define('NO_ACCESS', 'tidak diizinkan');

define('SIS' , 'sistem');
//define system engine
define ('SISTEM', BASEPATH . '/' . SIS . '/');

//this constant use for set erreo reporting if set true error reporting is show an then is hide
define('DEVELOVMENT',false);

//Including xp-engine bootstrap

include_once SISTEM . "bootsrap" . EXT;
     
