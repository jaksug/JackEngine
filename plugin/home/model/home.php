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
 


class Model_Home extends XP_Model
{
    function __construct() {
        parent::__construct();
    }
 
    function tambah($user_id,$topik,$judul,$isi,$url){
        $this->db->Masukan('thread',array(array('topik'=>$topik,'title'=>$judul,'pos'=>$isi,'waktu'=>time(),'url'=>$url,'user_id'=>$user_id)));
        
    }
    
    function reply($user_id,$thread_id,$isi){
        $this->db->Masukan('th_reply',array(array('user_id'=>$user_id,'th_id'=>$thread_id,'reply'=>$isi)));
    }
    
    function get_reply($thread_id){
        $this->db->select('a.* ,b.xp_nama,b.nama,b.xp_id');
        $this->db->from('th_reply a,xpreser b');
        $this->db->where("a.th_id='$thread_id' AND a.user_id=b.xp_id");
        $this->db->order('id','ASC');
        $this->db->execute();
        
        return $this->db->fetchAll();
    }
    
    function get($url) {
        $this->db->select("a.*,b.url,b.nama as kategori, c.xp_id,c.xp_nama,c.nama,c.level",true);
        $this->db->from("thread a,th_kategori b, xpreser c");
        $this->db->where("a.url='$url' AND b.id=a.topik AND a.user_id=c.xp_id ");
        $this->db->execute();
        return $this->db->fetch();
    }
    
    function count_reply($reply_id) {
        $this->db->select("COUNT(d.id) as jumlah",true);
        $this->db->from("th_reply d");
        $this->db->where(" d.th_id='$reply_id'");
        $this->db->execute();
        return $this->db->fetch();
    }
    
    function populer($offset='0',$per_page='5') {
        $this->db->select("a.*, b.xp_nama,b.nama",true);
        $this->db->from("thread a,xpreser b");
        $this->db->where('a.user_id=b.xp_id');
        $this->db->order("id","DESC");
        $this->db->limit("$offset,$per_page");
        $this->db->execute();
        
        return $this->db->fetchAll();
    }
}
