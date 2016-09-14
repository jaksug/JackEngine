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
 


class Model_Admin extends XP_Model
{
    function __construct() {
        parent::__construct();
    }
 
    function user_list() {
        $this->db->select('*',true);
        $this->db->from('xpreser');
        $this->db->execute();
        return $this->db->fetchAll();
    }
    
    function tambah($user_id,$topik,$judul,$isi,$url){
        $this->db->Masukan('thread',array(array('topik'=>$topik,'title'=>$judul,'pos'=>$isi,'waktu'=>time(),'url'=>$url,'user_id'=>$user_id)));
        
    }
    
    
    function reply($user_id,$thread_id,$isi){
        $this->db->Masukan('th_reply',array(array('user_id'=>$user_id,'th_id'=>$thread_id,'reply'=>$isi)));
    }
    
    function get_reply($thread_id){
        $this->db->select('a.* ,b.xp_nama,b.nama');
        $this->db->from('th_reply a,xpreser b');
        $this->db->where("a.th_id='$thread_id' AND a.user_id=b.xp_id");
        $this->db->order('id','ASC');
        $this->db->execute();
        
        return $this->db->fetchAll();
    }
}
