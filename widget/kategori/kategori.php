<?php
$xp     = getinstance();
$kategori = $xp->input->get('kategori',true);
$data   = $xp->database->rawSelect("SELECT a.id,a.title,a.url FROM page a WHERE kategori='$kategori' ORDER BY id ASC LIMIT 5");

?>

    <div class="sisi ">
    <div class="sisi-luhur">
    
    <?php echo ucfirst($kategori);?><i class=" icon-th-list pull-right icon-white"></i>
    </div>
    <div class="sisi-isi">
     <ul class="nav nav-list daftar"  >
        <?php
        $a = 1;
            foreach( $data as $x ) { echo '<li><a href="'.domain().'laman/'.$kategori.'/'.$x['url'].'" > <div class="">'.$x['title'].'</div></a></li>'; $a++;}
        ?>
    </ul>
    </div>
    </div>