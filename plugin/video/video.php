<?php if(!defined('XP-ENGINE')) exit(NO_ACCESS);

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */
 
class Video extends XP_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model( 'video' );
    }
    
    function beranda()
    {
        $data   = $this->database->rawSelect("SELECT a.youtube_id,a.title,a.url FROM video a  ORDER BY watch DESC LIMIT 5");
        $this->load->view('video_list',$data);
    }
    
    public function checkVideoExists( $video_id ) {
        $headers = get_headers('http://gdata.youtube.com/feeds/api/videos/' . $videoId);
        if (!strpos($headers[0], '200')) {
            echo "The YouTube video you entered does not exist";
            return false;
        }
        return true;
    }
    
    function watch() {
        $data_id    = $this->input->get('id');
        $result     = $this->database->rawSelect("SELECT * FROM video where url='$data_id'");
        
        if($this->database->jumlah < 1) {
            echo 'video tidak di temukan';
            return;
        }
        
        $this->database->Update('video','watch',$result[0]['watch']+1,"url='$data_id'");
        $this->load->view('show',$result[0]);
        
        if($this->user->status) {
            $this->load->view('komen',$result[0]);
        }
        
        $out = $this->video->get_komen($result[0]['id']);
     
        
         $this->load->view('list',$out);
         $this->load->view('kanan','show', $result[0]);
        
    }
    
    function komen($v_id){
        butuh_login();
        $komen = $this->input->post('komen',true);
        $this->video->komen($this->user->id,$komen,$v_id);
    }
}