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
$xp = getinstance();
?>
<div class="th-title row-fluid">
    <h2 class="pos-judul pull-left">Hot Thread</h2>
<?php if( $xp->status){
    echo ' <a class="btn btn-warning pull-right" href="?z=forum&act=buat_thread">Tambahkan Thread</a>';
}?>
   
</div>   
<div id="th_populer">
    <ul class="nav nav-list rating">
         <?php
         $x = 1;
    foreach($data as $r){
        echo '<li><a class="row-fluid" href="'.domain().'z/home/thread/'.$r['url'].'"><div class=" round">'.$x.'</div><div class="span10 rating-konten">'.$r['title'].'</div></a> </li>';
   $x++;
   }
   ?>
       
        </ul>
  
</div>
    </div>
