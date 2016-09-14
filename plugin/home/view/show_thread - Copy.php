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
.th-reply:hover{
    background: #ddd;
}
</style>
<div class="row-fluid"><div class="span8">
     

<div id="thread">

           
<div class="row-fluid ">

    <div class="th-atas span12">
        <div class="th-title row-fluid">
          <h2 class="pull-left th-judul"><?php echo $title;?></h2>
          <div class="pull-right th-time"><i class="icon-info-sign "></i> <?php echo $waktu;?></div>
        </div>
     
       
    </div>
     <div class="th-info span2">
       <div class="span1">
<img class="img-circle th-maker-profil" width="80" src="<?php echo domain().avatar($xp_id);?>" />
</div>
<div class="span6"><a href="<?php echo domain();?>profil/<?php echo $xp_nama;?>"><b><?php echo $nama;?></b></a><br /><a><?php echo $level;?></a></div><div class="span5 "><p class="label pull-right"><?php echo $kategori;?></p></div>
      </div>
    <div class="th-isi span10">
 
         <?php echo $ekspresi;?>
    </div>
    <div class="th-komen ">
    <div>  <?php
  
   foreach($reply as $komen){
   ?>
       <div class="th-reply"><img class="img-circle" width="50px" src="<?php echo domain();?>media/img/avatar.jpeg" /><?php echo $komen['nama'];?></div> <?php echo $komen['reply'];?>
   <?php
   }
   ?></div>
    <div class="th-komen-konten row-fluid">
    <?php if($xp->user->status){ ?>
    <form id="add-reply" method="post" action="<?php echo domain();?>z/home/komentari/<?php echo $id;?>">
     <div class="span1"><img class="img-rounded th-maker-profil" width="50" src="<?php echo domain().iavatar();?>" /></div>
    <div class="span6">
    <textarea name="reply" class="span5" id="th-add-komen"></textarea>
    <button class="btn pull-right">Komentari</button>
    </div>
    </form>
   <?php } ?>
    </div>
    </div>

   
</div>  
    </div>

            
        
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>   
        </div> <div class="span4 ">
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