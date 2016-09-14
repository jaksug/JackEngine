<?php if(!defined('XP-ENGINE')) exit(NO_ACCESS);

/**
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright XpresiMedia 2012
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */
 


class Galeri extends XP_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    function beranda($category,$user = '')
    {
        set_page_title('Skiel Galeri');
         $data   = $this->database->rawSelect("SELECT a.title,a.url,a.id FROM galeri a  ORDER BY id DESC LIMIT 9");
      
        $this->load->view('show',$data);
    }
    
    function foto()
    {
        $id = $this->input->get('id',true);
    $data = $this->database->rawselect("SELECT * FROM galeri WHERE id='$id'");
   if($this->ajax) {
    echo 'aaa';
    return;
   }
   echo '<img src="'.domain().$data[0]['url'].'"/>'.' <div class="carousel-caption "><h4> …<br /><br /><br />asasa </h4><p> …a </p></div>';
           
      
       
    }

}