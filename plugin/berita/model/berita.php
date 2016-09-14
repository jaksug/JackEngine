<?php  

if(!defined('XP-ENGINE')) exit('error gan');

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */
 
class Model_Berita extends XP_Model
{
    function __construct() {
        parent::__construct();
    }
    
    public function get_post( $id = '', $url = '', $selected='*',$kategori = '' ) 
    {
        $this->db->select( 'a.id,a.time,a.isi,a.time,a.judul,a.url,a.readed,a.kategori_id,b.name,c.nama,c.aura,c.xp_nama' , true );
        $this->db->from('berita a,category b, xpreser c ');
        if( $id != '' & $url != '') {
            $this->db->where("a.url='$url' AND a.id='$id' AND b.id=a.kategori_id AND a.user_id=c.xp_id AND status='published' AND b.name='$kategori'");
        } elseif( $id != '' ) {
            $this->db->where("a.id='$id' AND b.id=a.kategori_id AND a.user_id=c.xp_id AND status='published'");
        } elseif( $url != '' ) {
            $this->db->where("a.url='$url' AND b.id=a.kategori_id AND a.user_id=c.xp_id AND status='published'");
        } else if($kategori !='') {
           
             $this->db->where("b.name='$kategori' AND b.id=a.kategori_id AND a.user_id=c.xp_id AND status='published'");
        }
        
        $this->db->execute();
        return $this->db->fetchAll();
    }
    
    public function post_from( $from, $order ) 
    {
        $this->db->select( 'a.isi,a.titile,a.url,b.nama,b.xp_nama' , true );
        $this->db->from('berita a, xpreser b');
        $this->db->where("a.user_id=b.xp_id a.user_id='$from' AND status='published'");
        $this->db->order('a.id ', $order );
        $this->db->execute();
        return $this->db->fetchAll();
    }
    
    public function comment_list( $post_id,$order = 'ASC',$limit = '' )
    {
        $this->db->select( 'a.comment,b.nama,b.aura,b.xp_nama' , true );
        $this->db->from(' comment a,xpreser b');
        $this->db->where("a.eks_id='$post_id' AND b.xp_id=a.xp_id ");
        $this->db->order('id ', $order );
        if( $limit != '' ) {
            $this->db->limit( $limit );
        }
        $this->db->execute();
        return $this->db->fetchAll();
    }
    
    function count_comment( $post_id ) {
        $this->db->select( 'COUNT(id)', true );
        $this->db->from('comment');
        $this->db->where("eks_id='$post_id'");
        $this->db->execute();
        return $this->db->fetch();
    }
    
    function populer($jumlah='5') {
        $this->db->select('a.url,a.judul', true );
        $this->db->from('berita a');
        $this->db->where("status='published'");
        $this->db->order('readed','DESC');
        $this->db->limit($jumlah);
        $this->db->execute();
        
        return $this->db->fetchAll();
    }
    
    function by_kategori($kategori){
        $this->db->select( 'a.id,a.time,a.isi,a.time,a.judul,a.url,a.readed,a.kategori_id,b.name,b.keterangan,c.nama,c.aura,c.xp_nama' , true );
        $this->db->from('berita a,category b, xpreser c ');
        $this->db->where("b.name='$kategori' AND b.id=a.kategori_id AND a.user_id=c.xp_id AND status='published'");
        $this->db->order('id','DESC');
        $this->db->execute();
        return $this->db->fetchAll();
    }
    
}
