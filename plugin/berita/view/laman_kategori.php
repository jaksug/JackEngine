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
            Halaman dengan kategori <?php echo $title;?><i class="icon-th-large pull-right icon-white"></i>
        </div>
        <ul class="nav nav-list">
        <?php foreach($kategori as $laman ) {
            echo '<li><a href="'.domain().'laman/'.$title.'/'.$laman['url'].'">'.$laman['title'].'</a></li>';
        }?>
        </ul>
    </div>
    <div class="span4">
        <?php
            $ieu = getinstance();
            $ieu->widget('auraku');
            $ieu->widget('galeri');
        ?>
    </div>
</div>  
