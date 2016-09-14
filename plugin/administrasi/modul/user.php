<?php if(!defined('XP-ENGINE')) exit(NO_ACCESS);

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */
 
untuk('admin');
class Adm_User extends XP_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model( 'user','users' );
    }
    
    function beranda()
    {
        $data = $this->users->user_list();
       
        $this->load->view('user',$data);
    }
    
    function tambah()
    {
        
    }
    
    function aktivasi() {
        $data = $this->users->belum_aktivasi();
       
        $this->load->view('aktivasi',$data);
    }
    
    function aktifkan($id) {
        $this->database->Update('xpreser','aktivasi','2',"xp_id='$id'");
        //redirect(domain().'administrasi/user/aktivasi');
    }
    
    function hapus($id) {
       $this->database->_delete('xpreser');
       $this->database->where("xp_id='$uid'");
       $this->db->execute();
       redirect(domain().'administrasi/user/');
    }
}