<?php

/**
 * @author Boomer
 * @copyright 2012
 */

class XP_Model extends XP_Controller{
    
    var $db;
    
    function __construct() {
         $this->db = load_class('database');
    }
    
  
}

?>