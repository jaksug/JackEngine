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
        $isi= $r['isi'];
        preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $isi, $image);
        $judul    = strip_tags(cut(20, $r['judul']),'<p>');
        
        if(isset($image['src'])){
                 $ekspresi = cut(400,strip_tags($r['isi'],'<p><a><li><span><b><u><i><ul>')); 
              echo '<div class="pos row-fluid">
             <div class="span2 tanggal">
             </div>
              <div class="span10">
               <img src="'.$image['src'].'"/>
                
                <h2 class="pos-judul">'.$judul.'</h2>
                   <div class="pos-info">
                <i class="icon-user icon-white"></i> by '.ucfirst($r['nama']).' 
                <i class="icon-comment icon-white"></i> 30 comment
                </div>
                '.$ekspresi.'
                <div class="baca"><a href="?p='.$r['id'].'"><i>Selengkapnya &rarr;</i></a></div>
             </div>
             
                    </div>
        ';
        }
        else{
              $ekspresi = strip_tags(substr($r['isi'],0,400),'<p><a><li><span><b><u><i><ul>'); 
              $link     = '?p='.$r['id'];
              echo ' <div class="pos row-fluid">
            <div class="span2 tanggal">
             </div>
             
              <div class="span10">
                <div>
                <a href="?p='.$r['id'].'"><h2  class="pos-judul">'.$judul.'</h2></a>
                <div class="pos-info">
                <i class="icon-user icon-white"></i> by '.ucfirst($r['nama']).' 
                <i class="icon-comment icon-white"></i> 30 comment
                </div>
                </div>
              '.$ekspresi.'
              <div class="baca"><a href="?p='.$r['id'].'"><i>Selengkapnya &rarr;</i></a></div>
             </div>
             </div>
      ';
       }
      
      } ?>
    </div>
