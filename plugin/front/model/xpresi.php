<?php

/**
 * @author Boomer
 * @copyright 2012
 */

class XP_D_Xpresi{
    private $db;
    function __construct() {
        $this->db = getDB();
    }
    
    function ekspresi() {
        $res = $this->db->rawSelect('SELECT * FROM ekspresi');
        return $res;
    }
}

?>