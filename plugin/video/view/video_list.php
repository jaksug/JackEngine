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
        <div class="row-fluid" id="v-list">
    <?php
    $x = 1;
    foreach( $data as $video) {
        $hasil = $x % 2;
        if( $hasil != 0) {
            echo '<a href="video/watch/'.$video['url'].'" class="batas10">'.'<img class="span6" src="http://img.youtube.com/vi/'.$video['youtube_id'].'/0.jpg"/></a>';
        } else {
            echo '<a href="video/watch/'.$video['url'].'">'.'<img class="span6" src="http://img.youtube.com/vi/'.$video['youtube_id'].'/0.jpg"/></a>';
        }
        $x++;
    }
    ?>
        </div>
    </div>
    <div class="span4">
    <?php
    $ieu = getinstance();
      $ieu->widget('video');
            $ieu->widget('video_terbaru');
            ?>
    </div>
</div>  
