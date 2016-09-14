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
 


class Model_User extends XP_Model
{
    function __construct() {
        parent::__construct();
    }
 
    public function profil( $user_name = '', $kategori = '',$selected = '*') 
    {
        $this->db->select( $selected , true );
        $this->db->from('xpreser');
        
        if ( $user_name != '' & $kategori != '') {
            $this->db->where("xp_nama='$user_name' AND tipe='$kategori'");
        } elseif( $user_name != '' ) {
            $this->db->where("xp_nama='$user_name'");
        } elseif( $kategori != '') {
            $this->db->where("tipe='$kategori'");
        }
        
        $this->db->execute();
        return $this->db->fetchAll();
    }
    
    public function tipe( $tipe , $selected = '*' ) 
    {
        $this->db->select( $selected, true );
        $this->db->from('xpreser');
        $this->db->where("tipe ='$tipe'");
        $this->db->order('id','DESC');
        $this->db->execute();
        $this->db->fetchAll();
    }
    
    function curhat($nama,$u_id,$curhat,$waktu) {
        $this->db->masukan('curhat',array(array('id'=>'','nama'=>$nama,'x_id'=>$u_id,'curhatan'=>$curhat,'waktu'=>$waktu)));
    }
    
    function balas_curhat($nama,$u_id,$curhat,$waktu,$untuk,$id) {
        $this->db->masukan('curhat',array(array('id'=>'','nama'=>$nama,'x_id'=>$u_id,'curhatan'=>$curhat,'waktu'=>$waktu,'dibalas'=>'1','balasan'=>$untuk)));
        $this->db->Update('curhat','dibalas','1',"id='$id'");
    }
    
    function hapus($id,$user) {
        $this->db->_delete('curhat');
        $this->db->where("id='$id' AND x_id='$user'");
        $this->db->execute();
    }
}
