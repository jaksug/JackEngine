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
   $ieu = getinstance();

?> 
<div class="row-fluid">
    <div class="span8 ">
        <div class="row-fluid">
        <?php if(!$ieu->mobile){ echo slider('skiel',$img);}?>
 <div class="ijo">Berita Terbaru<i class=" icon-th-list pull-right icon-white"></i></div>
<div class="row-fluid">
    <?php
        foreach($berita as $r){
            $isi    = $r['isi'];
            $array  = array();
            preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $isi, $image);
            $judul  = cut(30, strip_tags($r['judul']),'<p>');
            if(isset($image['src'])){ 
                 $ekspresi   = cut(150,strip_tags($isi));
    ?>
                <div class="span6 tiles">
                <img src="<?php echo $image['src'];?>" />
                   <div class="tile-item">
                   
                     <a href="<?php echo alamat('p',$r['url'],'');?>"><h4 style="margin-bottom: 10px;color: #fff;"><?php echo $judul;?></h4></a>
                    <p><?php echo $ekspresi;?></p>
                    
                   </div>
                     
                </div>
    <?php   } else {
                $ekspresi   = cut(300,strip_tags($isi));
    ?>
                <div class="span4 widget">
                   <a href="?p=<?php echo $r['id'];?>"><h4 class="title"><?php echo $judul;?></h4></a>
                    <p><?php echo $ekspresi = substr($ekspresi,0,strrpos($ekspresi," ")).'...';?></p>
                    <p><a class="btn-warning btn pull-right" href="<?php echo alamat('p',$r['url'],'');?>">Selengkapnya &rarr;</a></p>
                </div>
    <?php   }} ?>  


</div>
    </div>
    <?php
     echo    '<div class="hero-unit">'.
                    '<a href="'.alamat('p',$terbaru['id'],'').'"><h4>'.cut(50,strip_tags($terbaru['judul'])).'</h4></a>'
                    .cut(500,strip_tags($terbaru['isi'],'<a>')).'<br /><a href="'.alamat('p',$terbaru['url'],'').'" class="btn btn-warning pull-right"> Selengkapnya &rarr;</a><br />'.
                '</div>';
      echo $video_area;
                ?>
    
    </div>
    <div class="span4">
      <div class="row-fluid">
    <?php
    $ieu = getinstance();
      $ieu->widget('populer');
            $ieu->widget('video_terbaru');
       
            
             
             $ieu->widget('home');
              $ieu->widget('footer');
            ?>
    </div>
    </div>
</div>  