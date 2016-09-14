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
    }
 
    function komen($user_id,$komen,$video_id) {
        $this->db->Masukan('comment',array(array('xp_id'=>$user_id,'eks_id'=>$video_id,'comment'=>$komen,'konten'=>'video')));
    }
    
    function get_komen($video_id) {
        $this->db->select('a.*, b.nama,b.xp_nama,b.xp_id',true);
        $this->db->from('comment a, xpreser b');
        $this->db->where("a.eks_id='$video_id' AND a.xp_id=b.xp_id AND a.konten='video'");
        $this->db->execute();
        return $this->db->fetchAll();
    }
}
