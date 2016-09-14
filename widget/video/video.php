<?php
    $xp     = getinstance();
    $data   = $xp->database->rawSelect("SELECT a.youtube_id,a.title,a.url FROM video a  ORDER BY watch DESC LIMIT 3");
?>
<div class="sisi">
    <div class="sisi-luhur">
        Video Terpopuler<i class=" icon-th-list pull-right icon-white"></i>
    </div>
    <div class="sisi-isi">
        <ul class="nav nav-list" id="news" >
        <?php
            foreach( $data as $x ) { echo '<li><a href="'.alamat('z','video/watch/'.$x['url'],'').'" > <div class="thumb"><img src="http://img.youtube.com/vi/'.$x['youtube_id'].'/1.jpg"/> </div><div class="sisi-item video-id">'.$x['title'].'</div></a></li>'; }
        ?>
        </ul>
    </div>
</div>