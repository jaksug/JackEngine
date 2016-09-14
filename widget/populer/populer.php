<?php
$berita = call_plugin('berita');
$data = $berita->post->populer(5);
?>

<div class="sisi ">
    <div class="sisi-luhur">
        Berita Terpopuler<i class=" icon-th-list pull-right icon-white"></i>
    </div>
    <div class="sisi-isi">
        <ul class="nav nav-list " <?php   if(!$berita->mobile){ ?>id="news"<?php }?> >
        <?php
        $a = 1;
            foreach( $data as $x ) { 
                if($berita->mobile) {
                    echo '<li><a class="row-fluid" href="'.alamat('p',$x['url'],'').'">'.$x['judul'].'</a></li>';
                } else {echo '<li><a class="row-fluid" href="'.alamat('p',$x['url'],'').'" > 
                <div class="num span2">'.$a.' </div><div class="span10 sisi-item">'.$x['judul'].'</div></a></li>';} $a++;
            }
        ?>
        </ul>
    </div>
</div>