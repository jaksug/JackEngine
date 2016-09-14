<?php if(!defined('XP-ENGINE')) exit(NO_ACCESS);

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */


class Cari extends XP_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('xpresi');
        $this->load->helper(array('url'));
    }
    
    function beranda()
    {
        set_page_title('SMKN 1 Gunungputri');
            
    
    $q = strtolower(trim($q));
    $m->query = $q;
  $m->simpulkan();
  $m->view();
  }
    
    
    function guru() 
    {
        set_page_title('Pengajar di SMKN 1 Gunungputri');
        $user   = $this->user;
        $id     = sanitasi($this->input->get('id',true));
        if(!empty( $id )) {
            $data       = $this->database->rawSelect("select * from xpreser x where x.jabatan='guru' and x.xp_id='$id'");
            if(isset($_GET['profil'])) {
                 $data2 = '' ;
            } else {
                $data2  = $this->database->rawSelect("SELECT * FROM berita WHERE user_id='$id' ORDER BY id DESC LIMIT 4");
            }
            $this->load->view('detailguru',$data,$data2);
        } else {
            $data   = $this->database->rawSelect("select * from xpreser x where x.jabatan='guru'");
            $this->load->view('guru',$data);
        }
    }
    
    function logout() {
        session_destroy();
        home();
    }
    
    function signin() {
        no_login();
        $data = array('ref'=>$this->input->get('ref',true));
        $this->load->view('signin',$data);  
    }
    
    function login()
    {
        no_login();
        
        if( !cek_token()) {
           exit( "ilegal akses kaka...!");
            return;
        }
        
        if(isset($_SESSION['tes_log']) && $_SESSION['tes_log']>= 3) {
            $tes_anti_robot = sanitasi(trim(strtolower($this->input->post('tes_robot',true))));
            if( !isset( $tes_anti_robot ) || $tes_anti_robot != $_SESSION['captcha'] ) {
                echo "Masukan karakter untuk memastikan anda bukan robot!";
                return;
            } else {
                unset( $_SESSION['captcha']);
                unset( $_SESSION['tes_log']);
            }
        }
        
        $use_name   = sanitasi_sql( $this->input->post('xp-log-ide',true));
        $use_sandi  = sanitasi_sql( $this->input->post('xp-log-pass',true));
        $referensi  = urldecode(sanitasi_sql( $this->input->post('ref',true)));
        if(!empty($use_name) && !empty($use_sandi)) {
            $user   = $this->user;
            $login = $user->login($use_name,$use_sandi);
            if($login == 'sukses'){
                redirect(domain());
            } elseif($login == 'unactive') {
                redirect(domain().'z/user/aktivasi/');
            } else {
                $_SESSION['tes_log'] = (isset($_SESSION['tes_log'])) ? $_SESSION['tes_log']+1 :1;
                redirect(domain().'?act=signin&error&ref='.$referensi); 
            }
        } else {
            $_SESSION['tes_log'] = (isset($_SESSION['tes_log'])) ? $_SESSION['tes_log']+1 :1;
            redirect(domain().'?act=signin&error&ref='.$referensi); 
        }    
    }
    
    function search() {
        $db     = $this->database;
        $query  = $this->input->post('q',true);
        $secure = sanitasi( $query );
        $data   = $db->rawSelect("SELECT a.id,a.judul,a.isi from berita a where a.isi like '%$secure%' OR a.judul like '%$secure%' LIMIT 5");
        if( $db->jumlah > 0 ) {
            foreach($data as $u) {
                $b_judul    = '<b>' . $query . '</b>';
                $b_isi      = '<b>' . $query . '</b>';
                $f_judul    = str_ireplace($query, $b_judul, $u['judul']);
                $f_isi      = str_ireplace($query, $b_isi, $u['isi']);
                echo "<li><a href='?p=".$u['id']."'>".$fname = cut(35,$f_judul)."...<br />"."</a></li>";
            }   
        } else {
            echo '<li><a >Tidak ditemukan "<b>'.$query.'</b>"</a></li>';
        }
    }
    
    function noscript() {
        $_SESSION['noscript'] = true;
        $this->noscript = true;

        redirect($this->input->get('ref',true));
        
    }
}