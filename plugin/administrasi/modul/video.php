<?php if(!defined('XP-ENGINE')) exit(NO_ACCESS);

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */
 
class Adm_Video extends XP_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('video','video');
    }
    
    function beranda()
    {
      $data = $this->video->video_list();
      $this->load->view('video',$data);
    }
    
    function tambah() {
        $judul = $this->input->post('title',true);
        $video = $this->input->post('video',true);
        $url = strtolower(str_replace(' ','-',$judul));
        if($this->cek($video)) {
            $this->database->Masukan('video',array(array('xp_id'=>$this->user->id,'title'=>$judul,'youtube_id'=>$video,'url'=>$url)));
            redirect(domain().'administrasi/video/');
        }
        
    }
    
    public function cek( $videoid ) {
        $headers = get_headers('http://gdata.youtube.com/feeds/api/videos/' . $videoid);
        if (!strpos($headers[0], '200')) {
            echo "The YouTube video you entered does not exist";
            return false;
        }
        return true;
    }
    
    function hapus($id) {
        $this->video->hapus($id,$this->user->id);
        redirect(domain().'administrasi/video/');
    }
}