<?php if(!defined('XP-ENGINE')) exit(NO_ACCESS);

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */
 


class Berita extends XP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('berita', 'post');
    }
    
    function beranda($category,$user = '')
    {
        set_page_title('Berita SMKN 1 Gunungputri');

        $page_news  = (int)sanitasi($this->input->get('page',true));
        $per_page   = 5;
        if(!isset($page_news) OR empty($page_news))
            $page   = 1;
        else
            $page   = $page_news;
  
        $news_cache_id = 'berita_'.$page_news;
        
        if($this->cache->valid($news_cache_id)){
            $data = $this->cache->get($news_cache_id);
        } else {
            $offset     = ($page - 1 ) * $per_page;
            $sql_query  = "SELECT a.id,a.url,a.isi,a.time,a.judul,b.nama,b.xp_id,b.xp_nama FROM berita a,xpreser b WHERE ";
            if(!empty($category)) {
                $sql_query  .= " kategori_id='$category' ";
            } elseif( $user != '') {
                $sql_query  .= " AND xp_id='$user'";
            } else {
                $sql_query  .= '1 AND b.xp_id=a.user_id';
            }
            
            $sql_query .= "  AND kategori_id='1' AND status='published' group by a.id,a.url,a.isi,a.time,a.judul,b.nama,b.xp_id,b.xp_nama  ORDER BY a.id DESC LIMIT $offset,$per_page";
      
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
        
        $count      = $this->database->rawSelect("SELECT COUNT(id) FROM berita WHERE status='published' AND kategori_id='1'");
        
        $jumlah     = ceil($count[0]['COUNT(id)'] / $per_page);
        $page_info  = array('page'=>$page,'jumlah'=>$jumlah);
        $this->load->view('berita',$data,$page_info);
   
        return;
    }
    
    
    function show_post($id) 
    {  
        $data = $this->post->get_post( '', $id );
        if(empty($data)) {
           $this->error->_404();
            return;
        }
        $post_id    = $data[0]['id'];
        $komentar   = $this->database->rawSelect("SELECT a.comment,a.xp_id,b.aura,b.xp_nama,a.nama FROM comment a,xpreser b where a.eks_id='$post_id' AND b.xp_id=a.xp_id ");
        $this->database->update('berita','readed',$data[0]['readed']+1,"id=".$data[0]['id']);
        //kalo disini bagian tampilannya oke!
        echo '<div class="row-fluid"><div class="span8">';
        $post_data = $data[0];
        $post_data['jumlah_komentar'] = $this->database->jumlah;
        $this->load->view('show_berita', $post_data);
        
        if( $this->database->jumlah > 0) {
            $this->load->view('daftar_komentar',$komentar);
        }
        
        $this->load->view('komentar',$data);
        echo '  </div> 
                <div class="span4 "> 
                    <ul class="breadcrumb span12">
                        <li><a href="'.domain().'">Beranda</a> <span class="divider">/</span></li>
                        <li><a href="'.domain().'z/berita">Berita</a> <span class="divider">/</span></li>
                        <li class="active">'.$data[0]['judul'].'</li>
                    </ul>';
                    $this->widget('auraku');
                    $this->widget('video_terbaru');
                        $this->widget('footer');
        echo '  </div>
                </div>';
    }
    
    function add_comment()
    {
        if( !cek_token()) {
            exit('ilegal request kayaknya');
            return;
        }
        if(!$this->user->status) {
            $captcanye  = sanitasi(trim(strtolower($this->input->post('tes_robot',true))));
            if(empty($captcanye) || $captcanye != $_SESSION['captcha']) {
                echo "tolong masukan captcha dengan benar..!";
                return false;
            }
        }
       
            $post_id    = sanitasi($this->input->get('id',true));
            $koment     = sanitasi(trim(htmlentities($this->input->post('x_comment',true))));
            if( empty($koment)){
                return;
            }
            if($this->user->id) {
                $komentator = $this->user->nama;
                
            } else {
                $komentator = sanitasi(trim(htmlentities($this->input->post('x_nama',true))));
            }
            if( empty( $komentator ) ) {
                $komentator = "Anonim";
            }
            $db         = $this->database;
            $comment_id = rand();
            $data       = array('id'=>'','xp_id'=>($this->user->id) ? $this->user->id:'0','eks_id'=>$post_id,'comment'=>$koment,'nama'=>$komentator);
            $db->insert('comment',array($data));
            unset( $_SESSION['captcha'] );
            redirect($_SERVER['HTTP_REFERER']);
        
    }
    
    function remove_comment() 
    {
         $db    = getDB();
         $id    = $this->input->get('id',true);
         $db->rawquery("DELETE FROM comment where c_id='$id'");
         return true;
    }
 
    
    function laman()
    {
        $halaman    = sanitasi($this->input->get('laman',true));
        
        $l_cache_id = 'laman_'.$halaman;
        
        if($this->cache->valid($l_cache_id)){
            $data = $this->cache->get($l_cache_id);
        } else {
            $this->cache->hapus($l_cache_id);
            $data       = $this->database->rawSelect("SELECT  a.*,b.nama FROM page a,xpreser b WHERE url='$halaman' AND b.xp_id=a.user_id"); 
            $this->cache->set($l_cache_id,$data);
        }
       
        if(empty($data)) {
           $this->error->_404();
            return;
        }
        
        echo '<div class="row-fluid"><div class="span8">';
        $this->load->view('show_laman',$data);
        $kategori = $this->input->get('kategori',true);
        echo '</div><div class="span4 ">
          <ul class="breadcrumb span12">
            <li><a href="'.domain().'">Beranda</a> <span class="divider">/</span></li>
            <li><a href="'. domain().'laman/'.$kategori.'">'.ucfirst($kategori).'</a> <span class="divider">/</span></li>
            <li class="active">'.$data[0]['title'].'</li>
        </ul>';
     
           $this->widget('auraku');
              $this->widget('kategori');
                    $this->widget('video_terbaru');
                        $this->widget('footer');
        echo '</div></div>';
    }
    function laman_kategori()
    {
        $kategori   = $this->input->get('kategori',true);
        $data_kategori      = $this->database->rawselect("SELECT * from page where kategori='$kategori'");
        $data['kategori']   =$data_kategori;
        $data['title']      = $kategori;
        $this->load->view('laman_kategori',$data);
        
    }
    
    function kategori($kategori) {
        $data = $this->post->by_kategori($kategori);
        $page_info  = array('page'=>1,'jumlah'=>1);
        
        $this->load->view('berita',$data,$page_info);
        
    }

}