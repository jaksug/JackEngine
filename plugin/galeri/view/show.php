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
<div class="row-fluid">
    <div class="span8 row-fluid">
        <div class="page-title ijo">
            Foto Terbaru<i class="icon-th-large pull-right icon-white"></i>
        </div>
        <div class="" id="galeri" >
        <?php
            $x = 1;
            foreach( $data as $foto ) {
                $anchor = domain().'z/galeri/foto/'.$foto['id'];
                $hasil = $x % 3;
                if( $hasil == 0 ) {
                    echo '<a data-toggle="modal" data_id="'.$foto['id'].'" href="#myModal" rel="'.$anchor.'"><img src="'.domain().$foto['url'].'" class="no-margin-right"/></a>';
                } else {
                    echo '<a data-toggle="modal" href="#myModal" rel="'.$anchor.'" ><img src="'.domain().$foto['url'].'"/></a>';
                }
                $x++;
            }
        ?>
        </div>
    </div>
    <div class="span4">
        <?php
            $ieu = getinstance();
         
            $ieu->widget('galeri');
            $ieu->widget('video_terbaru');
        ?>
    </div>
</div>  
 
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        
            </div>
            <div class="modal-body modal-galeri">
            <a class="carousel-control left" data-slide="prev" href="#skiel"><img src="http://localhost/skill/media/img/prev.png"></img></a>
            <div class="galeri-inner"> 
             </div>
             <a id="next"  href="#myModal" class="carousel-control right"><img src="http://localhost/skill/media/img/next.png"/>
             </a>
            
            </div>
          
          </div>
