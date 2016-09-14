
    <div class="sisi ">
    <div class="sisi-luhur hijau">
    
    Lagi Rame<i class=" icon-home pull-right icon-white"></i>
    </div>
    <div class="sisi-isi">
     <ul class="nav nav-list sisi-list" >
       <?php


$home = call_plugin('home');
$data = $home->thread->populer();

    foreach( $data as $x ) {
        echo "<li><a href='".domain()."z/home/thread/".$x['url']."' class='row-fluid'><div class='span2'><img width='50' src='".avatar($x['user_id'])."'/></div><div class='span10'>".$x['title']." by ".$x['nama']."<br />".cut('100',$x['pos'])."...</div></a></li>";
    }
?>

    </ul>
    </div>
    </div>
