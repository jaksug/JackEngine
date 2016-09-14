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

set_page_title($judul);    
?>

<a href="<?php echo domain();?>/p/<?php echo $url;?>"><h2  class="pos-judul"><?php echo $judul;?></h2></a>
<div class="pos-info">
    <a><i class="icon-calendar icon-white"></i> <?php echo time_format_indo($time);?></a>
    <a href="<?php echo domain();?>profil/<?php echo $xp_nama;?>"><i class="icon-user icon-white"></i> <?php echo $nama;?></a> 
    <a><i class="icon-tags icon-white"></i> <?php echo $name;?></a>
    <a href="#komentar"><i class="icon-comment icon-white"></i> <?php echo $jumlah_komentar;?> comment</a>
</div>
           
<div class="pos-konten"><?php echo $isi;?></div> 
