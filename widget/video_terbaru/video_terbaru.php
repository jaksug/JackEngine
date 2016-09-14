<?php
$xp = getInstance();
if(!$xp->mobile) {
?>
<div class=" sidebar-nav sisi">
<div class="sisi-luhur hijau">
    
  Video Terbaru<i class="icon-play pull-right icon-white"></i>
    </div>
<ul class="nav sisi-daftar row">
<li >
<?php
$data   = $xp->database->rawSelect("SELECT a.youtube_id,a.title,a.url FROM video a  ORDER BY id DESC LIMIT 1");
$link = "media/cache/".$data[0]['youtube_id'].".jpg";
if(!file_exists($link)) {
    $yt ="http://img.youtube.com/vi/".$data[0]['youtube_id']."/0.jpg";
    file_put_contents($link,file_get_contents($yt));
} else {
    $yt = $link;
}

?>
<a id="video-anyar" href="<?php echo domain();?>z/video/watch/<?php echo $data[0]['url'];?>" class="">
<img class="span12" id="video-terbaru" src="<?php echo domain().$yt;?>"/>

<div class="tile-title"><?php echo $data[0]['title'];?></div>
</a>

</li>

</ul></div>
<?php
}
?>