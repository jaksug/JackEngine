<?php if(!defined('XP-ENGINE')) exit(NO_ACCESS);

/**
 * This file have many function for all node in xp-engine
 * --------------------------------------------------------------------------------------
 * @author Jaka Suganda
 * @copyright Jaka Suganda
 * @package XP-ENGINE 0.1
 * @subpackage XP-ENGINE
 * --------------------------------------------------------------------------------------
 */

class XP_Parser
{
    /**
     * Name of active template in apllication
     */
    public $nama           = null;
    
    /**
     * String html ouput of the process of allication
     */
    private $output         = null;
    
    /**
     * Clien page of the apllication site or admin
     */
    public $client         = null;
    
    /**
     * Folder for temlate file
     */
    private $path           = 'tema/';
    
    /**
     * Table for template of application
     */
    private $table          = 'tema' ;
    
    /**
     * Spesial html tag in apllication
     */
    private $spesial_tag    = array('zona','here','domain','title','footer','loader');
    
    /**
     * Active URL in apllication
     */
    public $url             = '';
     
    private $widget         = array();
    private $widget_tag     = array();
    
    /**
     * Function to get page information
     * 
     * @param boolean
     */
    function __construct()
    {
         $xp    = getInstance();
         $this->setting = $xp->load->config('sistem');
    }
    
    function get_page_info( $admin = false )
    {
        $xp = getInstance();
        if ($admin) {
            $where  = " WHERE type = 'admin' ";
            $this->client   = 'admin';
            $xp->loader->client = 'admin';
        } else {
            $where  = " WHERE type = 'site' "; 
            $this->client   = 'site';
        }
        
       
            $this->nama = 'standar';
        
        if( dirname($_SERVER['PHP_SELF']).'/' == $_SERVER['REQUEST_URI'] ) 
                $this->url  = '';
        else    $this->url  = $_SERVER['REQUEST_URI']; 
    }

    function fetch_widget() {
        $xp = getInstance();
        $data  = $xp->database->rawSelect("SELECT * FROM widget a WHERE a.id IN( SELECT widget_id FROM widget_menu WHERE menu_id='1') ORDER by urut ASC");
        $data  = array(
            2=>array('id'=>'1','nama'=>'auraku','posisi'=>'right','urut'=>1),
            1=>array('id'=>'1','nama'=>'header','posisi'=>'header','urut'=>1),
            4=>array('id'=>'1','nama'=>'navigasi','posisi'=>'right','urut'=>1),
            3=>array('id'=>'1','nama'=>'menu','posisi'=>'menu','urut'=>1),
            5=>array('id'=>'1','nama'=>'top_menu','posisi'=>'menu','urut'=>1),
            0=>array('id'=>'1','nama'=>'video_terbaru','posisi'=>'right','urut'=>1),
        );
         
        $jumlah = count($data);
        for( $x = 0 ; $x < $jumlah  ; $x++) {
            $out[$data[$x]['posisi']][] =  $data[$x]['nama'] ;
        }
        
        $this->widget_tag   = $out;
        $this->widget   = $data;
    }
    function get_zona()
    {
        $xp         = getInstance();
        ob_start();
        $xp->zona();
        $content    = ob_get_contents();
        ob_end_clean();
        return $content;
    }
    function parse() {
        $path_file = $this->path . $this->nama . '/index.php' ;
        if( file_exists( $path_file ) ) {
            $xp = getInstance();
            ob_start();
                include $path_file;
                $this->output = ob_get_contents();       
            ob_end_clean();
        } else {
            $xp = getInstance();
            $konten = 'Tema bernama "'.ucfirst($this->nama).'" untuk zona "'.ucfirst($xp->zona).'" tidak ada tolong periksa pengaturan!';
            $konten.= ' <br /><br />Untuk mengatasi masalah ini!';
            $konten.= '<ul><li>Login Ke Admin Panel</li><li>Ke menu zona</li><li>Pilih setting</li><li>pilih tema</li></ul>';
            $xp->error->fatal_error('Tema Not Found',$konten);
        }
    }
 
    function replace( $tags = array() ) {
        if(!is_array($tags)) {
            return false;
        } 
        $xp = getInstance();
        $path   = domain();
        $jmlh   = count( $tags );
        $noscript = "<noscript>";

        if( isset( $_SESSION['noscript']) ) {
            if(!$xp->mobile) {
            $noscript.= '<div id="noscript" class="alert">
                            <div class="container">
                                <strong>Perhatian!</strong> Anda tengah dalam mode tanpa javascript, aktifkan JavaScript untuk <a href="'.domain().'z/noscript/beralih"><strong>beralih ke mode JavaScript</strong></a>
                            </div>
                        </div>';
            }
        } else { 
            $noscript .='<meta http-equiv="refresh" content="0;URL='.domain().'?act=noscript&nobody=true&ref='.urlencode(url_aktif()).'" /> ';
        }
        $noscript.='</noscript>';
        
        for( $x = 0; $x < $jmlh; $x++ ) {
            if ( $tags[$x]      == 'zona' ) {
                $data =$this->get_zona();
            } elseif ( $tags[$x]   == 'title') {
                $data = get_page_title();
            } elseif ( $tags[$x]   == 'here' ) {
                $data = $path . $this->path . $this->nama;
            } elseif ( $tags[$x]   == 'loader' ) {
                $data = $noscript;
            } elseif ( $tags[$x]   == 'domain' ) {
                $data = $path;
            } elseif ( $tags[$x]   == 'footer' ) {
                $data = $this->footer();
            } else {
                $data = $this->parse_widget($tags[$x]);     
            }
            
            if( empty( $data ) ) 
                $this->output = str_replace( '<include="'.$tags[$x].'"/>',' ',$this->output );
            else
                $this->output = str_replace( '<include="'.$tags[$x].'"/>',$data,$this->output ); 
        }
    }
    
    function parse_widget( $posisi )
    {
        $widget = $this->widget_tag;
        $jumlah = count( $widget[$posisi] );
        $xp = getInstance();
        
        ob_start();
        for( $y = 0; $y < $jumlah ; $y++ ){
            $xp->widget($widget[$posisi][$y]);   
        }
        $content = ob_get_contents();
        ob_end_clean();
        
        return $content;      
    }
 
    function rander() 
    {
        $this->fetch_widget();
        $data   = $this->widget;  
                                                    
        if( count( $data ) > 0 ) {
            foreach ($data as $x) {
                $posisi[]   = $x['posisi'];
            }
            $this->tag  = array_merge($this->spesial_tag,$posisi);
        } else {
            $this->tag  = $this->spesial_tag;
        }
        $this->replace($this->tag);
        $this->output   = html_compress($this->output);
                                                                              
        echo $this->output;
    }
    
    /**
     * Rander output string into JSON data 
     * 
     * @return json ouput aplication
     */
    function ajax_rander() {
        $xp = getInstance();
        $data   = $this->get_zona();//"<script>$('a').click(function(e){ e.preventDefault();ajax_goto($(this).attr('href'),'#zona');});</script>";    
        $data   = html_compress($data);
     
        $data   = json_decode($data);
        $user   = $xp->user->get_data();
        $output = array('status'=>$xp->status,'pesan'=>$xp->pesan,'konten'=>$data);
        echo json_encode($output);
    }
    
    function nobody() {
         $xp = getInstance();
        $data   = $this->get_zona();
        $data   = html_compress($data);
     
       echo $data;
    }
    function main_content() {
        echo $this->get_zona();
    }
    
    function only_zone() {
        echo $this->get_zona();    
    }
    
    function footer() {
        $content = ' <p>&copy; SMKN 1 Gunungputri 2013 designed by Jaka Suganda</p>';
        $content.= $this->state();
        $content.= '<div style="display:none;"id="notif" class="pull-right alert">Tengah Memproses...<img  src="img/loader.gif" width="30" /></div>';
        return $content;
    }
    
    function state() {
        return "
        <script>
        function ajax_goto(url,dom,title){
            var domain='".domain()."';
            if(url=='#'){
                return;
            } else if(url==domain){
                url = '?act=beranda';
            }
            history.pushState('', '', url);var a = location.href;url = a.replace(domain,'');ajax_load(url,dom);}function ajax_load(url,dom){ $('#notif').show();$.ajax({url: url+'&ajax=true',method: 'GET',dataType: 'json',statusCode: {404: function(){".$this->notif(404)."}},success: function(o){ $(dom).empty(); $(dom).html(o.konten);".$this->notif(200)."$('.nav li').removeClass('open');}})}window.onpopstate = function(event){ajax_load(location.href,'#zona') ;};</script>";
    }
    
    function notif( $status ) {
        if( $status  == 200) {
            $content = "$('#notif').addClass('alert-success').html('sukses memuat...').fadeOut(6000);";
        } else {
            $content = "$('#notif').fadeOut(5000);";
        }
        return $content;
    }     
}