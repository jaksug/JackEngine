<?php if(!defined('XP-ENGINE')) exit(NO_ACCESS);

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */
 

class Adm_Post extends XP_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model( 'post','post' );
    }
    
    function beranda()
    {
        $data = $this->post->post_list();

        $this->load->view('post',$data);
    }
    
    function tambah(){
        $data = $this->post->kategori();
        $this->load->view('editor',$data);
    }
    
    function kategori(){
        $data = $this->post->kategori();
        $this->load->view('kategori',$data);
    }
    
    function  submit() {
        $berita     = trim($this->input->post('je-berita'));
        $judul      = trim($this->input->post('je-judul'));
        $kategori   = trim($this->input->post('kategori',true));
        $draft      = $this->input->post('draft');
        $status     = 'published';
        $url_post   = strtolower(str_replace(' ','-|/',cut(80,$judul)));
        
        if( empty( $berita ) || empty( $judul )) {
            $status = 'draft';
        }
        
        if(empty($kategori)) {
            $kategori = 'uncategory';
        }
        
        $data   = array(array('id'=>'','url'=>$url_post,'isi'=>$berita,'judul'=>$judul,'kategori_id'=>$kategori,'user_id'=>$this->user->id,'time'=>str_replace(' ','-',date('d m Y')),'status'=>$status));
        $this->database->Masukan('berita',$data);
    }
    
    function hapus($id) {
        $uid = $this->user->id;
        $this->database->_delete('berita');
        $this->database->where("id='$id' AND user_id='$uid'");
        $this->db->execute();
       redirect(domain().'administrasi/post/');
    }
    
    function edit($id) {
        $data = $this->post->post($id);
        $data['kategori'] = $this->post->kategori();
        $this->load->view('edit',$data);
    }
    
    function perbarui($id){
        $berita     = trim($this->input->post('je-berita',true));
        $judul      = trim($this->input->post('je-judul'));
        $kategori   = trim($this->input->post('kategori',true));
        if( empty( $berita ) || empty( $judul )) {
            $status = 'draft';
        }
        
        $this->database->rawQuery("Update berita SET judul='$judul',isi='$berita',kategori_id='$kategori' WHERE id='$id'");
        redirect(domain().'administrasi/post/');
    }
}