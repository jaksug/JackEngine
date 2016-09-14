<?php

$xp = getInstance();
$data   = $xp->database->rawSelect("SELECT a.url,a.judul FROM berita a WHERE status='published' ORDER BY readed DESC LIMIT 5");
?>

    <div class="sisi ">
    <div class="sisi-luhur">
    
    Berita Terpopuler<i class=" icon-th-list pull-right icon-white"></i>
    </div>
    <div class="sisi-isi">
     <ul class="nav nav-list" id="news" >
        <?php
        $a = 1;
            foreach( $data as $x ) { 
                if($xp->mobile) {
                    echo '<li><a class="row-fluid" href="'.alamat('p',$x['url'],'').'"'.$x['judul'].'</a></li>';
                } else {
                    
                echo '<li>
            <a class="row-fluid" href="'.alamat('p',$x['url'],'').'" > 
            <div class="num span2">'.$a.' </div><div class="span10 sisi-item">'.$x['judul'].'</div></a></li>'; $a++;}
            }
        ?>
    </ul>
    </div>
    </div>