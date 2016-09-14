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
?> 

   <?php
    foreach($data as $r){
       
        $time = explode('-',$r['waktu']);
       
        $judul    = strip_tags(cut(20, $r['title']),'<p>');
      
              $ekspresi = strip_tags(substr($r['pos'],0,400),'<p><a><li><u><i><ul>'); 
              $link     = '?p='.$r['id'];
              echo ' <div class="pos row-fluid">
                        <div class="span2 tanggal"><h1 class="tgl">'.$time[0][2].$time[0][3].'</h1><h5 class="bln">'.$time[1].'-'.$time[2].'</h5></div>
                        <div class="span10">
              
                            <a href="'.alamat('z/home/thread',$r['url'],'').'"><h2  class="pos-judul">'.$judul.'</h2></a>
                            
                             '.$ekspresi.'
              <div class="baca"><a href="'.alamat('z/home/thread',$r['url'],'').'"><i>Selengkapnya &rarr;</i></a></div>
                        </div>
             
            
             </div>
      ';
       
      } ?>
         
        
    
