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

$ekspresi   = ungkapkan($pos); 
set_page_title($title);    
?>

<style>
.th-isi{
    background: #fff;
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 5px;
}
.th-reply{
    padding: 10px 0;
}
.th-reply:hover{
    background: #ddd;
}
.th-main,.th-reply-main{
    background: #ccc;
    padding: 10px 20px;
    border-radius: 3px;
}
.th-main:before,.th-reply-main:before{   
    margin: 0px 0 0 -30px;
    position: absolute;
    display: inline-block;
    border-top: 10px solid transparent;
    border-right: 10px solid #ccc;
    border-bottom: 10px solid transparent;
    border-left-color: #ddd;
    content: '';
}
.th-title{
    font-size: 18px;
}
.th-utama{
    border-top: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
    padding: 10px 0 0;
    margin-top: -10px;
    float: left;
}
.th-reply-author{
    float: right;
    margin-right: 10px;
}
.th-reply-main a{
    color: #444;
}
.th-replys {
    float: left;
}
.th-reply{
    float: left;
    margin:  0 0 0 -20px;
}
#reply-add {
    margin-left: -20px!important;
    float: left;
    border-top:1px solid #ccc;    
}
.th-author-profil{
    width: 80px;
}
</style>
<div class="row-fluid">
    <div class="span8 row-fluid">
        <div class="th-atas row-fluid">
            <div class="span6"><h3 class="th-title"><?php echo $title;?></h3></div>
            <div class="span6">
                <ul class="nav nav-pills pull-right">
                    <li><a href="#"><i class="icon-share-alt "></i> <?php echo $jumlah_reply;?> reply</a></li>
                    <li><a href="#"><i class="icon-info-sign "></i> <?php echo time_format_indo($waktu);?></a></li>
                    <li><a href="#"><i class="icon-tag"></i> <?php echo $kategori;?></a></li>
                </ul>
            </div>
        </div>
        <div class="th-utama row-fluid">
            <div class="span2">
                <img width="80" class="img-rounded" src="<?php echo domain().avatar($xp_id);?>" />
                <?php echo $nama;?>
                <p class="label"><?php echo $level;?></p>
            </div>
            <div class="span10 th-main"><?php echo $ekspresi;?></div>
            <?php
            if($author) {
            ?>
                <ul class="nav nav-pills pull-right">
                    <li><a href="#"><i class="icon-edit "></i> Edit</a></li>
                    <li><a href="#"><i class="icon-remove "></i> Hapus</a></li>
                </ul>
            <?php
            }
            ?>
        </div>
        <div class="th-replys span12">
        <?php
            foreach($reply as $komen){
        ?>
            <div class="th-reply row-fluid">
                <div class="span2"><img class="img-circle th-reply-author" width="50px" src="<?php echo domain().avatar($komen['xp_id']);?>" /></div>
                <div class="span10 th-reply-main">
                    <a href="<?php echo domain()?>profil/<?php echo $komen['xp_nama'];?>"><?php echo $komen['nama'];?></a><br /><?php echo $komen['reply'];?>
                </div>
            </div> 
   <?php
   }?>
        </div>
   <?php if($xp->user->status){ ?>
        <div class="span12" id="reply-add ">
            <form id="add-reply" method="post" action="<?php echo domain();?>z/home/komentari/<?php echo $id;?>">
                <div class="span2"><img class="img-rounded th-author-profil" src="<?php echo domain().iavatar();?>" />
                </div>
                <div class="span10 row-fluid" style="margin-left: -0px;">
                        <textarea name="reply" class="span12" id="th-add-komen"></textarea>
                        <button class="btn pull-right">Komentari</button>
                </div>
            </form>
        </div>
   <?php } ?>
       

    </div> 
    <div class="span4 ">
           <ul class="breadcrumb span12">
          
            <li><a href="<?php echo domain();?>">Beranda</a> <span class="divider">/</span></li>
            <li><a href="<?php echo domain();?>z/home">Home</a> <span class="divider">/</span></li>
             <li><a href="<?php echo domain();?>z/home/kategori/<?php echo $url;?>"><?php echo $nama;?></a> <span class="divider">/</span></li>
            <li class="active"><?php echo $title;?></li>
        </ul>
  <?php
        
            $xp->widget('hot_issue');
$xp->widget('footer');
  ?>
     </div></div>