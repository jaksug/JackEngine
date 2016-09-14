<?php if(!defined('XP-ENGINE')) exit(NO_ACCESS);

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */
 
class XP_User{
    var $id;
    var $status;
    var $gambar;
    public $user;
    private static $instance;
    public $session_name                = 'xp_user_id';
    public $user_table                  = 'xpreser';
    public $data                       = null;

    private $role                       = null;
    
    
    function __construct()
    {
        self::$instance = & $this;
       
        $this->cek_status();
       
    }
//---------------------------------------------------------------------------------------------------------------    
// berhubungan dengan pengaturan class
//----------------------------------------------------------------------------------------------------------------
    public static function &getinstance()
    {
		return self::$instance;
	}
    
    function sets($data)
    {
        if(is_array($data)){
            foreach($data as $key=>$val){
                $this->set($key,$val);
            }
        }
    }
    
    function set($properti, $value)
    {
        $this->$properti = $value;
    }
//---------------------------------------------------------------------------------------------------------------
// Xpreser
//--------------------------------------------------------------------------------------------------------------- 
    function xpreser($limit = '10',$param = '',$get = '')
    {
        $db     = getDB();
        $data   = $db->Pilih($this->user_table,$param);
        if($db->jumlah > 0){      
            $jml    = count($data);
            for($x = 0; $x <$jml; $x++){
                $info[]= $data[$x];
            }
            return $info;
        }  
        else{
            return false;
        }
    }
    
    function avatar($uid) {
        $xp = getInstance();
        $xp->database->select('aura',true);
        $xp->database->from('xpreser');
        $xp->database->where("xp_id='$uid'");
        $xp->database->execute();
        $data = $xp->database->fetch();
        $gambar = array('.jpg','.jpeg','.png','.gif');
                        
        
        if(file_exists($data['aura']) and $data['aura']!='' AND in_array(ekstensi($data['aura']),$gambar)) {
            $pp = $data['aura'];
        } else {
            $pp = 'media/profil/avatar.jpeg';
        }
                
        return $pp;
    }
    
    function avatar_me(){
        return $this->avatar($this->id);
    }
    
//---------------------------------------------------------------------------------------------------------------
//Autentifikasi 
//---------------------------------------------------------------------------------------------------------------  
    function cek_status()
    {
       session_start();
        if(empty($_SESSION[$this->session_name])){
            $this->status   = false;
        } else {
            $this->status   = true;
            $this->id       = $_SESSION[$this->session_name];
            $this->level    = $_SESSION['role'];
            $this->nama     = $_SESSION['nama'];
            $this->username = $_SESSION['unama'];
        }
    }
    
    function login($username,$pass,$referto)
    {
        $xp = getInstance();
        $db     = $xp->database;
        $enc    = load_class('encript');
        $sandi  = sanitasi_sql(md5(sha1($enc->encrypt($pass,md5('ALLAHUAKBAR')))));
        $username = sanitasi_sql($username);
        $data   = $db->get_one($this->user_table,"(xp_nama='$username' OR email='$username') AND sandi='$sandi'");
        if($db->jumlah>0 AND $data['aktivasi']=='1'){
            $this->user = $data;
            session_start();
            $_SESSION[$this->session_name] = $data['xp_id'];
            $_SESSION['role'] = $data['level'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['unama'] = $data['xp_nama'];
            $db->Update($this->user_table,'ip_terakhir',ip(), "xp_id = '".$data['xp_id']."'"); 
            return 'sukses';
        } elseif($data['aktivasi']=='0') {
            return 'unactive';
        } else {
            return false;
        }
        
    }
    
//---------------------------------------------------------------------------------------------------------------
//Profil pengguna
//---------------------------------------------------------------------------------------------------------------    
    function get_data() 
    {
        if(!empty($this->id)){
            $xp = getInstance();
        $db     = $xp->database;
            $data   = $db->get_one($this->user_table,"xp_id=$this->id");
            if($db->jumlah > 0){
                return $data;
            }  
            else{
                return false;
            }
        } 
        else
            return false;
    }
    
    function edit_data($data,$value)
    {
        $db = getDB();
        if($db->Update($this->user_table,$data,$value,'xp_id',$this->id))
        {
            return true;
        }
    }
    
    function edit_datas($data = array())
    {
        $db = getDB();
        foreach($data as $dat=>$val){
            $this->edit_data($dat,$val);
        }
    }
    
    function profile_foto($uid = '',$size = '35',$attribute = '')
    {
        if($uid == ''){
            $uid = $this->id;
        }
        $data = $this->get_data();
        $aura = $data['aura'];
        if($aura === '') {
            $aura = 'foto/standar.jpg';
        }
        
        return '<img src="'.$aura.'"'.$attribute.'width="'.$size.'px"></img>';
    }
    
    function user_info($uid) {
        $db = getDB();
        return $db->pilih_selektif("a.xp_id,a.nama "," xpreser a ","a.xp_id ='$uid'");
    }

    function my_xp_name(){
        $xp   = getInstance();
        $enc  = $xp->load->library('encript');
        $my_name = $enc->decrypt($xp->input->cookie('xp_name'));
        return $my_name;
    }
    
    function cek_pengguna($nama_pengguna) {
        $db  = getDB();
        $db->rawSelect("SELECT xp_nama FROM $this->user_table WHERE xp_nama='$nama_pengguna'");
        if( $db->jumlah > 0 ) {
            return true;
        }
        return false;
    }
}
    
 