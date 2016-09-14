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
$xp     = getInstance();
$r      = $data[0];
$tanggapan  = array();
$ekspresi   =$r['content']; 
set_page_title($r['title']);    
?>
<div class="row-fluid ">
    <div class="span12 news">
        <h2 class="p    os-judul"><?php echo $r['title'];?></h2>
        <div class="pos-info"><i class="icon-time"></i> <?php echo $r['time'];?><a class="pull-right"><i class="icon-user"></i> <?php echo ucfirst($r['nama']);?></a></div>
        <p><?php echo $ekspresi;?></p>  
    </div>
   
</div>
