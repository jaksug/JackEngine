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
 
class User extends XP_Controller 
{
    //daftar masalah saat autentifikasi
    var $masalah = array();
    
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('html','form'));
        $this->load->model( 'user','pengguna' );
    }
    
    //front page Xpresikan
    function beranda() {
        $data = array();
        if(!$this->user->status) {
            $this->load->view('signin',$data);
            return;
        } else {
            echo 'wkwk';
        }
    }
    
    function tipe()
    {
        $kategori   = $this->input->get('id',true);
        $data   = $this->pengguna->profil( '', $kategori, 'nama,xp_nama');
        print_r($data);
    }
    
    function profil()
    {
        $user_id    = $this->input->get('id',true);
        $data       = $this->pengguna->profil($user_id);
 
        if( count( $data ) < 1 ) {
            echo 'user yang anda maksud tidak ada';
            return;
        }
        if($data[0]['level'] == 'admin') {
            echo 'user yang anda maksud tidak ada';
            return;
        } else {
            $this->load->view('profil',$data[0]);
        $this->get_berita($user_id);
        $this->load->view('kanan',$data[0]);
        }
        

        
    }
    
    function get_berita( $user )
    {
        set_page_title('Berita SMKN 1 Gunungputri');
        $page_news  = (int)sanitasi($this->input->get('page',true));
        $per_page   = 5;
        if(!isset($page_news) OR empty($page_news))
            $page   = 1; 
        else
            $page   = $page_news;
  
        $news_cache_id = 'berita_'.$page_news.$user;
        
        if($this->cache->valid($news_cache_id)){
            $data = $this->cache->get($news_cache_id);
        } else {
            $offset     = ($page - 1 ) * $per_page;
            $sql_query  = "SELECT a.id,a.url,a.pos,a.waktu,a.title,b.nama,b.xp_id,b.xp_nama FROM thread a,xpreser b WHERE ";
           
           $sql_query  .= ' b.xp_id=a.user_id';
            
            
            $sql_query .= " AND a.user_id=b.xp_id AND b.xp_nama='$user'  ORDER BY a.id DESC LIMIT $offset,$per_page";
      
            $this->cache->hapus($news_cache_id);
            $data       = $this->database->rawSelect( $sql_query );
            if($this->database->jumlah > 0) {
                $this->cache->set($news_cache_id,$data);
            }
        }
        
        $id         = sanitasi($this->input->get('p',true));
        
        if(!empty($id)) {
            $this->show_post($id);
            return;
        }
        if(count($data)> 0 ) {
            $user_id = $data[0]['xp_id'];
        
        $count      = $this->database->rawSelect("SELECT COUNT(id) FROM berita WHERE user_id='$user_id' and status='published'");
        
        $jumlah     = ceil($count[0]['COUNT(id)'] / $per_page);
        } else {
            $jumlah = 0;
        }
        
        $page_info  = array('page'=>$page,'jumlah'=>$jumlah);
        $this->load->view('berita',$data,$page_info);
        
        
        return;
    }
    
    function login() 
    {
        no_login();
        $data = array('ref'=>$this->input->get('ref',true));
        $this->load->view('signin',$data);  
    }
    
    function signin()
    {
        no_login();
        if( !cek_token()) {
            exit( "permintaan anda tidak valid");
            return;
        }
        $use_name   = sanitasi_sql( $this->input->post('xp-log-ide',true));
        $use_sandi  = sanitasi_sql( $this->input->post('xp-log-pass',true));
        $referensi  = urldecode(sanitasi_sql( $this->input->get('ref',true)));
       
        if(!empty($use_name) && !empty($use_sandi)) {
            $user   = $this->user;
            $login = $user->login($use_name,$use_sandi);
            if($login == true){
                redirect(domain());
            } elseif($login == 'unactive') {
                redirect(domain().'z/user/aktivasi/');
            } else {
                redirect(domain());
            } 
        } else {
            $_SESSION['tes_log'] = (isset($_SESSION['tes_log'])) ? $_SESSION['tes_log']+1 :1;
            redirect(alamat('user','login')); 
        }     
    }
    
    function logerror() 
    {
        $data = array();   
        $this->load->helper(array('form'));
        $this->load->view('no_login',$data); 
    }
    
    function logout() {
        session_destroy();
        home();
    }
    
    private function output_error() {
        return json_encode(array('error'=>$this->error));
    }
    
    function daftar()
    {
        $nama_c     = $this->input->post('xp_f_name',true);
        $email_c    = $this->input->post('xp_surel',true);
        $pass_c     = $this->input->post('xp_sandi',true);
        $status     = $this->input->post('status',true);
       
        if(!empty($nama_c) && !empty($email_c) && !empty($pass_c) && !empty($status) ){
            $user   = $this->user;
            if(true) {
              
                $enc    = load_class('encript');
                $sandi  = sanitasi_sql(md5(sha1($enc->encrypt($pass_c,md5('ALLAHUAKBAR')))));
                $id     = rand();
                $data   = array(
                      'xp_id'=>'',
                      'nama'=>sanitasi_sql($nama_c),
                      'xp_nama'=>sanitasi_sql($nama_c),
                      'daftar'=>time(),
                      'sandi'=>sanitasi_sql($sandi),
        
                      'level'=>'user',
                      'tipe'=>$status,
                      'negara'=>'id',
                      'aura'=>'standar',
                      'bahasa'=> 'id',
                      'aktivasi'=>'0'
                      );
                $this->db->Masukan('xpreser',array($data));
                echo '<div class="thumbnail"> Anda harus mengubungi Staf TI SMKN 1 Gunung Putri </div>';
            }
        } else {
            $this->masalah[] = 'Tolong isi semua field';
        }
        
      
    }
    
    function signup() {
        $this->load->view('register');
    }
    
    function curhat()
    {
        butuh_login();
        $user   = $this->user->id;
        $curhat = $this->input->post('x-curhat',true);
        $user_name = $this->user->nama;
        if($this->input->post('rahasiakan',true)) {
            $user_name = 'Anonim';
        }
         if(!empty($curhat)) {
            $this->pengguna->curhat($user_name,$user,$curhat,time());
           
        }
       
        if($this->ajax) {
            
            $x =  '<div class=" cur-dat">
            <a href="'.domain().'">
            <img title="'.$this->user->nama.'" width="45" src="'.domain().'media/img/avatar.jpeg"/> </a>
            <div class="curhatan"><b>'.$this->user->nama."</b><br />".$curhat.'</div></div>';
             echo json_encode($x);
        } else {
            
        }
        
        
        
        home();
    }
    function balas($id){
        butuh_login();
        $balasan = $this->input->post('balasan',true);
        echo $curhat_id = $this->input->post('id',true);
        $this->pengguna->balas_curhat($this->user->nama,$this->user->id,$balasan,time(),$id,$curhat_id);
        
    }
    
    function curhat_hapus($id) {
        butuh_login();
        $this->pengguna->hapus($id,$this->user->id);
    }
    
    function pengaturan($case){
        $this->user->avatar($this->user->id);
          if(!$this->user->status){
            redirect(domain());
          }
          $data = $this->pengguna->profil($this->user->username);
          if($case==null){   
                $this->load->view('pengaturan',$data[0]);
          } elseif($case == 'password') {
                 $this->load->view('pengaturan_pass',$data[0]);
          } elseif($case == 'profil') {
                 $this->load->view('pengaturan_profil',$data[0]);
          } else {
            $this->error->_404();
          }
    }
    
    function perbarui($case){
          if(!$this->user->status){
            redirect(domain());
          }
          echo $uid = $this->user->id;
          $data = $this->pengguna->profil($this->user->username);
          if($case==null){   
                $nama  = $this->input->post('nama',true);
                $unama = $this->input->post('unama',true);
                $email = $this->input->post('email',true);
                if(isset($nama) and !empty($nama) AND isset($unama) AND !empty($unama) AND isset($email) AND !empty($email)) {
                    $query = "nama='$nama',xp_nama='$unama',email='$email' WHERE xp_id='$uid'";
                }
          } elseif($case == 'password') {
                $sandi  = $this->input->post('pass',true);
                $ulangi = $this->input->post('re-pass',true);
                $lama   = $this->input->post('old-pass',true);
                if( $sandi != $ulangi ) {
                    return;
                } elseif(isset($sandi) and !empty($sandi) AND isset($ulangi) AND !empty($ulangi) AND isset($lama) AND !empty($lama)) {
                    $query = "sandi='$sandi' where xp_id='$uid' AND sandi='$sandi'";
                }
          } elseif($case == 'profil') {
                $foto = false;
                if($_FILES['foto']['error'] == '0') {
                    $upload = load_class('upload');
                    $gambar = load_class('image');
                    if(file_exists($data[0]['aura'])) {
                        copy($data[0]['aura'],$data[0]['aura'].'.tpm');
                        unlink($data[0]['aura']);
                    }
                    $upload->upload('foto','media/profil',"pp_$uid");
                    $url    = $upload->file_lokasi;
                    $ext = $upload->get_ekstensi($url);
                    if($gambar->cek($url)) {
                        $gambar->potong('100','100',$url,str_replace('.','',$ext),"media/profil/pp_$uid".$ext);          
                        $query  = "aura='$url'";
                        $foto   = true;
                    } else {
                        if(file_exists($data[0]['aura'].'.tpm')) {
                            rename($data[0]['aura'].'.tpm',$data[0]['aura']);
                        }
                    }
                } 
               
                $tentang  = $this->input->post('tentang',true);
                if(isset($tentang) AND $tentang !='' ) {
                    if($foto) {
                        $query.=",tentang='$tentang'";
                    } else {
                        $query ="tentang='$tentang'";
                    }
                    
                   
                } elseif(!$foto) {
                    return false;
                }
               
               $query .= " WHERE xp_id='$uid'";
          } else {
            $this->error->_404();
            return;
          }
          
          $this->database->rawQuery("UPDATE xpreser SET $query");
          
          
    }
    
    function aktivasi(){
        echo 'akun anda belum aktivasi, silahkan hubungi guru bk';
    }        
}
