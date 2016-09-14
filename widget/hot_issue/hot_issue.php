<?php
$xp     = getinstance();
$data   = $xp->database->rawSelect("SELECT a.url,a.title FROM thread a WHERE 1 LIMIT 5 ");
?>

    <div class="sisi ">
    <div class="sisi-luhur">
    
    Hot Issue<i class=" icon-th-list pull-right icon-white"></i>
    </div>
    <div class="sisi-isi">
     <ul class="nav nav-list" id="news" >
        <?php
        $a = 1;
            foreach( $data as $x ) { echo '<li><a href="'.alamat('z/home/thread',$x['url'],'').'" > <div class="num">'.$a.' </div><div class="sisi-item">'.$x['title'].'</div></a></li>'; $a++;}
        ?>
    </ul>
    </div>
    </div>