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
 


class Model_Video extends XP_Model
{
    function __construct() {
        parent::__construct();
        $xp = getInstance();
        $this->user = $xp->user;
    }
 
    function video_list() {
        $id = $this->user->id;
        $this->db->select('*',true);
        $this->db->from('video');
        if($this->user->level !='admin') {
            $this->db->where("xp_id='$id'");
        }
        $this->db->execute();
        return $this->db->fetchAll();
    }
    
    function hapus($id) {
        $this->db->_delete('video');
        $this->db->where("id='$id'");
        $this->db->execute(); 
    }
}
