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

    <div class="row-fluid " id="berita_list">

        <div class="span11" >
        </div>
    <?php
    foreach($data as $r){
        $isi= $r['isi'];
        preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $isi, $image);
        $judul    = strip_tags(cut(20, $r['judul']),'<p>');
        
        if(isset($image['src'])){
              $ekspresi = strip_tags(substr($r['isi'],0,600),'<p><img><a><li><span><b><u><i><ul>'); 
        echo '<div class=" berita_list " p_id="'.$r['id'].'" >
                <div class="span12">  <h2>'.$judul.'</h2></div>
                <div class="span12 row-fluid">            
                    <div class="span4"><img src="'.$image[0]['src'].'"/>'.'</div>
                    <div class="span8">                         
                        <p>'.$ekspresi.' ...</p>
                    </div>
                </div>     
                <div class="lihat">                     
                    <a class="btn " href="?p='.$r['id'].'">Selengkapnya &raquo;</a>
                </div>
            </div> ';
        }
        else{
              $ekspresi = strip_tags(substr($r['isi'],0,400),'<p><img><a><li><span><b><u><i><ul>'); 
              echo ' <div class="span11 berita_list" p_id="'.$r['id'].'" >
            <h2>'.$judul.'</h2>
            <p>'.$ekspresi.' ...</p>
            <p><a class="btn lihat" href="?p='.$r['id'].' ">Selengkapnya &raquo;</a></p>
        </div>
      ';
       }
      
      } ?>
     
    </div>  
    <div class="hero-unit"><img src="img/loader.gif" /> Tengah memuat...<div class="btn pull-right" id="news_next">Selanjutnya</div></div>
    <script>
    $('#news_next').click(function(){
        var id = $('#berita_list div:last').attr('p_id');
     
          $.ajax({
            type: "GET",
             dataType: "json",
            url: '?act=next&id='+id+'&ajax=true',
            cache:true,
                success: function(x){            
                    $('#berita_list').append(x.konten);
                    
                }
    });  
    });
    
    </script>