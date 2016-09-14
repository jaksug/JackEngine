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
 


class Model_post extends XP_Model
{
    function __construct() {
        parent::__construct();
        
    }
 
    function post_list() {
        $xp = getInstance();
        $uid = $xp->user->id;
        $this->db->select('a.*,b.nama,c.name as kategori');
        $this->db->from('berita a,xpreser b, category c');
        if($xp->user->level != 'admin') {
            $this->db->where("a.user_id=b.xp_id AND c.id=a.kategori_id AND a.user_id='$uid'"); 
        } else {
            $this->db->where("a.user_id=b.xp_id AND c.id=a.kategori_id"); 
        }
        $this->db->execute();
        return $this->db->fetchAll();
    }
    
    function post($id) {
        $this->db->select('a.*');
        $this->db->from('berita a');
        $this->db->where("a.id='$id'");        
        $this->db->execute();
        return $this->db->fetch();
    }
    
    function tambah($user_id,$topik,$judul,$isi,$url){
        $this->db->Masukan('thread',array(array('topik'=>$topik,'title'=>$judul,'pos'=>$isi,'waktu'=>time(),'url'=>$url,'user_id'=>$user_id)));
    }
    
    function kategori(){
        $this->db->select('*',true);
        $this->db->from('category');
             
        $this->db->execute();
        return $this->db->fetchAll();
    }
    

}
