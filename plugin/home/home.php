<?php if(!defined('XP-ENGINE')) exit(NO_ACCESS);

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */
 


class Home extends XP_Controller
{
    private $th_cahe_id = '';
    
    function __construct()
    {
        parent::__construct();
          $this->load->model( 'home','thread' );
    }
    
    function beranda($category,$user = '')
    {
        set_page_title('Rumah SMKN 1 Gunungputri');
        $page_news  = (int)sanitasi($this->input->get('page',true));
        $per_page   = 5;
        if(!isset($page_news) OR empty($page_news))
            $page   = 1;
        else
            $page   = $page_news;
       $offset     = ($page - 1 ) * $per_page;
    
      
        $data       = $this->thread->populer($offset,$per_page);
     
        $count      = $this->database->rawSelect("SELECT COUNT(*) FROM thread");
        $jumlah     = ceil($count[0]['COUNT(*)'] / $per_page);
        $page_info  = array('page'=>$page,'jumlah'=>$jumlah);
        
        //urusan tampilan disini
        echo '  <div class="row-fluid"><div class="span8 ">';
        $this->load->view('thread',$data,$page_info);
        echo '<div class="span4">';
            $this->widget('populer');
            $this->widget('video_terbaru');
        echo '</div></div></div>';
        return;
    }
    
   function thread($id) 
   {  
        $id     = $this->input->get('id',true);
        $data   = $this->thread->get($id);
        $reply  = $this->thread->count_reply($data['id']);
        $data['reply']  = $this->thread->get_reply($data['id']);
        $data['author'] = 0; 
        $data['jumlah_reply']   = $reply['jumlah'];
        if($data['xp_id'] == $this->user->id) {
            $data['author']     = 1;
        }
        $this->load->view('show_thread',$data);
    }
    
    function buat_thread()
    {
        butuh_login();
        $l_cache_id = 'th-kat-lis';
        
        if($this->cache->valid($l_cache_id)){
            $data = $this->cache->get($l_cache_id);
        } else {
            $this->cache->hapus($l_cache_id);
            $data       = $this->database->rawSelect("SELECT * FROM th_kategori"); 
            $this->cache->set($l_cache_id,$data);
        }
        $this->load->view('editor',$data);
    }
    
    function reply()
    {
         $this->load->view('reply');
    }
    
    function kategori()
    {
        $id = sanitasi( $this->input->get('id',true));
         
        $l_cache_id = 'th_kat_'.$id;
        
        if($this->cache->valid($l_cache_id)){
            $data = $this->cache->get($l_cache_id);
        } else {
            $this->cache->hapus($l_cache_id);
            $data       = $this->database->rawSelect("SELECT a.* FROM thread a ,th_kategori b where a.topik=b.id AND b.url='$id'"); 
            $this->cache->set($l_cache_id,$data);
        }
        if(count($data) < 1 ) {
            $this->rekomendasi('<h4 class="pull-left">belum ada thread dalam kategori ini !</h4><a class="btn btn-warning pull-right" href="'.domain().'z/forum/buat_thread">Tambahkan Thread</a>');
            return;
        } 
        echo $data[0]['url'];
    }
    
    function tambah_thread()
    {
        butuh_login();
        /**
         * 
         
        if( !cek_token() ){
            echo "anda gak punya hak buat ini....?";
            return;
        }
        
        $captcanye  = sanitasi(trim(strtolower($this->input->post('tes_robot',true))));
          
        if(empty($captcanye) && $captcanye != $_SESSION['captcha']) {
            echo 'Masukan captha dengan benar...!';
            return;
        }
        */
        $judul_th       = sanitasi( trim($this->input->post('judul',true)));
        $kategori_th    = sanitasi( trim($this->input->post('kategori',true)));
        echo $_th_post       = sanitasi( trim($this->input->post('pos',true)));
        $url = str_replace(' ','-',strtolower($judul_th));
        
        $this->thread->tambah($this->user->id,$kategori_th,$judul_th,$_th_post,$url);
        if($this->ajax) {
            echo json_encode('jaksu');
        }
    }
    
    function komentari($id){
        ECHO $reply = $this->input->post('reply',true);
        $this->thread->reply($this->user->id,$id,$reply);
    }
    function rekomendasi( $konten ) {
        if( $_GET['act'] == 'rekomendasi' ) {
            $this->error->_404();
            return;
        } 
        
             echo '  <div class="row-fluid"><div class="span8 ">';
       echo $konten;
        echo '</div><div class="span4">';
            $this->widget('auraku');
            $this->widget('video_terbaru');
        echo '</div></div></div>';
    }
}